<?php
	/**
	 * 商品属性模型
	 */
	 class GoodsAttrModel extends Model{
	 	public $table = 'goodattr';
		
		public function goodsAttrAdd($gid){
			if(IS_POST){
				//插入商品属性
				$attr = Q('post.attr',array());
				if($attr){
					foreach($attr as $attr_id => $value){
						$data = array(
							'gavalue'=>$value,
							'attr_id'=>$attr_id,
							'goods_id'=>$gid
						);
						$this->add($data);
					}
				}
				//插入商品规格
				$spec = $_POST['spec'];
				if($spec){
					foreach($spec as $attr_id =>$value){
						foreach($value['value'] as $k =>$v){
						
							$data = array(
							'gavalue'=>$v,
							'attr_id'=>$attr_id,
							'gaaddvalue'=>$spec[$attr_id]['price'][$k],
							'goods_id'=>$gid,
							
						);
						$this->add($data);
						}
						
					}
				}
				return true;
			}
		}
		public function goodsAttrEdit($gid){
			if(IS_POST){
				//删除属性和规格
				$this->where("goods_id='{$gid}'")->del();
				//插入商品属性
				$attr = Q('post.attr',array());
				if($attr){
					foreach($attr as $attr_id => $value){
						$data = array(
							'gavalue'=>$value,
							'attr_id'=>$attr_id,
							'goods_id'=>$gid
						);
						$this->add($data);
					}
				}
				//插入商品规格
				$spec = $_POST['spec'];
				if($spec){
					foreach($spec as $attr_id =>$value){
						foreach($value['value'] as $k =>$v){
						
							$data = array(
							'gavalue'=>$v,
							'attr_id'=>$attr_id,
							'gaaddvalue'=>$spec[$attr_id]['price'][$k],
							'goods_id'=>$gid
						);
						$this->add($data);
						}
						
					}
				}
				return true;
			}
		}
		
		
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	