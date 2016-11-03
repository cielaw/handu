<?php
	class GoodsTypeController extends AuthController{
		public $model;
		public function __auto(){
			$this->model=K('Type');
		}
		public function index(){
			$result = $this->model->all();
			$this->assign('result',$result);
			$this->display('goodsType');
		}
		public function add(){
			if(IS_POST){
				if(!$this->model->addType()) $this->error($this->model->error);
				$this->success('添加分类成功');
			}
			$this->display('addType');
		}
		public function Typeedit(){
			if(IS_POST){
				if(!$this->model->editType()) $this->error($this->model->error);
				$this->success('修改成功',U('index'));
			}
			$tid = Q('get.tid');
			$result = $this->model->where("tid={$tid}")->find();
			$this->assign('result',$result);
			$this->display();
		}
		public function Typedel(){
			$tid = Q('get.tid');
			K('TypeAttr')->where("type_id='{$tid}'")->del();
			if(!$this->model->where("tid='{$tid}'")->del()){
				$this->error('删除失败');
			}else{
				$this->success('删除成功');
			}
		}
	
	}
