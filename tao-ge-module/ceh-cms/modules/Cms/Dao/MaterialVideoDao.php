<?php

namespace Cms\Dao;

use Plume\Core\Dao;

class MaterialVideoDao extends Dao{

    public function __construct($app) {
        parent::__construct($app, 'material_video_tab', 'material_id');
    }
}