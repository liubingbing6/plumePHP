<?php
/**
 * Created by PhpStorm.
 * User: wei
 * Date: 2018/5/16
 * Time: 15:22
 */

namespace Cms\Dao;


use Plume\Core\Dao;

class RoleDao extends Dao
{
    public function __construct($app) {
        parent::__construct($app, 'role_info_tab', 'role_id');
    }
}