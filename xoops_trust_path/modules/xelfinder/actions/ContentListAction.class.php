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

require_once XELFINDER_TRUST_PATH . '/class/AbstractListAction.class.php';

/**
 * Xelfinder_ContentListAction
**/
class Xelfinder_ContentListAction extends Xelfinder_AbstractListAction
{
	const DATANAME = 'content';


	/**
	 * prepare
	 * 
	 * @param	void
	 * 
	 * @return	bool
	**/
	public function prepare()
	{
		parent::prepare();

		return true;
	}

	/**
	 * executeViewIndex
	 * 
	 * @param	XCube_RenderTarget	&$render
	 * 
	 * @return	void
	**/
	public function executeViewIndex(/*** XCube_RenderTarget ***/ &$render)
	{
		$render->setTemplateName($this->mAsset->mDirname . '_content_list.html');
		$render->setAttribute('objects', $this->mObjects);
		$render->setAttribute('dirname', $this->mAsset->mDirname);
		$render->setAttribute('dataname', self::DATANAME);
		$render->setAttribute('pageNavi', $this->mFilter->mNavi);
	}
}

?>
