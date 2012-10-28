<?php

include '../init.inc.php';
include '../class/Dev.class.php';
include '../class/Type.class.php';
$name = isset($_REQUEST['dev_name']) && $_REQUEST['dev_name'] ? trim($_REQUEST['dev_name']) : '';
$action = isset($_REQUEST['action']) && $_REQUEST['action'] ? trim($_REQUEST['action']) : 'list';
$id = isset($_REQUEST['id']) && ($_REQUEST['id'] > 0) ? (int) $_REQUEST['id'] : 0;
$sn = isset($_REQUEST['sn']) && $_REQUEST['sn'] ? trim($_REQUEST['sn']) : '';
$type_id = isset($_REQUEST['type_id']) && $_REQUEST['type_id'] ? trim($_REQUEST['type_id']) : '';
$buy_user = isset($_REQUEST['buy_user']) && $_REQUEST['buy_user'] ? trim($_REQUEST['buy_user']) : '';
$status= isset($_REQUEST['status']) && $_REQUEST['status'] ? ($_REQUEST['status']) : '1';
$searchName = isset($_REQUEST['searchName']) && $_REQUEST['searchName'] ? trim($_REQUEST['searchName']) : '';
$keyWord = isset($_REQUEST['keyWord']) && $_REQUEST['keyWord'] ? trim($_REQUEST['keyWord']) : '';

//$roleList = Role::getAllRoleList();
//$userList = User::getAllUserList();
$typelist = Type::getAllTypeList();

switch ($action) {
    case 'list':
        $title = '设备列表';
        $list = Dev::getAllDevList();
        break;
    case 'add':
        $title = '添加设备';
        //显示方法
        break;
    case 'insert':
        try {
            Dev::addDev($name, $sn, $type_id, $buy_user,$status);
            echo Mysql::getLastSQL();
        } catch (Exception $exc) {
            echo $code = $exc->getCode();
            echo $msg = $exc->getMessage();
        }
//        echo '<script>';
//        if ($code) {
//            echo 'alert("' . $msg . '")';
//        } else {
//            echo 'window.location.href="' . URL . '/dev.php"';
//        }
//        echo '</script>';
        break;
    case 'modify':
        $title = '更新设备';
        $info = Dev::getInfoById($id);
        break;
    case 'search':
        $title = '设备搜索';
        try {
            $searchList = Dev::searchDev($searchName,$type_id,$keyWord,$status);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        break;


    case 'del':
        try {
            Dev::delDev($id);
        } catch (Exception $exc) {
            echo $code = $exc->getCode();
            echo $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.location.href="' . URL . '/dev.php"';
        }
        echo '</script>';
        break;
    case 'forbid':
        try {
            Dev::forbidDev($id);
        } catch (Exception $exc) {
            $code =  $exc->getCode();
            $msg = $exc->getMessage();
        }
        break;

    case 'update':
        try {
            Dev::updateDev($name, $id, $sn, $type_id, $buy_user,$status);
        } catch (Exception $exc) {
            echo $code = $exc->getCode();
            echo $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.location.href="' . URL . '/dev.php"';
        }
        echo '</script>';
}
$tpl->assign('title', $title);
$tpl->assign('info', $info);
$tpl->assign('action', $action);
$tpl->assign('list', $list);
$tpl->assign('searchList',$searchList);
$tpl->assign('typelist',$typelist);
$tpl->assign('roleList',$roleList);
$tpl->assign('userList',$userList);
$tpl->display('dev.tpl');
?>
