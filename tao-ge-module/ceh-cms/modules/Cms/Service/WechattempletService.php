<?php
/**
 * Created by PhpStorm.
 * User: zeyu
 * Date: 2018/5/16
 * Time: 13:39
 */

namespace Cms\Service;


class WechattempletService extends BaseService
{
    public function __construct($app)
    {
        parent::__construct($app, 'model_weixin_tab');
    }

    /**
     * 保存/更新微信模板
     * @param $model_id
     * @param $model_name
     * @param $cotent
     * @param $user_id
     * @return array
     */
    public function saveWechat($model_id, $model_name, $cotent, $user_id){
         $set = array('model_name' => $model_name, 'content' => $cotent);
         try{
             $this->beginTransaction();
             if($model_id){
                 $this->updateByTable('model_weixin_tab', $set, array('model_id' => $model_id));
             }else{
                 $set['model_id'] = $this->id();
                 $set['user_id'] = $user_id;
                 $time = date("Y-m-d H:i:s");
                 $set['create_time'] = $time;
                 //写关系表
                 $this->insertByTable('model_weixin_tab', $set);
             }
             $this->commitTransaction();
             //关闭数据连接
             $this->closeCon();
             return array('result' => "0", 'message' => "ok");
         }catch (\Exception $e){
             $this->rollbackTransaction();
             //关闭数据连接
             $this->closeCon();
             $this->log("saveWechat error", array('message' => $e->getMessage()));
             return array('result' => "10", 'message' => "fail");
         }
    }

    /**
     *
     */
    public function delWechat($model_id, $user_id){
         $where = array('user_id' => $user_id, 'model_id' => $model_id);
         try{
             $this->beginTransaction();
             $set = array('flag' => "4");
             $this->updateByTable('model_weixin_tab', $set,  $where);
             $this->commitTransaction();
             //关闭数据连接
             $this->closeCon();
             return array('result' => "0", 'message' => "ok");
         }catch (\Exception $e){
             $this->rollbackTransaction();
             //关闭数据连接
             $this->closeCon();
             $this->log("delWechat error", array('message' => $e->getMessage()));
             return array('result' => "10", 'message' => "fail");
         }
    }
}