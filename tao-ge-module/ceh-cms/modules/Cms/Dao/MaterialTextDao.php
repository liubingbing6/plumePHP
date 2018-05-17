<?php

namespace Cms\Dao;

use Plume\Core\Dao;

class MaterialTextDao extends Dao{

    public function __construct($app) {
        parent::__construct($app, 'material_text_tab', 'material_id');
    }
}