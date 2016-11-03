<?php
	/**
	 * 类型属性控制器
	 */
	 class TypeAttrController extends AuthController{
	 	public $model;
	 	/**
		 * 构造函数
		 */
		 public function __auto(){
		 	$this->model = K('TypeAttr');
		 }
		 public function index(){
		 	$tid =Q('get.tid');
			$type = k('Type')->where("tid='{$tid}'")->find();
			$this->assign('type',$type);
		 	if($result=$this->model->where("type_id={$tid}")->all()){
		 		$this->assign('result',$result);
		 	}
			$this->display();
		 }
		 public function addTypeAttr(){
		 	if(IS_POST){
		 		p($_POST);
				if(!$this->model->addTypeAttr()) $this->error($this->model->error);
				$this->success('添加属性成功');
		 	}
			 $this->display();
		 }
		 public function editTypeAttr(){
		 	$aid = Q('get.aid');
			if(IS_POST){
				p($_POST);
				if(!$this->model->editTypeAttr()) $this->error($this->model->error);
				$this->success('修改成功');
			}
			$result = $this->model->where("aid='$aid'")->find();
			p($result);
			$result['avalue'] = str_replace(',', '|', $result['avalue']);
			$this->assign('result',$result);
		 	$this->display();
		 }
		 public function delTypeAttr(){
		 	$aid = Q('get.aid');
			if($this->model->where("aid='{$aid}'")->del()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
			
		 }
		
	 }
	