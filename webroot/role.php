<?php

include '../init.inc.php';
include '../class/Role.class.php';
$name = isset($_REQUEST['role_name']) && $_REQUEST['role_name'] ? trim($_REQUEST['role_name']) : '';
$action = isset($_REQUEST['action']) && $_REQUEST['action'] ? $_REQUEST['action'] : 'list';
$id = isset($_REQUEST['id']) && ($_REQUEST['id'] > 0) ? (int) $_REQUEST['id'] : 0;
switch ($action) {
    case 'list':
        $list = Role::getAllRoleList();
        break;

    case 'insert':
        try {
            Role::addRole($name);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.location.href="' . URL . '/role.php"';
        }
        echo '</script>';
        break;
    case 'modify':
        $info = Role::getInfoById($id);
        break;
    case 'del':
        try {
            Role::delRole($id);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.location.href="' . URL . '/role.php"';
        }
        echo '</script>';
        break;
    case 'update':
        try {
            Role::updateRole($name, $id);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.location.href="' . URL . '/role.php"';
        }
        echo '</script>';
}
$tpl->assign('info', $info);
$tpl->assign('action', $action);
$tpl->assign('list', $list);
$tpl->display('role.tpl');