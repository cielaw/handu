<?php
	class CategoryController extends AuthController{
		public $model ;
		/**
		 * 构造函数
		 */
		public function __auto(){
			$this->model = K('Category');
		}
		public function index(){
			if(IS_POST){
				$this->model->sortC();
			}
			$result = $this->model->order('sort')->all();
			$result = Data::tree($result,'cname','cid','fid');
			$this->assign('result',$result);
			$this->display();
		}
		public function addTopCate(){
			if(IS_POST){
				if(!$this->model->addTopCate()) $this->error($this->model->error);
				$this->success('添加成功',U('index'));
			}
			$this->display();
		}
		public function  addSonCate(){
			if(IS_POST){
				if(!$this->model->addSonCate()) $this->error($this->model->error);
				$this->success('添加成功',U('index'));
			}
			$result =  K('Type')->all();
			$this->assign('result',$result);
			$this->display();
		}
		public function edit(){
			$cid = Q('get.cid','0','intval');
			if(IS_POST){
				if(!$this->model->edit()) $this->error($this->model->error);
				$this->success('修改成功');
			}
			if(!$info = $this->model->where("cid='{$cid}'")->find()){
				$this->error('没有此分类');
			}else{
				$this->assign('info',$info);
				p($info);
			}
			$type = K('Type')->all();
			$this->assign('type',$type);
			//不显示自己和自己的子分类
			$cids = $this->model->getSons($cid);
			$cids = implode(',', $cids);
			$cate = $this->model->where("cid not in ({$cids})")->all();
			$this->assign('cate',$cate);
			$this->display();
		}
		public function delete(){
			$cid = Q('get.cid','0','intval');
			$cids = $this->model->getSons($cid);
			$cids = implode(',', $cids);
			p($cids);
			if(!$this->model->where("cid in ($cids)")->del()) $this->error($this->model->error); 
			$this->success('删除成功');
		}
	}
