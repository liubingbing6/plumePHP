<?php
namespace Cms\Service;

use Plume\Core\Service;
use Cms\Dao\BaseDao;
class BaseService extends Service
{
    public function __construct($app, $tablename){
        parent::__construct($app, new BaseDao($app, $tablename));
    }
    /**
     * 获取4或6位验证码
     * @param bool $default false:4, true:6  
     * @return string 
     */
    public function captcha($default = false){
        $chars = array ("0","1","2","3","4","5","6","7","8","9");
        shuffle ( $chars );
        $max = count($chars) - 1;
        $l = $default ? 6 : 4;
        $rand = "";
        for ($i=0; $i<$l; $i++){
            $rand .= $chars[mt_rand(0, $max)];
        }
        return $rand;
    }

    /**
     * 通过表名插入
     * @param array $insertArr
     */
    public function insertByTable($tablename, $insertArr){
        return $this->dao->insertByTable($tablename, $insertArr);
    }
    /**
     *
     * @param string $tablename
     * @param array $set
     * @param array $where
     */
    public function updateByTable($tablename, $set, $where){
        return $this->dao->updateByTable($tablename, $set, $where);
    }
    /**
     * 通过表名查询
     * @$tablename string
     * @$where  array
     */
    public function fetchByTable($tablename, $where, $order = array(), $skipNum=0, $fetchNum=-1){
        return $this->dao->fetchByTable($tablename, $where,$order , $skipNum, $fetchNum);
    }

    /**
     * 关闭数据库连接
     */
    public function closeCon(){
         try{
             $this->closeDB();
         }catch (\Exception $e){
             $this->log("close db error", 'exception='.$e->getMessage());
         }
    }
}

?>