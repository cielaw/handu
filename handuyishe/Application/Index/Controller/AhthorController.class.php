<?php
	class AhthorController extends Controller{
		/**
		 * __init()相当于构造函数，自动运行
		 * 用它之后，不用谢parent::__construct()
		 */
		 public function __init(){
		 	//检测用户是否登陆
		 	if(!isset($_SESSION['uid']) || !isset($_SESSION['email'])){
		 		//去登陆页面
		 		$this->error('请登录后访问会员中心',U('login/login'));
		 	}
		 }
	} 
