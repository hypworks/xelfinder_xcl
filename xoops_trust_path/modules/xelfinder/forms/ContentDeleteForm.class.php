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

require_once XOOPS_ROOT_PATH . '/core/XCube_ActionForm.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/class/Legacy_Validator.class.php';

/**
 * Xelfinder_ContentDeleteForm
**/
class Xelfinder_ContentDeleteForm extends XCube_ActionForm
{
    /**
     * getTokenName
     * 
     * @param   void
     * 
     * @return  string
    **/
    public function getTokenName()
    {
        return "module.xelfinder.ContentDeleteForm.TOKEN";
    }

    /**
     * prepare
     * 
     * @param   void
     * 
     * @return  void
    **/
    public function prepare()
    {
        //
        // Set form properties
        //
        $this->mFormProperties['content_id'] = new XCube_IntProperty('content_id');
    
        //
        // Set field properties
        //
        $this->mFieldProperties['content_id'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['content_id']->setDependsByArray(array('required'));
        $this->mFieldProperties['content_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_CONTENT_ID);
    }

    /**
     * load
     * 
     * @param   XoopsSimpleObject  &$obj
     * 
     * @return  void
    **/
    public function load(/*** XoopsSimpleObject ***/ &$obj)
    {
        $this->set('content_id', $obj->get('content_id'));
    }

    /**
     * update
     * 
     * @param   XoopsSimpleObject  &$obj
     * 
     * @return  void
    **/
    public function update(/*** XoopsSimpleObject ***/ &$obj)
    {
        $obj->set('content_id', $this->get('content_id'));
    }
}

?>
