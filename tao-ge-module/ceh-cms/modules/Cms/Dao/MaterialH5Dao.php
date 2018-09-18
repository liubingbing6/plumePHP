<?php

namespace Cms\Dao;


use Plume\Core\Dao;

class MaterialH5Dao extends Dao
{
	public function __construct($app)
	{
		parent::__construct($app, 'material_h5_tab', 'material_id');
	}
}