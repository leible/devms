<?php

include '../init.inc.php';
include '../class/Type.class.php';

$name = isset($_REQUEST['type_name']) && $_REQUEST['type_name'] ? trim($_REQUEST['type_name']) : '';
$status = isset($_REQUEST['status']) && $_REQUEST['status'] ? trim($_REQUEST['status']) : 1;
$action = isset($_REQUEST['action']) && $_REQUEST['action'] ? trim($_REQUEST['action']) : 'list';
$id = isset($_REQUEST['id']) && ($_REQUEST['id'] > 0) ? (int)$_REQUEST['id'] : 0;
switch ($action) {
    case 'list' :
        $list = Type::getAllTypeList();
        //var_dump($list);
        break;
    case 'insert' :
        try {
            Type::addType($name);
        } catch (Exception $exc) {
            $code = $exc->getCode();
            $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.loction.herf="' . URL . '/type.php"';
        }
        echo '</script>';
        break;
    case 'modify':
        $info = Type::getInfoById($id);
        break;
    case 'del':
        try {
            Type::delType($id);
        } catch (Exception $exc) {
            echo $code = $exc->getCode();
            echo $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.loction.herf="' . URL . '/type.php"';
        }
        echo '<script>';
        break;
    case 'update';
        try {
            Type::updateType($name, $id);
        } catch (Exception $exc) {
            echo $code = $exc->getCode();
            echo $msg = $exc->getMessage();
        }
        echo '<script>';
        if ($code) {
            echo 'alert("' . $msg . '")';
        } else {
            echo 'window.loction.herf="' . URL . '/type.php"';
        }
        echo '</script>';
}

//modify那一动作获取的值
$tpl->assign('info', $info);
$tpl->assign('action', $action);
$tpl->assign('list', $list);
$tpl->display('type.tpl');
