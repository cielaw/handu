<?php
/**
 * 类型属性模型
 */
 class TypeAttrModel extends Model{
 	public $table = 'typeattr';
	public $validate = array(
		array('aname','nonull','属性名不能为空',2,3),
		array('type_id','nonull','类型id不能空',1,3),
		array('avalue','nonull','属性值不能空',2,3)
	);
	
	public function addTypeAttr(){
		if(!$this->create()) return false;
		$aname = Q('post.aname');
		$type_id = Q('post.type_id');
		$atype = Q('post.atype');
		$avalue = Q('post.avalue');
		$avalue = str_replace('|', ',', $avalue);
		$data = array(
			'aname'=>$aname,
			'type_id'=>$type_id,
			'atype'=>$atype,
			'avalue'=>$avalue
		);
		$this->add($data);
		return true;
	}
	public function editTypeAttr(){
		if(!$this->create()) return false;
		$aname = Q('post.aname');
		$aid = Q('post.aid');
		$atype = Q('post.atype');
		$avalue = Q('post.avalue');
		$data = array(
			'aid'=>$aid,
			'aname'=>$aname,
			'atype'=>$atype,
			'avalue'=>$avalue
		);
		$this->save($data);
		return true;
	}
 }
