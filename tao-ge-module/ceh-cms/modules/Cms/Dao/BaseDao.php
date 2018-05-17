<?php
namespace Cms\Dao;
/**
 * 扩展Dao
 */
use Plume\Core\Dao;

class BaseDao extends Dao
{
    public function __construct($app, $tableName){
        parent::__construct($app, $tableName);
    }
    /**
     * 通过表名插入
     * @param array $insertArr
     * @return obj
     */
    public function insertByTable($tablename, $insertArr){
        $obj = $this->getDB();
        return $obj->insert($tablename, $insertArr);
    }
    /**
     *
     * @param string $tablename
     * @param array $set
     * @param array $where
     * @return obj
     */
    public function updateByTable($tablename, $set, $where){
        $obj = $this->getDB();
        if(empty($where) == false){
            foreach ($where as $key => $value){
                $obj->where($key, $value);
            }
        }
        return $obj->update($tablename, $set);
    }

    /**
     * 通过表明删除数据
     * @param $tablename
     * @param $where
     * @return bool
     */
    public function deleteByTable($tablename, $where){
        $obj = $this->getDB();
        if(!empty($where) == false){
            foreach ($where as $key => $value){
                $obj->where($key, $value);
            }
            return $obj->delete($tablename);
        }
        return false;
    }
    /**
     * 通过表名查询
     * @$tablename string
     * @$where  array
     */
    public function fetchByTable($tablename, $where, $order = array(), $skipNum=0, $fetchNum=-1){
        $obj = $this->getDB();
        if(!empty($where)){
            foreach ($where as $key => $value){
                $obj->where($key, $value);
            }
        }
        if(empty($order) == false){
            foreach ($order as $key => $value){
                $obj->orderBy($key, $value);
            }
        }
        $limits = array();
        if($fetchNum >0){
            if($skipNum>=0){
                array_push($limits, $skipNum);
            }
            array_push($limits, $fetchNum);
        }
        if(empty($limits)){
            return $obj->get($tablename);
        }
        return $obj->get($tablename, $limits);
    }
}

?>