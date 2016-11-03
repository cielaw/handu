<?php
//测试控制器类
class IndexController extends AuthController{
    //动作方法
    public function index(){
        //显示视图
        $this->display();
    }
	public function welcome(){
		$this->display();
	}
}
