<?php
	/**
	 * 商品详细模型
	 */
	 class GoodsDetailModel extends Model{
	 	public $table = 'goodsdetail';
		public function goodsDetailAdd($gid){
			
			$data = array(
				'shoppic'=>serialize(Q('post.shoppic','')),
				'viewpic'=>serialize(Q('post.viewpic','')),
				'intro'=>$_POST['intro'],
				'service'=>$_POST['service'],
				'gid'=>$gid
			);
			$this->add($data);
			return true;
		}
		public function goodsDetailedit($gid){
			$data = array(
				'shoppic'=>serialize(Q('post.shoppic','')),
				'viewpic'=>serialize(Q('post.viewpic','')),
				'intro'=>$_POST['intro'],
				'service'=>$_POST['service']
			);
			$this->where("gid='{$gid}'")->save($data);
			return true;
		}
	 }
	