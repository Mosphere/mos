<?php 
namespace home\controller;

use core\Controller;
/**
* index
*/
class IndexController extends Controller
{
	// use Jump;
	public function index()
	{
		$this->assign('name','mos');
		$this->display();
	}

	public function hello()
	{
		$this->assign('name','shiyanlou');
		$this->display();
	}

}