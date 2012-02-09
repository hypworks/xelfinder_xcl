<?php
/**
 * @file
 * @package xelfinder
 * @version $Id$
**/

if(!defined('XOOPS_ROOT_PATH'))
{
    exit;
}

if(!defined('XELFINDER_TRUST_PATH'))
{
    define('XELFINDER_TRUST_PATH',XOOPS_TRUST_PATH . '/modules/xelfinder');
}

require_once XELFINDER_TRUST_PATH . '/class/XelfinderUtils.class.php';

/**
 * Xelfinder_AssetPreloadBase
**/
class Xelfinder_AssetPreloadBase extends XCube_ActionFilter
{
    public $mDirname = null;

    /**
     * prepare
     * 
     * @param   string  $dirname
     * 
     * @return  void
    **/
    public static function prepare(/*** string ***/ $dirname)
    {
        static $setupCompleted = false;
        if(!$setupCompleted)
        {
            $setupCompleted = self::_setup($dirname);
        }
    }

    /**
     * _setup
     * 
     * @param   void
     * 
     * @return  bool
    **/
    public static function _setup(/*** string ***/ $dirname)
    {
        $root =& XCube_Root::getSingleton();
        $instance = new self($root->mController);
        $instance->mDirname = $dirname;
        $root->mController->addActionFilter($instance);
        return true;
    }

    /**
     * preBlockFilter
     * 
     * @param   void
     * 
     * @return  void
    **/
    public function preBlockFilter()
    {
        $file = XELFINDER_TRUST_PATH . '/class/callback/DelegateFunctions.class.php';
        $this->mRoot->mDelegateManager->add('Module.xelfinder.Global.Event.GetAssetManager','Xelfinder_AssetPreloadBase::getManager');
        $this->mRoot->mDelegateManager->add('Legacy_Utils.CreateModule','Xelfinder_AssetPreloadBase::getModule');
        $this->mRoot->mDelegateManager->add('Legacy_Utils.CreateBlockProcedure','Xelfinder_AssetPreloadBase::getBlock');
        $this->mRoot->mDelegateManager->add('Module.'.$this->mDirname.'.Global.Event.GetNormalUri','Xelfinder_CoolUriDelegate::getNormalUri', $file);

        $this->mRoot->mDelegateManager->add('Legacy_TagClient.GetClientList','Xelfinder_TagClientDelegate::getClientList', XELFINDER_TRUST_PATH.'/class/callback/TagClient.class.php');
        $this->mRoot->mDelegateManager->add('Legacy_TagClient.'.$this->mDirname.'.GetClientData','Xelfinder_TagClientDelegate::getClientData', XELFINDER_TRUST_PATH.'/class/callback/TagClient.class.php');  }

    /**
     * getManager
     * 
     * @param   Xelfinder_AssetManager  &$obj
     * @param   string  $dirname
     * 
     * @return  void
    **/
    public static function getManager(/*** Xelfinder_AssetManager ***/ &$obj,/*** string ***/ $dirname)
    {
        require_once XELFINDER_TRUST_PATH . '/class/AssetManager.class.php';
        $obj = Xelfinder_AssetManager::getInstance($dirname);
    }

    /**
     * getModule
     * 
     * @param   Legacy_AbstractModule  &$obj
     * @param   XoopsModule  $module
     * 
     * @return  void
    **/
    public static function getModule(/*** Legacy_AbstractModule ***/ &$obj,/*** XoopsModule ***/ $module)
    {
        if($module->getInfo('trust_dirname') == 'xelfinder')
        {
            require_once XELFINDER_TRUST_PATH . '/class/Module.class.php';
            $obj = new Xelfinder_Module($module);
        }
    }

    /**
     * getBlock
     * 
     * @param   Legacy_AbstractBlockProcedure  &$obj
     * @param   XoopsBlock  $block
     * 
     * @return  void
    **/
    public static function getBlock(/*** Legacy_AbstractBlockProcedure ***/ &$obj,/*** XoopsBlock ***/ $block)
    {
        $moduleHandler =& Xelfinder_Utils::getXoopsHandler('module');
        $module =& $moduleHandler->get($block->get('mid'));
        if(is_object($module) && $module->getInfo('trust_dirname') == 'xelfinder')
        {
            require_once XELFINDER_TRUST_PATH . '/blocks/' . $block->get('func_file');
            $className = 'Xelfinder_' . substr($block->get('show_func'), 4);
            $obj = new $className($block);
        }
    }
}

?>
