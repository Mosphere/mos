<?php 
namespace home\controller;

use core\Controller;
//use home\model\UserModel;
use home\model\BlogModel;
/**
* yong
*/
class UserController extends Controller
{
	
	function __construct()
	{
		echo " I am user controller!";
	}
	public function index()
	{
		$userInfo = array(
				'id' =>1,
				'name' =>array(
						'student'=>'小红',
						'teacher'=>'杨老师'
				),
				'password'=>'123456',
				'job'=>'IT'
		);
		//$model = new UserModel();
		/* if ($model->save(['name'=>'hello','password'=>'shiyanlou'])) {
			$this->success('Success','/');	//执行成功，弹出信息，跳转至首页
		} else {
          $this->error('error');	//如果你在这个页面尝试，将会一直弹出错误信息.因为找不到上一页
		} */
		$blogMod = new BlogModel();
		$blogArr = $blogMod->getBlogsByPage(1, 2);
		$this->assign('user_info',$userInfo);
		$this->display();
	}
}