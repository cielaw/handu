<?php
class AuthController extends  Controller{
	
	public function __init(){
		//检测用户是否登录
		if(!isset($_SESSION['aemail']) || !isset($_SESSION['aid'])){
			//去登录页面
			go(U('Admin/Login/index'));
		}
		//如果当前对象里面有__auto方法，那么就自动执行它
		if(method_exists($this, '__auto')){
			$this->__auto();
		}
	}
}
