<?php

namespace Cms\Service;

use Cms\Dao\MaterialVideoDao;
use Plume\Core\Service;

class MaterialVideoService extends Service
{

    public function __construct($app) {
    	//使用自定义DAO
        parent::__construct($app, new MaterialVideoDao($app));
        //使用默认DAO
        // parent::__construct($app, new Dao($app, 'user_info', 'id'));
    }
}

