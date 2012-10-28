<?php

require_once '../lib/Mysql.class.php';

class Dev {

    const TABLE_NAME = 'pre_dev';

    public static function addDev($name,$sn,$type_id,$buy_user,$status) {
        //检测设备名是否为空
        self::_checkName($name);
        //检测是否重复
        $info = self::getInfoByName($name);
        if (is_array($info) && (count($info) > 0)) {
            throw new Exception('设备名称已存在', 1);
        }
        $data = array(
            'dev_name' => $name,
            'sn' => $sn,
            'type_id' => $type_id,
            'buy_user' => $buy_user,
            'status' => $status
        );
        $res = Mysql::insert(self::TABLE_NAME, $data);
        if (!$res)
            throw new Exception('插入数据库失败', 1);
    }

    public static function getAllDevList() {
        return Mysql::select(self::TABLE_NAME);
    }

    private static function _checkName($name) {
        $name = $name ? trim($name) : '';
        if (!$name)
            throw new Exception('请输入设备名称', 1);
    }

    public static function getInfoById($id) {
        $id = $id > 0 ? (int) $id : 0;
        if (!$id) {
            throw new Exception('请选择一个操作对象', 1);
        }
        return Mysql::selectOne(self::TABLE_NAME, array('id' => $id));
    }

    public static function getInfoByName($name) {
        $where = array(
            'dev_name' => $name,
        );
        return Mysql::selectOne(self::TABLE_NAME, $where);
    }

    public static function delDev($id) {
        $id = $id > 0 ? (int) $id : 0;
        if (!$id) {
            throw new Exception('请选择一个操作对象', 1);
        }
        $where = array('id' => $id);
        $res = Mysql::delete(self::TABLE_NAME, $where);
        if (!res) {
            throw new Exception('删除失败', 1);
        }
    }

    public static function updateDev($name, $id,$sn,$type_id,$buy_user) {
        self::_checkName($name);
        $id = $id > 0 ? (int) $id : 0;
        if (!$id) {
            throw new Exception('请选择一个操作对象', 1);
        }
        $info = self::getInfoByName($name);
        //检测设备名是否重复
        if (is_array($info) && (count($info) > 0) && ($info['$id'] != $id)) {
            throw new Exception('设备名称已存在', 1);
        }
        $where = array('id' => $id);
        $data = array(
            'dev_name' => $name,
            'sn' => $sn,
            'type_id' => $type_id,
            'buy_user' => 'buy_user',
        );
        $res = Mysql::update(self::TABLE_NAME, $data, $where);
        if (!$res) {
            throw new Exception('更新失败', 1);
        }
    }
//报废设备
    public static function forbidDev($id){
        $id = $id > 0 ? (int)$id : 0;
        if (!$id){
            throw new Exception('请选择一个操作对象', 1);
        }
            $where = array(
                'id' => $id,
            );
            $data = array(
                    'status' => -1
                    );
            $res = Mysql::update(self::TABLE_NAME, $data,$where);
            if(!$res){
                throw new Exception('更新失败' ,1);
            }
    }
    //搜索功能
    public static function searchDev($searchName,$type_id,$keyWord,$status){
            $where = array(
                $searchName => array(
                'opt' => 'like',
                'val' => $keyWord
                    ),
                'status' => $status,
                'type_id' => $type_id,
            );
            $fields = array(
              'id',
                'dev_name',
                'sn',
                'type_id',
                'buy_user',
            );
            $order = array(
              'order' => 'status desc'
            );
            return Mysql::select(self::TABLE_NAME,$where,$fields,$order );

    }
}

?>
