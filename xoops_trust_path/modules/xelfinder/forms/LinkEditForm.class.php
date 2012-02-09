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
 * Xelfinder_LinkEditForm
**/
class Xelfinder_LinkEditForm extends XCube_ActionForm
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
		return "module.xelfinder.LinkEditForm.TOKEN";
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
        $this->mFormProperties['link_id'] = new XCube_IntProperty('link_id');
        $this->mFormProperties['title'] = new XCube_StringProperty('title');
        $this->mFormProperties['file_id'] = new XCube_IntProperty('file_id');
        $this->mFormProperties['mid'] = new XCube_IntProperty('mid');
        $this->mFormProperties['param'] = new XCube_StringProperty('param');
        $this->mFormProperties['val'] = new XCube_StringProperty('val');
        $this->mFormProperties['uri'] = new XCube_TextProperty('uri');
        $this->mFormProperties['posttime'] = new XCube_IntProperty('posttime');

	
		//
		// Set field properties
		//
       $this->mFieldProperties['link_id'] = new XCube_FieldProperty($this);
$this->mFieldProperties['link_id']->setDependsByArray(array('required'));
$this->mFieldProperties['link_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_LINK_ID);
       $this->mFieldProperties['title'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['title']->setDependsByArray(array('required','maxlength'));
        $this->mFieldProperties['title']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_TITLE);
        $this->mFieldProperties['title']->addMessage('maxlength', _MD_XELFINDER_ERROR_MAXLENGTH, _MD_XELFINDER_LANG_TITLE, '255');
        $this->mFieldProperties['title']->addVar('maxlength', '255');
       $this->mFieldProperties['file_id'] = new XCube_FieldProperty($this);
$this->mFieldProperties['file_id']->setDependsByArray(array('required'));
$this->mFieldProperties['file_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_FILE_ID);
       $this->mFieldProperties['mid'] = new XCube_FieldProperty($this);
$this->mFieldProperties['mid']->setDependsByArray(array('required'));
$this->mFieldProperties['mid']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_MID);
       $this->mFieldProperties['param'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['param']->setDependsByArray(array('required','maxlength'));
        $this->mFieldProperties['param']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_PARAM);
        $this->mFieldProperties['param']->addMessage('maxlength', _MD_XELFINDER_ERROR_MAXLENGTH, _MD_XELFINDER_LANG_PARAM, '25');
        $this->mFieldProperties['param']->addVar('maxlength', '25');
       $this->mFieldProperties['val'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['val']->setDependsByArray(array('required','maxlength'));
        $this->mFieldProperties['val']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_VAL);
        $this->mFieldProperties['val']->addMessage('maxlength', _MD_XELFINDER_ERROR_MAXLENGTH, _MD_XELFINDER_LANG_VAL, '25');
        $this->mFieldProperties['val']->addVar('maxlength', '25');
       $this->mFieldProperties['uri'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['uri']->setDependsByArray(array('required'));
        $this->mFieldProperties['uri']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_URI);
        $this->mFieldProperties['posttime'] = new XCube_FieldProperty($this);
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
        $this->set('link_id', $obj->get('link_id'));
        $this->set('title', $obj->get('title'));
        $this->set('file_id', $obj->get('file_id'));
        $this->set('mid', $obj->get('mid'));
        $this->set('param', $obj->get('param'));
        $this->set('val', $obj->get('val'));
        $this->set('uri', $obj->get('uri'));
        $this->set('posttime', $obj->get('posttime'));
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
        $obj->set('title', $this->get('title'));
        $obj->set('file_id', $this->get('file_id'));
        $obj->set('mid', $this->get('mid'));
        $obj->set('param', $this->get('param'));
        $obj->set('val', $this->get('val'));
        $obj->set('uri', $this->get('uri'));
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
