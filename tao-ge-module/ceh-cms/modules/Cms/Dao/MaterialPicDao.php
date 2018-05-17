<?php

namespace Cms\Dao;

use Plume\Core\Dao;

class MaterialPicDao extends Dao{

    public function __construct($app) {
        parent::__construct($app, 'material_pic_tab', 'material_id');
    }
}