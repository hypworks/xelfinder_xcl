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

require_once XELFINDER_TRUST_PATH . '/class/AbstractFilterForm.class.php';

define('XELFINDER_FILE_SORT_KEY_FILE_ID', 1);
define('XELFINDER_FILE_SORT_KEY_NAME', 2);
define('XELFINDER_FILE_SORT_KEY_UID', 3);
define('XELFINDER_FILE_SORT_KEY_PARENT_ID', 4);
define('XELFINDER_FILE_SORT_KEY_SIZE', 5);
define('XELFINDER_FILE_SORT_KEY_MTIME', 6);
define('XELFINDER_FILE_SORT_KEY_PERM', 7);
define('XELFINDER_FILE_SORT_KEY_UMASK', 8);
define('XELFINDER_FILE_SORT_KEY_C_TYPE', 9);
define('XELFINDER_FILE_SORT_KEY_MIME', 10);
define('XELFINDER_FILE_SORT_KEY_WIDTH', 11);
define('XELFINDER_FILE_SORT_KEY_HEIGHT', 12);
define('XELFINDER_FILE_SORT_KEY_CTIME', 13);

define('XELFINDER_FILE_SORT_KEY_DEFAULT', XELFINDER_FILE_SORT_KEY_FILE_ID);

/**
 * Xelfinder_FileFilterForm
**/
class Xelfinder_FileFilterForm extends Xelfinder_AbstractFilterForm
{
    public /*** string[] ***/ $mSortKeys = array(
 	   XELFINDER_FILE_SORT_KEY_FILE_ID => 'file_id',
 	   XELFINDER_FILE_SORT_KEY_NAME => 'name',
 	   XELFINDER_FILE_SORT_KEY_UID => 'uid',
 	   XELFINDER_FILE_SORT_KEY_PARENT_ID => 'parent_id',
 	   XELFINDER_FILE_SORT_KEY_SIZE => 'size',
 	   XELFINDER_FILE_SORT_KEY_MTIME => 'mtime',
 	   XELFINDER_FILE_SORT_KEY_PERM => 'perm',
 	   XELFINDER_FILE_SORT_KEY_UMASK => 'umask',
 	   XELFINDER_FILE_SORT_KEY_C_TYPE => 'c_type',
 	   XELFINDER_FILE_SORT_KEY_MIME => 'mime',
 	   XELFINDER_FILE_SORT_KEY_WIDTH => 'width',
 	   XELFINDER_FILE_SORT_KEY_HEIGHT => 'height',
 	   XELFINDER_FILE_SORT_KEY_CTIME => 'ctime',

    );

    /**
     * getDefaultSortKey
     * 
     * @param   void
     * 
     * @return  void
    **/
    public function getDefaultSortKey()
    {
        return XELFINDER_FILE_SORT_KEY_DEFAULT;
    }

    /**
     * fetch
     * 
     * @param   void
     * 
     * @return  void
    **/
    public function fetch()
    {
        parent::fetch();
    
        $root =& XCube_Root::getSingleton();
    
		if (($value = $root->mContext->mRequest->getRequest('file_id')) !== null) {
			$this->mNavi->addExtra('file_id', $value);
			$this->_mCriteria->add(new Criteria('file_id', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('name')) !== null) {
			$this->mNavi->addExtra('name', $value);
			$this->_mCriteria->add(new Criteria('name', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('uid')) !== null) {
			$this->mNavi->addExtra('uid', $value);
			$this->_mCriteria->add(new Criteria('uid', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('parent_id')) !== null) {
			$this->mNavi->addExtra('parent_id', $value);
			$this->_mCriteria->add(new Criteria('parent_id', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('size')) !== null) {
			$this->mNavi->addExtra('size', $value);
			$this->_mCriteria->add(new Criteria('size', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('mtime')) !== null) {
			$this->mNavi->addExtra('mtime', $value);
			$this->_mCriteria->add(new Criteria('mtime', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('perm')) !== null) {
			$this->mNavi->addExtra('perm', $value);
			$this->_mCriteria->add(new Criteria('perm', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('umask')) !== null) {
			$this->mNavi->addExtra('umask', $value);
			$this->_mCriteria->add(new Criteria('umask', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('c_type')) !== null) {
			$this->mNavi->addExtra('c_type', $value);
			$this->_mCriteria->add(new Criteria('c_type', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('mime')) !== null) {
			$this->mNavi->addExtra('mime', $value);
			$this->_mCriteria->add(new Criteria('mime', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('width')) !== null) {
			$this->mNavi->addExtra('width', $value);
			$this->_mCriteria->add(new Criteria('width', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('height')) !== null) {
			$this->mNavi->addExtra('height', $value);
			$this->_mCriteria->add(new Criteria('height', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('ctime')) !== null) {
			$this->mNavi->addExtra('ctime', $value);
			$this->_mCriteria->add(new Criteria('ctime', $value));
		}

    
        $this->_mCriteria->addSort($this->getSort(), $this->getOrder());
    }
}

?>
