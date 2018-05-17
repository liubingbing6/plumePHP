<?php
/**
 * Created by PhpStorm.
 * User: wei
 * Date: 2018/5/16
 * Time: 15:20
 */
namespace Cms\Controller;

use Plume\Core\Controller;

class RoleController extends Controller
{
    public function __construct($app)
    {
        parent::__construct($app);
    }

	public function indexAction() {
        return $this->result(array())->response();
	}

}