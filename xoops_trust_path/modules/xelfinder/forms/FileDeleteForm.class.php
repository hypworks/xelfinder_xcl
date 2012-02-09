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
 * Xelfinder_FileDeleteForm
**/
class Xelfinder_FileDeleteForm extends XCube_ActionForm
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
        return "module.xelfinder.FileDeleteForm.TOKEN";
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
        $this->mFormProperties['file_id'] = new XCube_IntProperty('file_id');
    
        //
        // Set field properties
        //
        $this->mFieldProperties['file_id'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['file_id']->setDependsByArray(array('required'));
        $this->mFieldProperties['file_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_FILE_ID);
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
        $this->set('file_id', $obj->get('file_id'));
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
        $obj->set('file_id', $this->get('file_id'));
    }
}

?>
