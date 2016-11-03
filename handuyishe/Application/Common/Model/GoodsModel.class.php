<?php
	/**
	 * 商品模型
	 */
	class GoodsModel extends Model{
		public $table = 'goods';
		public $auto = array(
			array('shelvestime','time','function',2,1)
	);
		
		public function addGoods(){
			if(!$this->create()) return fasle;
				$cid = Q('post.cid',0,'intval');
				$modelCate = K('Category')->field('type_id')->where("cid={$cid}")->find();
				$this->data['tid'] =$modelCate['type_id'];
				$gid = $this->add();
				S('select_'.$gid,$_POST['selected']);
				$model = K('GoodsAttr');
				
				$model->goodsAttrAdd($gid);
				$modelDetail = K('GoodsDetail');
				$modelDetail->goodsDetailAdd($gid);
				return true;
		}
		public function edit(){
			if(!$this->create()) return fasle;
			$cid = Q('post.cid',0,'intval');
			$modelCate = K('Category')->field('type_id')->where("cid={$cid}")->find();
			$this->data['tid'] =$modelCate['type_id'];
			$gid = Q('get.gid',0,'intval');
			$this->data['gid'] = $gid;
			$this->save();
			if(isset($_POST['selected'])){
				S('select_'.$gid,$_POST['selected']);
			}
				
				$model = K('GoodsAttr');
				$model->goodsAttrEdit($gid);
				 
				$modelDetail = K('GoodsDetail');
				$modelDetail->goodsDetailedit($gid);
				return true;
		}
	}
	