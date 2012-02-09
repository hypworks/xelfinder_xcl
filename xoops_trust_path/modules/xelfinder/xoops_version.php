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

if(!defined('XELFINDER_TRUST_PATH'))
{
    define('XELFINDER_TRUST_PATH',XOOPS_TRUST_PATH . '/modules/xelfinder');
}

require_once XELFINDER_TRUST_PATH . '/class/XelfinderUtils.class.php';

//
// Define a basic manifesto.
//
$modversion['name'] = $myDirName;
$modversion['version'] = 0.01;
$modversion['description'] = _MI_XELFINDER_DESC_XELFINDER;
$modversion['author'] = _MI_XELFINDER_LANG_AUTHOR;
$modversion['credits'] = _MI_XELFINDER_LANG_CREDITS;
$modversion['help'] = 'help.html';
$modversion['license'] = 'GPL';
$modversion['official'] = 0;
$modversion['image'] = 'images/module_icon.png';
$modversion['dirname'] = $myDirName;
$modversion['trust_dirname'] = 'xelfinder';

$modversion['cube_style'] = true;
$modversion['legacy_installer'] = array(
    'installer'   => array(
        'class'     => 'Installer',
        'namespace' => 'Xelfinder',
        'filepath'  => XELFINDER_TRUST_PATH . '/admin/class/installer/XelfinderInstaller.class.php'
    ),
    'uninstaller' => array(
        'class'     => 'Uninstaller',
        'namespace' => 'Xelfinder',
        'filepath'  => XELFINDER_TRUST_PATH . '/admin/class/installer/XelfinderUninstaller.class.php'
    ),
    'updater' => array(
        'class'     => 'Updater',
        'namespace' => 'Xelfinder',
        'filepath'  => XELFINDER_TRUST_PATH . '/admin/class/installer/XelfinderUpdater.class.php'
    )
);
$modversion['disable_legacy_2nd_installer'] = false;

$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'] = array(
//    '{prefix}_{dirname}_xxxx',
##[cubson:tables]
    '{prefix}_{dirname}_file',
    '{prefix}_{dirname}_content',
    '{prefix}_{dirname}_link',

##[/cubson:tables]
);

//
// Templates. You must never change [cubson] chunk to get the help of cubson.
//
$modversion['templates'] = array(
/*
    array(
        'file'        => '{dirname}_xxx.html',
        'description' => _MI_XELFINDER_TPL_XXX
    ),
*/
##[cubson:templates]
        array('file' => '{dirname}_file_delete.html','description' => _MI_XELFINDER_TPL_FILE_DELETE),
        array('file' => '{dirname}_file_edit.html','description' => _MI_XELFINDER_TPL_FILE_EDIT),
        array('file' => '{dirname}_file_list.html','description' => _MI_XELFINDER_TPL_FILE_LIST),
        array('file' => '{dirname}_file_view.html','description' => _MI_XELFINDER_TPL_FILE_VIEW),
        array('file' => '{dirname}_content_delete.html','description' => _MI_XELFINDER_TPL_CONTENT_DELETE),
        array('file' => '{dirname}_content_edit.html','description' => _MI_XELFINDER_TPL_CONTENT_EDIT),
        array('file' => '{dirname}_content_list.html','description' => _MI_XELFINDER_TPL_CONTENT_LIST),
        array('file' => '{dirname}_content_view.html','description' => _MI_XELFINDER_TPL_CONTENT_VIEW),
        array('file' => '{dirname}_link_delete.html','description' => _MI_XELFINDER_TPL_LINK_DELETE),
        array('file' => '{dirname}_link_edit.html','description' => _MI_XELFINDER_TPL_LINK_EDIT),
        array('file' => '{dirname}_link_list.html','description' => _MI_XELFINDER_TPL_LINK_LIST),
        array('file' => '{dirname}_link_view.html','description' => _MI_XELFINDER_TPL_LINK_VIEW),

##[/cubson:templates]
);

//
// Admin panel setting
//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php?action=Index';
$modversion['adminmenu'] = array(
/*
    array(
        'title'    => _MI_XELFINDER_LANG_XXXX,
        'link'     => 'admin/index.php?action=xxx',
        'keywords' => _MI_XELFINDER_KEYWORD_XXX,
        'show'     => true,
        'absolute' => false
    ),
*/
##[cubson:adminmenu]
##[/cubson:adminmenu]
);

//
// Public side control setting
//
$modversion['hasMain'] = 1;
$modversion['hasSearch'] = 0;
$modversion['sub'] = array(
/*
    array(
        'name' => _MI_XELFINDER_LANG_SUB_XXX,
        'url'  => 'index.php?action=XXX'
    ),
*/
##[cubson:submenu]
##[/cubson:submenu]
);

//
// Config setting
//
$modversion['config'] = array(
/*
    array(
        'name'          => 'xxxx',
        'title'         => '_MI_XELFINDER_TITLE_XXXX',
        'description'   => '_MI_XELFINDER_DESC_XXXX',
        'formtype'      => 'xxxx',
        'valuetype'     => 'xxx',
        'options'       => array(xxx => xxx,xxx => xxx),
        'default'       => 0
    ),
*/

    array(
        'name'          => 'tag_dirname' ,
        'title'         => '_MI_XELFINDER_LANG_TAG_DIRNAME' ,
        'description'   => '_MI_XELFINDER_DESC_TAG_DIRNAME' ,
        'formtype'      => 'server_module',
        'valuetype'     => 'text',
        'default'       => '',
        'options'       => array('none','tag')
    ) ,
                    
    array(
        'name'          => 'css_file' ,
        'title'         => "_MI_XELFINDER_LANG_CSS_FILE" ,
        'description'   => "_MI_XELFINDER_DESC_CSS_FILE" ,
        'formtype'      => 'textbox' ,
        'valuetype'     => 'text' ,
        'default'       => '/modules/'.$myDirName.'/style.css',
        'options'       => array()
    ) ,
##[cubson:config]
##[/cubson:config]
);

//
// Block setting
//
$modversion['blocks'] = array(
/*
    x => array(
        'func_num'          => x,
        'file'              => 'xxxBlock.class.php',
        'class'             => 'xxx',
        'name'              => _MI_XELFINDER_BLOCK_NAME_xxx,
        'description'       => _MI_XELFINDER_BLOCK_DESC_xxx,
        'options'           => '',
        'template'          => '{dirname}_block_xxx.html',
        'show_all_module'   => true,
        'visible_any'       => true
    ),
*/
##[cubson:block]
##[/cubson:block]
);

?>
