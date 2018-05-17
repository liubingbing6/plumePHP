<?php

namespace Cms\Service;


use Cms\Dao\MaterialH5Dao;
use Plume\Core\Service;

class MaterialH5Service extends Service
{
	private $materialH5Dao = null;

	/**
	 * MaterialH5Service constructor.
	 * @param $app
	 */
	public function __construct($app)
	{
		if (null == $this->materialH5Dao) {
			$this->materialH5Dao = New MaterialH5Dao($app);
		}
		parent::__construct($app, $this->materialH5Dao);
	}
}