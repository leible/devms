<?php
require_once '../lib/Mysql.class.php';

class Type {
    //put your code here
    const TABLE_NAME = 'pre_type';
    public static function addType($name){
        //检测内容是否为空
        self::_checkName($name);
        //检测内容是否重复
        $info = self::getInfoByName($name);
        if(is_array($info) && count($info) > 0){
            throw new Exception('您添加的设备类型已存在', 1);
        }
        $data = array(
           'type_name' => $name,
        );
        $res = Mysql::insert(self::TABLE_NAME, $data);
        if(!$res) throw new Exception('插入数据失败', 1);
    }

    //检测内容是否为空
    private static function _checkName($name){
        $name = $name ? trim($name) : '';
        if(!$name) throw new Exception('请输入类型名称', 1);
    }

    //获取类别名称
    public static function getInfoByName($name){
        $where = array(
            'type_name' => $name
        );
        return Mysql::selectOne(self::TABLE_NAME, $where);
    }

    public static function getAllTypeList(){
        return Mysql::select(self::TABLE_NAME);
    }

    public static function getInfoById($id){
        $id = $id > 0 ? (int)$id : 0;
        if (!$id) {
            throw new Exception('请选择一个操作对象', 1);
        }
        $where = array(
            'id' => $id
        );
        return Mysql::selectOne(self::TABLE_NAME, $where);
    }

    public static function updateType($name,$id) {
        self::_checkName($name);
        $id = $id>0 ? (int)$id : 0;
        if(!$id){
            throw new Exception('请选择一个操作对象', 1);
        }
        $info = self::getInfoByName($name);
        //检测类型名称是否重复
        if(is_array($info) &&  (count($info)>0) && ($info['$id'] != $id)){
            throw new Exception('类型名称已存在', 1);
        }
        $where = array('id' => $id);
        $data = array(
            'type_name' => $name
        );
        $res = mysql::update(self::TABLE_NAME, $data, $where);

        if (!$res){
        throw new Exception('更新失败', 1);
        }
    }


}

?>
