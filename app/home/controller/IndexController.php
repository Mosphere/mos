<?php 
namespace home\controller;

use core\Controller;
use home\model\BlogModel;
/**
* index
*/
class IndexController extends Controller
{
	// use Jump;
	public function index()
	{
		$name = 'mos';
		$blog = new BlogModel();
		$res = $blog->getBlogsByPage(1,2);
		$this->assign('name',$name);
		$this->display();
	}

	public function hello()
	{
		$this->assign('name','shiyanlou');
		$this->display();
	}

}