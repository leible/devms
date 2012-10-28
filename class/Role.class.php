<?php
require_once '../lib/Mysql.class.php';

class Role {
    const TABLE_NAME = 'pre_role';

    public static function addRole($name) {
        //检测内容是否为空
        self::_checkName($name);
        //检测是否重复
        $info = self::getInfoByName($name);
        if (is_array($info) && (count($info) > 0)) {
            throw new Exception('角色名称已存在！', 1);
        }
        $data = array(
            'role_name' => $name,
        );
        $res = Mysql::insert(self::TABLE_NAME, $data);
        if (!$res) throw new Exception('插入数据库失败！', 1);
    }

    public static function getAllRoleList(){
        return Mysql::select(self::TABLE_NAME);
    }

    private static function _checkName($name) {
        $name = $name ? trim($name) : '';
        if (!$name) throw new Exception('请输入角色名称！', 1);
    }

    public static function getInfoById($id) {
        $id = $id > 0 ? (int)$id : 0;
        if (!$id) {
            throw new Exception('请选择一个操作对象', 1);
        }
        return Mysql::selectOne(self::TABLE_NAME, array('id' => $id));
    }

    public static function getInfoByName($name) {
        $where = array(
            'role_name' => $name,
        );
        return Mysql::selectOne(self::TABLE_NAME, $where);
    }

    public static function delRole($id){
        $id = $id > 0 ? (int)$id : 0;
        if (!$id) {
            throw new Exception('请选择一个操作对象', 1);
        }
        $where = array( 'id' => $id);
        $res = Mysql::delete(self::TABLE_NAME, $where);
        if (!$res) {
            throw new Exception('删除失败', 1);
        }
    }

    public static function updateRole($name, $id){
        self::_checkName($name);
        $id = $id > 0 ? (int)$id : 0;
        if (!$id) {
            throw new Exception('请选择一个操作对象', 1);
        }
        $info = self::getInfoByName($name);
        //检测是否角色名是否重复
        if (is_array($info) && (count($info) > 0) && ($info['id'] != $id)) {
            throw new Exception('角色名已经存在', 1);
        }

        $where = array( 'id' => $id);
        $data = array(
            'role_name' => $name
        );
        $res = Mysql::update(self::TABLE_NAME, $data, $where);
        if (!$res) {
            throw new Exception('更新失败', 1);
        }
    }

    public function __call($name, $arguments) {
        echo '您请求的方法'.$name.'不存在';
    }
}

?>
