<?php
/**
 * 类型模型
 */
class TypeModel extends Model{
	public $table = "Type";
	public $validate = array(
		array('tname','nonull','类型不能为空',2,3),
	);
	public function addType(){
		if(!$this->create()) return false;
		$tname = Q('post.tname');
		$data = array('tname'=>$tname);
		$this->add($data);
		return true;
	}
	public function editType(){
		if(!$this->create()) return false;
		p($_POST);
		$tid = Q('post.tid');
		$tname = Q('post.tname');
		$data = array(
			'tid'=>$tid,
			'tname'=>$tname
		);
		$this->save($data);
		return true;
	}
}
