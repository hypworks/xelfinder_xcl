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

define('XELFINDER_LINK_SORT_KEY_LINK_ID', 1);
define('XELFINDER_LINK_SORT_KEY_TITLE', 2);
define('XELFINDER_LINK_SORT_KEY_FILE_ID', 3);
define('XELFINDER_LINK_SORT_KEY_MID', 4);
define('XELFINDER_LINK_SORT_KEY_PARAM', 5);
define('XELFINDER_LINK_SORT_KEY_VAL', 6);
define('XELFINDER_LINK_SORT_KEY_URI', 7);
define('XELFINDER_LINK_SORT_KEY_POSTTIME', 8);

define('XELFINDER_LINK_SORT_KEY_DEFAULT', XELFINDER_LINK_SORT_KEY_LINK_ID);

/**
 * Xelfinder_LinkFilterForm
**/
class Xelfinder_LinkFilterForm extends Xelfinder_AbstractFilterForm
{
    public /*** string[] ***/ $mSortKeys = array(
 	   XELFINDER_LINK_SORT_KEY_LINK_ID => 'link_id',
 	   XELFINDER_LINK_SORT_KEY_TITLE => 'title',
 	   XELFINDER_LINK_SORT_KEY_FILE_ID => 'file_id',
 	   XELFINDER_LINK_SORT_KEY_MID => 'mid',
 	   XELFINDER_LINK_SORT_KEY_PARAM => 'param',
 	   XELFINDER_LINK_SORT_KEY_VAL => 'val',
 	   XELFINDER_LINK_SORT_KEY_URI => 'uri',
 	   XELFINDER_LINK_SORT_KEY_POSTTIME => 'posttime',

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
        return XELFINDER_LINK_SORT_KEY_DEFAULT;
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
    
		if (($value = $root->mContext->mRequest->getRequest('link_id')) !== null) {
			$this->mNavi->addExtra('link_id', $value);
			$this->_mCriteria->add(new Criteria('link_id', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('title')) !== null) {
			$this->mNavi->addExtra('title', $value);
			$this->_mCriteria->add(new Criteria('title', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('file_id')) !== null) {
			$this->mNavi->addExtra('file_id', $value);
			$this->_mCriteria->add(new Criteria('file_id', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('mid')) !== null) {
			$this->mNavi->addExtra('mid', $value);
			$this->_mCriteria->add(new Criteria('mid', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('param')) !== null) {
			$this->mNavi->addExtra('param', $value);
			$this->_mCriteria->add(new Criteria('param', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('val')) !== null) {
			$this->mNavi->addExtra('val', $value);
			$this->_mCriteria->add(new Criteria('val', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('uri')) !== null) {
			$this->mNavi->addExtra('uri', $value);
			$this->_mCriteria->add(new Criteria('uri', $value));
		}
		if (($value = $root->mContext->mRequest->getRequest('posttime')) !== null) {
			$this->mNavi->addExtra('posttime', $value);
			$this->_mCriteria->add(new Criteria('posttime', $value));
		}

    
        $this->_mCriteria->addSort($this->getSort(), $this->getOrder());
    }
}

?>
