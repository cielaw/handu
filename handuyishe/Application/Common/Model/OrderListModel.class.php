<?php
	/**
	 * 订单列表
	 */
	class OrderListModel extends Model{
		public $table = 'order_list';
		public function addList($order_id){
			$goods = $_SESSION['cart']['goods'];
			foreach($goods as $v){
				$spec = '';
				foreach($v['options'] as $key=>$value){
					$spec .= $key.':'.$value.'&nbsp;&nbsp;';
				}
				$data = array(
					'num'=>$v['num'],
					'totalMoney'=>$v['total'],
					'spec'=>$spec,
					'order_id'=>$order_id,
					'goods_id'=>$v['id']	
				);
				if(!$this->add($data)) return false;
				$spec = '';
			}
			unset($_SESSION['cart']);
			return true;
		}
	}
	