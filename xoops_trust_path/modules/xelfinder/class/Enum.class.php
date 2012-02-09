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

interface Xelfinder_AuthType
{
    const VIEW = "view";
    const POST = "post";
    const MANAGE = "manage";
}

?>
