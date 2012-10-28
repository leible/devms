<?php
include '../init.inc.php';
include '../class/User.class.php';
include '../class/Role.class.php';

$action = isset($_REQUEST['action']) && $_REQUEST['action'] ? trim($_REQUEST['action']) : 'list';
$name = isset($_REQUEST['user_name']) && $_REQUEST['user_name'] ? trim($_REQUEST['user_name']) : '';
$role_id = isset($_REQUEST['role_id']) && $_REQUEST['role_id'] ? trim($_REQUEST['role_id']) : 0;
$id = isset($_REQUEST['id']) && $_REQUEST['id'] ? trim($_REQUEST['id']) : 0;
$roleList = Role::getAllRoleList();
switch ($action) {
    case 'list':
        $userList = User::getAllUserList();
        break;
    case 'add':
        try {
            //这里少一个参数role_id
            User::addUser($name, $role_id);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("'.$code.$msg.'")';
        } else {
            echo 'window.location.href="'.URL.'/user.php"';
        }
        echo '</script>';
        break;

    case 'del':
        try {
            User::delUser($id);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("'.$code.$msg.'")';
        } else {
            echo 'window.location.href="'.URL.'/user.php"';
        }
        echo '</script>';
        break;

    case 'update':
        try {
            User::updateUser($name, $role_id, $id);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        echo '<script>';
        if($code){
            echo 'alert("'.$msg.'")';
        }  else {
            echo 'window.loction.href="'.URL.'/user.php"';
        }
        echo '</script>';
        break;

    case 'modify':
        $info = User::getInfoById($id);
        break;

}

$tpl->assign('action', $action);
$tpl->assign('info', $info);
$tpl->assign('userList', $userList);
$tpl->assign('roleList', $roleList);
$tpl->display('user.tpl');