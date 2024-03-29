<?php
/**
 * @package xelfinder
 * @version $Id: TagClient.class.php,v 1.1 2007/05/15 02:35:07 minahito Exp $
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

/**
 * tag client delegate
**/
class Xelfinder_TagClientDelegate implements Legacy_iTagClientDelegate
{
    /**
     * getClientList
     *
     * @param mixed[]   &$list
     *  @list[]['dirname']
     *  @list[]['dataname']
     * @param string    $tDirname   Legacy_Tag module's dirname
     *
     * @return  void
     */ 
    public static function getClientList(/*** mixed[] ***/ &$list, /*** string ***/ $tDirname)
    {
        //don't call this method multiple times when site owner duplicate.
        static $isCalled = false;
        if($isCalled === true){
            return;
        }
    
        //get dirname list of xelfinder
        $dirnames = Legacy_Utils::getDirnameListByTrustDirname(basename(dirname(dirname(dirname(__FILE__)))));
    
        foreach($dirnames as $dir){
            //setup client module info
            if(Xelfinder_Utils::getModuleConfig($dir, 'tag_dirname')==$tDirname){
                $list[] = array('dirname'=>$dir, 'dataname'=>'file');

            }
        }
    
        $isCalled = true;
    }

    /**
     * getClientData
     *
     * @param mixed     &$list
     * @param string    $dirname
     * @param string    $dataname
     * @param int[]     $idList
     *
     * @return  void
     */ 
    public static function getClientData(/*** mixed ***/ &$list, /*** string ***/ $dirname, /*** string ***/ $dataname, /*** int[] ***/ $idList)
    {
        //default
        $limit = 5;
        $start =0;
    
        $handler = Legacy_Utils::getModuleHandler($dataname, $dirname);
        if(! $handler){
            return;
        }
    
        //setup client module info
        $cri = Xelfinder_Utils::getListCriteria($dirname);
        $cri->add(new Criteria($handler->mPrimary, $idList, 'IN'));
        $objs = $handler->getObjects($cri, $limit, $start);
        if(count($objs)>0){
	        $list['dirname'][] = $dirname;
	        $list['dataname'][] = $dataname;
	        $list['data'][] = $objs;
	        $handler = xoops_gethandler('module');
	        $module = $handler->getByDirname($dirname);
	        $list['title'][] = $module->name();
	        $list['template_name'][] = 'db:'.$dirname .'_'. $dataname .'_inc_view.html';
	    }
    }
}

?>
