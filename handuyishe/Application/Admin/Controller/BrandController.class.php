<?php
/**
 * 品牌控制器
 */
 class BrandController extends AuthController{
 	public $model;
 	public function __auto(){
 		$this->model = K('Brand');
 	}
	/**
	 * 品牌首页展示
	 */
 	public function brand(){
 		if(IS_POST){
 			if(!$this->model->orderby()) $this->error($this->model->error);
			$this->success('排序成功');
 		}
 		$info = $this->model->order('sort asc')->all();
		$this->assign('info',$info);
 		$this->display('brand');
 	}
	/**
	 * 品牌添加
	 */
	public function add(){
		if(IS_POST){
			if(!$this->model->addBrand()) $this->error($this->model->error);
			$this->success('添加分类成功');
		}
		$this->display();
	}
	/**
	 * 品牌修改
	 */
	public function edit(){
		if(IS_POST){
			if(!$this->model->edit()) $this->error($this->model->error);		
			$this->success('修改成功');	
		}
		$bid = Q('get.bid',0,'intval');
		$info = $this->model->where("bid='$bid'")->find();
		$this->assign('info',$info);
		$this->display();
	}
	
	
	/**
	*删除logo 
	*/
	 public function delImg(){
		if(IS_AJAX){
		  	$path = Q('post.path');
			$bid = Q('post.bid',0,'intval');
				
			//删除原图
			if(is_file($path)) unlink($path);
			//删除对应文章图片的信息
			$this->model->where("bid={$bid}")->update(array('logo'=>''));
		  }
	}
	 /**
	  * 品牌删除
	  */
	public function delete(){
		$bid = Q('get.bid','0','intval');
		if(!$this->model->where("bid='$bid'")->del()) $this->error('删除失败');
		$this->success('删除成功');
	}
	/**
	 * 列表图上传
	 */
	 public function uploadList(){
	    $upload = new Upload('Upload/listPic/' . date('y/m'));
	    $file = $upload->upload();
	    if (empty($file)) {
	        $this->ajax('上传失败');
	    } else {
	        $data = $file[0];
	        $this->ajax($data);
	    }
			
	}
	 //异步编辑删图片
	public function delListImgAjax(){
		if(IS_AJAX){
			$path = Q('post.path');
			$gid = Q('post.gid');
			$path = strstr($path,'Upload');
			if(is_file($path)){
				unlink($path);
			}
		}	
	}
 }
