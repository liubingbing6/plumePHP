<?php
/**
 * Created by PhpStorm.
 * User: wei
 * Date: 2018/5/16
 * Time: 15:21
 */

namespace Cms\Service;


use Cms\Dao\RoleDao;
use PHPMailer\PHPMailer\Exception;
use Plume\Core\Service;

class RoleService extends Service
{
    public function __construct($app) {
        //使用自定义DAO
        parent::__construct($app, new RoleDao($app));
    }

    public function insertRoleInfo($data){
        try{
            $this->dao->insert($data);
            return array("result"=>"0","msg"=>"insert ok");
        }catch (Exception $e){
            $this->log("插入数据失败",$e->getMessage());
            return array("result"=>"500","msg"=>$e->getMessage());
        }
    }
}