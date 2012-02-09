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

require_once XOOPS_TRUST_PATH . '/modules/xelfinder/preload/AssetPreload.class.php';
Xelfinder_AssetPreloadBase::prepare(basename(dirname(dirname(__FILE__))));

?>
