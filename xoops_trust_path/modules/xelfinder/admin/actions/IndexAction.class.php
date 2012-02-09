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

require_once XELFINDER_TRUST_PATH . '/class/AbstractAction.class.php';

/**
 * Xelfinder_Admin_IndexAction
**/
class Xelfinder_Admin_IndexAction extends Xelfinder_AbstractAction
{
	/**
	 * getDefaultView
	 * 
	 * @param	void
	 * 
	 * @return	Enum
	**/
	public function getDefaultView()
	{
		return XELFINDER_FRAME_VIEW_SUCCESS;
	}

	/**
	 * executeViewSuccess
	 * 
	 * @param	XCube_RenderTarget	&$render
	 * 
	 * @return	void
	**/
	public function executeViewSuccess(&$render)
	{
		$render->setTemplateName('admin.html');
		$render->setAttribute('adminMenu', $this->mModule->getAdminMenu());
	}
}

?>