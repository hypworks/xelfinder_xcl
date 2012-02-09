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
 * Xelfinder_LinkObject
**/
class Xelfinder_LinkObject extends Legacy_AbstractObject
{
    const PRIMARY = 'link_id';
    const DATANAME = 'link';
    public $mParentList = array('file');

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
        $this->initVar('link_id', XOBJ_DTYPE_INT, '', false);
        $this->initVar('title', XOBJ_DTYPE_STRING, '', false, 255);
        $this->initVar('file_id', XOBJ_DTYPE_INT, '', false);
        $this->initVar('mid', XOBJ_DTYPE_INT, '', false);
        $this->initVar('param', XOBJ_DTYPE_STRING, '', false, 25);
        $this->initVar('val', XOBJ_DTYPE_STRING, '', false, 25);
        $this->initVar('uri', XOBJ_DTYPE_TEXT, '', false);
        $this->initVar('posttime', XOBJ_DTYPE_INT, time(), false);
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
 * Xelfinder_LinkHandler
**/
class Xelfinder_LinkHandler extends Legacy_AbstractClientObjectHandler
{
    public /*** string ***/ $mTable = '{dirname}_link';
    public /*** string ***/ $mPrimary = 'link_id';
    public /*** string ***/ $mClass = 'Xelfinder_LinkObject';

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
