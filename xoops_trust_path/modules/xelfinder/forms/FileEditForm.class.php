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
 * Xelfinder_FileEditForm
**/
class Xelfinder_FileEditForm extends XCube_ActionForm
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
		return "module.xelfinder.FileEditForm.TOKEN";
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
        $this->mFormProperties['file_id'] = new XCube_IntProperty('file_id');
        $this->mFormProperties['name'] = new XCube_StringProperty('name');
        $this->mFormProperties['uid'] = new XCube_IntProperty('uid');
        $this->mFormProperties['parent_id'] = new XCube_IntProperty('parent_id');
        $this->mFormProperties['size'] = new XCube_IntProperty('size');
        $this->mFormProperties['mtime'] = new XCube_IntProperty('mtime');
        $this->mFormProperties['perm'] = new XCube_StringProperty('perm');
        $this->mFormProperties['umask'] = new XCube_StringProperty('umask');
        $this->mFormProperties['c_type'] = new XCube_IntProperty('c_type');
        $this->mFormProperties['mime'] = new XCube_StringProperty('mime');
        $this->mFormProperties['width'] = new XCube_IntProperty('width');
        $this->mFormProperties['height'] = new XCube_IntProperty('height');
        $this->mFormProperties['ctime'] = new XCube_IntProperty('ctime');
        $this->mFormProperties['tags'] = new XCube_TextProperty('tags');

	
		//
		// Set field properties
		//
       $this->mFieldProperties['file_id'] = new XCube_FieldProperty($this);
$this->mFieldProperties['file_id']->setDependsByArray(array('required'));
$this->mFieldProperties['file_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_FILE_ID);
       $this->mFieldProperties['name'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['name']->setDependsByArray(array('required','maxlength'));
        $this->mFieldProperties['name']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_NAME);
        $this->mFieldProperties['name']->addMessage('maxlength', _MD_XELFINDER_ERROR_MAXLENGTH, _MD_XELFINDER_LANG_NAME, '255');
        $this->mFieldProperties['name']->addVar('maxlength', '255');
        $this->mFieldProperties['uid'] = new XCube_FieldProperty($this);
       $this->mFieldProperties['parent_id'] = new XCube_FieldProperty($this);
$this->mFieldProperties['parent_id']->setDependsByArray(array('required'));
$this->mFieldProperties['parent_id']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_PARENT_ID);
       $this->mFieldProperties['size'] = new XCube_FieldProperty($this);
$this->mFieldProperties['size']->setDependsByArray(array('required'));
$this->mFieldProperties['size']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_SIZE);
        $this->mFieldProperties['mtime'] = new XCube_FieldProperty($this);       $this->mFieldProperties['perm'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['perm']->setDependsByArray(array('required','maxlength'));
        $this->mFieldProperties['perm']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_PERM);
        $this->mFieldProperties['perm']->addMessage('maxlength', _MD_XELFINDER_ERROR_MAXLENGTH, _MD_XELFINDER_LANG_PERM, '3');
        $this->mFieldProperties['perm']->addVar('maxlength', '3');
       $this->mFieldProperties['umask'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['umask']->setDependsByArray(array('required','maxlength'));
        $this->mFieldProperties['umask']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_UMASK);
        $this->mFieldProperties['umask']->addMessage('maxlength', _MD_XELFINDER_ERROR_MAXLENGTH, _MD_XELFINDER_LANG_UMASK, '3');
        $this->mFieldProperties['umask']->addVar('maxlength', '3');
       $this->mFieldProperties['c_type'] = new XCube_FieldProperty($this);
$this->mFieldProperties['c_type']->setDependsByArray(array('required'));
$this->mFieldProperties['c_type']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_C_TYPE);
       $this->mFieldProperties['mime'] = new XCube_FieldProperty($this);
        $this->mFieldProperties['mime']->setDependsByArray(array('required','maxlength'));
        $this->mFieldProperties['mime']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_MIME);
        $this->mFieldProperties['mime']->addMessage('maxlength', _MD_XELFINDER_ERROR_MAXLENGTH, _MD_XELFINDER_LANG_MIME, '255');
        $this->mFieldProperties['mime']->addVar('maxlength', '255');
       $this->mFieldProperties['width'] = new XCube_FieldProperty($this);
$this->mFieldProperties['width']->setDependsByArray(array('required'));
$this->mFieldProperties['width']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_WIDTH);
       $this->mFieldProperties['height'] = new XCube_FieldProperty($this);
$this->mFieldProperties['height']->setDependsByArray(array('required'));
$this->mFieldProperties['height']->addMessage('required', _MD_XELFINDER_ERROR_REQUIRED, _MD_XELFINDER_LANG_HEIGHT);
        $this->mFieldProperties['ctime'] = new XCube_FieldProperty($this);
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
        $this->set('file_id', $obj->get('file_id'));
        $this->set('name', $obj->get('name'));
        $this->set('uid', $obj->get('uid'));
        $this->set('parent_id', $obj->get('parent_id'));
        $this->set('size', $obj->get('size'));
        $this->set('mtime', $obj->get('mtime'));
        $this->set('perm', $obj->get('perm'));
        $this->set('umask', $obj->get('umask'));
        $this->set('c_type', $obj->get('c_type'));
        $this->set('mime', $obj->get('mime'));
        $this->set('width', $obj->get('width'));
        $this->set('height', $obj->get('height'));
        $this->set('ctime', $obj->get('ctime'));
      $tags = is_array($obj->mTag) ? implode(' ', $obj->mTag) : null;
        if(count($obj->mTag)>0) $tags = $tags.' ';
        $this->set('tags', $tags);
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
        $obj->set('name', $this->get('name'));
        $obj->set('parent_id', $this->get('parent_id'));
        $obj->set('size', $this->get('size'));
        $obj->set('perm', $this->get('perm'));
        $obj->set('umask', $this->get('umask'));
        $obj->set('c_type', $this->get('c_type'));
        $obj->set('mime', $this->get('mime'));
        $obj->set('width', $this->get('width'));
        $obj->set('height', $this->get('height'));
        $obj->mTag = explode(' ', trim($this->get('tags')));
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
