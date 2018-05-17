<?php

namespace Cms\Controller;

use Plume\Core\Controller;

class IndexController extends Controller
{

	public function indexAction() {
        return $this->result(array())->response();
	}

}