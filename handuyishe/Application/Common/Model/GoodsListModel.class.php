<?php
	
	 class GoodsListModel extends Model{
	 	public $table = 'goodslist';
		public $validate = array(
//			array('combine[]','nonull','请下拉选择',2,3),
			array('artno','nonull','货号不能为空',2,3),
			array('stock','nonull','库存',2,3)
		);
		public function addList(){
			if(!$this->create()) return FALSE;
			$combine = Q('post.combine','');
			$gid = Q('get.gid');
			$combine = implode(',', $combine);
			$this->data['combine'] = $combine;
			$this->data['gid'] = $gid;
			$this->add();
			$stock = Q('post.stock',0,'intval');
			$data = array(
				'stock'=>'stock'+$stock			
			);
			K('Goods')->where("gid={$gid}")->update($data);
			return true;
		}
		public function editList(){
			if(!$this->create()) return FALSE;
			$gid = Q('get.gid',0,'intval');
			$glid = Q('get.glid',0,'intval');
			$stockEdit = Q('post.stock',0,'intval');
			$combine = Q('post.combine','');
			$combine = implode(',', $combine);
			$this->data['combine'] = $combine;
			$this->data['glid'] = $glid;
			$goods = K('Goods')->where("gid={$gid}")->find();
			$goodsList = K('GoodsList')->where("glid={$glid}")->find();
			$stock = $goods['stock'];
			$stockList = $goodsList['stock'];
			$stock = $stock-$stockList+$stockEdit;
			$data = array(
				'stock'=>$stock
			);
			K('Goods')->where("gid={$gid}")->update($data);
			$this->save();
			return TRUE;
		}
	 }
	