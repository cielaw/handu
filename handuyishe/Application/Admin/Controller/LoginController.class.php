<?php
/**
 * 登陆控制器
 */
 class LoginController extends Controller{
 	/**
	 * 默认方法
	 */
	public function index(){
		if(IS_POST){
			$model = K('User');
			if(!$model->aLogin()){
				$this->error($model->error);
			}
			$this->success('登陆成功',U('Index/index'));
		}
		$this->display('login');
	}
	/**
	 * 验证码
	 */
	public function verify(){
		$code = new Code();
		$code->show();
	}	
	/**
	 * 退出
	 */
	public function out(){
		unset($_SESSION['aid']);
		unset($_SESSION['aemail']);
		$this->success('退出成功',U('Login/index'));
	}
	
 }
