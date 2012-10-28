<?php
require_once '../lib/Mysql.class.php';

class User {
    const TABLE_NAME = 'pre_user';

    public static function getAllUserList() {
        return Mysql::select(self::TABLE_NAME);
    }

    public static function addUser($name, $role_id) {
        self::_checkName($name);
        $info = self::getInfoByName($name);
        if (is_array($info) && count($info) > 0) {
            throw new Exception('用户已经存在', 1);
        }
        $data = array(
            'user_name' => $name,
            'role_id' => $role_id
        );
        $res = Mysql::insert(self::TABLE_NAME, $data);
        if (!$res)
            throw new Exception('插入失败', 1);

    }

    public static function getInfoByName($name) {
        $where = array(
            'user_name' => $name
        );
        Mysql::selectOne(self::TABLE_NAME, $where);
    }

    public static function getInfoById($id) {
        $where = array(
            'id' => $id
        );
        Mysql::selectOne(self::TABLE_NAME, $where);
    }

    private static function _checkName($name){
        $name = isset($name) ? trim($name) : '';
        if (!$name) throw new Exception('请输入用户名', 1);
    }

    public static function delUser($id) {
        $id = $id ? (int)$id : 0;
        if (!$id)
            throw new Exception('请选择一个操作项', 1);
        $where = array(
            'id'=>$id
        );
        $res = Mysql::delete(self::TABLE_NAME, $where);
        if (!$res) {
            throw new Exception('删除失败', 1);
        }
    }

    public static function updateUser($name, $role_id, $id) {
        $id = $id>0 ? (int)$id : 0;
        if (!$id) {
            throw new Exception('请选择一项', 1);
        }
        $role_id = $role_id>0 ? (int)$role_id : 0;
        if (!$role_id) {
            throw new Exception('请选择一项', 1);
        }
        $info = self::getInfoByName($name);
        if (is_array($info) && (count($info) > 0) && $info['id'] != $id ) {
            throw new Exception('用户名已存在', 1);
        }
        $where = array(
            'id' => $id
        );
        $data = array(
            'user_name' => $name,
            'role_id' => $role_id
        );
        $res = Mysql::update(self::TABLE_NAME, $data, $where);
        if (!$res) throw new Exception('更新失败', 1);
    }


}
