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

/**
 * Xelfinder_FileObject
**/
class Xelfinder_FileObject extends Legacy_AbstractObject
{
    const PRIMARY = 'file_id';
    const DATANAME = 'file';
    public $mChildList = array('content','link');

    /**
     * __construct
     * 
     * @param   void
     * 
     * @return  void
    **/
    public function __construct()
    {
        parent::__construct();  
        $this->initVar('file_id', XOBJ_DTYPE_INT, '', false);
        $this->initVar('name', XOBJ_DTYPE_STRING, '', false, 255);
        $this->initVar('uid', XOBJ_DTYPE_INT, '', false);
        $this->initVar('parent_id', XOBJ_DTYPE_INT, '', false);
        $this->initVar('size', XOBJ_DTYPE_INT, '', false);
        $this->initVar('mtime', XOBJ_DTYPE_INT, time(), false);
        $this->initVar('perm', XOBJ_DTYPE_STRING, '', false, 3);
        $this->initVar('umask', XOBJ_DTYPE_STRING, '', false, 3);
        $this->initVar('c_type', XOBJ_DTYPE_INT, '', false);
        $this->initVar('mime', XOBJ_DTYPE_STRING, '', false, 255);
        $this->initVar('width', XOBJ_DTYPE_INT, '', false);
        $this->initVar('height', XOBJ_DTYPE_INT, '', false);
        $this->initVar('ctime', XOBJ_DTYPE_INT, time(), false);
   }

    /**
     * getShowStatus
     * 
     * @param   void
     * 
     * @return  string
    **/
    public function getShowStatus()
    {
        switch($this->get('status')){
            case Lenum_Status::DELETED:
                return _MD_LEGACY_STATUS_DELETED;
            case Lenum_Status::REJECTED:
                return _MD_LEGACY_STATUS_REJECTED;
            case Lenum_Status::POSTED:
                return _MD_LEGACY_STATUS_POSTED;
            case Lenum_Status::PUBLISHED:
                return _MD_LEGACY_STATUS_PUBLISHED;
        }
    }

	public function getImageNumber()
	{
		return 0;
	}

}

/**
 * Xelfinder_FileHandler
**/
class Xelfinder_FileHandler extends Legacy_AbstractClientObjectHandler
{
    public /*** string ***/ $mTable = '{dirname}_file';
    public /*** string ***/ $mPrimary = 'file_id';
    public /*** string ***/ $mClass = 'Xelfinder_FileObject';

    /**
     * __construct
     * 
     * @param   XoopsDatabase  &$db
     * @param   string  $dirname
     * 
     * @return  void
    **/
    public function __construct(/*** XoopsDatabase ***/ &$db,/*** string ***/ $dirname)
    {
        $this->mTable = strtr($this->mTable,array('{dirname}' => $dirname));
        parent::XoopsObjectGenericHandler($db);
    }

}

?>
