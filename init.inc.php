<?php
include '../Smarty/Smarty.class.php';
include '../config/config.inc.php';

$tpl=new Smarty;

$tpl->template_dir="../template";
$tpl->compile_dir="../compiled";
$tpl->left_delimiter='<{';
$tpl->right_delimiter='}>';

