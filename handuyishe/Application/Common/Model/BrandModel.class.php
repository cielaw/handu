<?php
/**
 * 品牌模型
 */
 class BrandModel extends Model{
 	public $table = 'brand';
	public $validate = array(
		array('bname','nonull','分类名不能为空',1,3),
		array('sort','nonull','排序不能为空',1,3)
		);
	public $auto = array(
		array('logo','_logo','method',2,3)
	);
	public function _logo(){
		//如果没有上传图片
		if(isset($_FILES['logo'])&& $_FILES['logo']['error']==4){
			return '';
		}else{
			if($thumb = Q('post.logo')){
				return $thumb;
			}
			//执行上传
			$upload = new Upload();
			$info = $upload->upload();
			//如果上传错误
			if($info){
				return $info[0]['path'];
			}else{
				$this->error = $upload->error;
			}
		}
	}
	public function addBrand(){
		if(!$this->create()) return false;
		$this->add();
		return true;
	}
	public function edit(){
		if(!$this->create()) return false;
		$this->save();
		return true;
	}
	public function orderby(){
		if(!$this->create()) return false;
		$data = Q('post.','');
		foreach($data as $k => $v){
			$data = array(
				'bid'=>$k,
				'sort'=>$v
			);
			$this->save($data);
		}
		return true;
	}
 }
