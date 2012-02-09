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

define('XELFINDER_CONTENT_SORT_KEY_CONTENT_ID', 1);
define('XELFINDER_CONTENT_SORT_KEY_CONTENT', 2);
define('XELFINDER_CONTENT_SORT_KEY_FILE_ID', 3);

define('XELFINDER_CONTENT_SORT_KEY_DEFAULT', XELFINDER_CONTENT_SORT_KEY_CONTENT_ID);

/**
 * Xelfinder_ContentFilterForm
**/
class Xelfinder_ContentFilterForm extends Xelfinder_AbstractFilterForm
{
    public /*** string[] ***/ $mSortKeys = array(
 	   XELFINDER_CONTENT_SORT_KEY_CONTENT_ID => 'content_id',
 	   XELFINDER_CONTENT_SORT_KEY_CONTENT => 'content',
 	   XELFINDER_CONTENT_SORT_KEY_FILE_ID => 'file_id',

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
        return XELFINDER_CONTENT_SORT_KEY_DEFAULT;
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
    
		if (($value = $root->mContext->mRequest->getRequest('content_id')) !== null) {
			$this->mNavi->addExtra('content_id', $value);
			$this->_mCriteria->add(new Criteria('content_id', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('content')) !== null) {
			$this->mNavi->addExtra('content', $value);
			$this->_mCriteria->add(new Criteria('content', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('file_id')) !== null) {
			$this->mNavi->addExtra('file_id', $value);
			$this->_mCriteria->add(new Criteria('file_id', $value));
		}

    
        $this->_mCriteria->addSort($this->getSort(), $this->getOrder());
    }
}

?>
