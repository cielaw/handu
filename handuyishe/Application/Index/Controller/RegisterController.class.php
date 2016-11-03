<?php
/**
 * 注册控制器
 */
class RegisterController extends Controller{
	
	/*
	 * 注册方法
	 */
	 public function register(){
	 	if(IS_POST){
	 		$model = K('User');
			if(!$model->register()){
				$this->error($model->error);
			}
			$this->success('注册成功');
	 	}
		//品牌
			$Brand = K('Brand')->all();
			$this->assign('brand',$Brand);
	 	$this->display('register');
	 }
	 /**
	  * 验证码
	  */
	 public function verify(){
	 	$show = new Code();
		$show->show();
	 }
	 /**
	  * 邮箱验证
	  */
	 public function ajaxEmail(){
		if(IS_AJAX){
			$email =  Q('post.email');
			$model = K('User');
			if($model->where("email='{$email}'")->find()){
				echo 2;
				die;
			}else{
				echo 1;
				die;
			}
		}
	}
	 /**
	  *验证码验证 
	  */
	public function verifyAjax(){
		if(IS_AJAX){
			$verify =strtoupper(Q('post.verify'));
			if($_SESSION['code'] != $verify){
				echo 0;
				die;
			}else{
				echo 1;
				die;
			}
		}
	}
}






