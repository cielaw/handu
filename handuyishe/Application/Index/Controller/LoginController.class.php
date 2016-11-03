<?php
/**
 * 登陆控制器
 */
class LoginController extends Controller{
	/**
	 * 登陆方法
	 */
	 public function login(){
	 	if(isset($_SESSION['uid']) && isset($_SESSION['email'])){
	 		$this->error('已登录',U('Index/index/index'));
	 	}
	 	if(IS_POST){
	 		$model = K('user');
			if(!$model->login()){
				$this->error($model->error);
			}
			$this->success('登陆成功',U('Index/index'));
	 	}
	 	$this->display();
	 }
	 /**
	  * 退出
	  */
	  public function out(){
	  	unset($_SESSION['uid']);
		unset($_SESSION['email']);
		unset($_SESSION['cart']);
		$this->success('退出成功',U('Index/index'));
	  }
}
 