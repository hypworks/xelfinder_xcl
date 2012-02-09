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
 * Xelfinder_ContentEditForm
**/
class Xelfinder_ContentEditForm extends XCube_ActionForm
{
	/**
	 * getTokenName
	 * 
	 * @param	void
	 * 
	 * @return	string
	**/
	public function getTokenName()
	{
		return "module.xelfinder.ContentEditForm.TOKEN";
	}

	/**
	 * prepare
	 * 
	 * @param	void
	 * 
	 * @return	void
	**/
	public function prepare()
	{
		//
		// Set form properties
		//
        $this->mFormProperties['content_id'] = new XCube_IntProperty('content_id');
        $this->mFormProperties['content'] = new XCube_TextProperty('content');
        $this->mFormProperties['file_id'] = new XCube_IntProperty('file_id');

	
		//
		// Set field properties
		//
       $this->mFieldProperties['content_id'] = new XCube_FieldProperty($this);
$this->mFieldProperties['content_id']->setDependsByArray(array('required'));
$this->mFieldProperties['content_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_CONTENT_ID);
       $this->mFieldProperties['content'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['content']->setDependsByArray(array('required'));
        $this->mFieldProperties['content']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_CONTENT);
       $this->mFieldProperties['file_id'] = new XCube_FieldProperty($this);
$this->mFieldProperties['file_id']->setDependsByArray(array('required'));
$this->mFieldProperties['file_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_FILE_ID);

	}

	/**
	 * load
	 * 
	 * @param	XoopsSimpleObject  &$obj
	 * 
	 * @return	void
	**/
	public function load(/*** XoopsSimpleObject ***/ &$obj)
	{
        $this->set('content_id', $obj->get('content_id'));
        $this->set('content', $obj->get('content'));
        $this->set('file_id', $obj->get('file_id'));
	}

	/**
	 * update
	 * 
	 * @param	XoopsSimpleObject  &$obj
	 * 
	 * @return	void
	**/
	public function update(/*** XoopsSimpleObject ***/ &$obj)
	{
        $obj->set('content', $this->get('content'));
        $obj->set('file_id', $this->get('file_id'));
	}

	/**
	 * _makeUnixtime
	 * 
	 * @param	string	$key
	 * 
	 * @return	void
	**/
	protected function _makeUnixtime($key)
	{
		$timeArray = explode('-', $this->get($key));
		return mktime(0, 0, 0, $timeArray[1], $timeArray[2], $timeArray[0]);
	}
}

?>
