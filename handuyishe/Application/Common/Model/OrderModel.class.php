<?php
	/**
	 * 订单模块
	 */
	class OrderModel extends Model{
		public $table = 'purchase_order';
		public function order(){
			if(!$this->create()) return false;
			if(Q('post.country')== '请选择省' || Q('post.city')=='请选择市' ||Q('post.province')=='请选择县（区）'){
				$address = Q('post.fullAddress');
			}else{
				$address = Q('post.province').Q('post.city').Q('post.country').Q('post.address');
			}
				$data = array(
					'order_no'=>$this->getListNo(),	
					'reciever'=>Q('post.reciever'),
					'order_address'=>$address,
					'total_price'=>$_SESSION['cart']['total'],
					'status'=>'0',
					'user_id'=>$_SESSION['uid'],
					'pay_way'=>Q('post.selectPayment'),
					'send_way'=>Q('post.shipping'),
					'send_best_time'=>Q('post.best_time')	
				);
			if(!$order_id = $this->add($data)) return false;
			$order = $this->where("order_id='{$order_id}'")->find();
			$order = array(
				'id'=>$order_id,
				'No'=>$order['order_no'],
				'price'=>$order['total_price'],
				'status'=>$order['total_price'],
				'payway'=>$order['pay_way']
			);
			$_SESSION['success'] = $order;
			$model = k('OrderList');  
			if(!$model->addList($order_id)) return false;
			return true;
		}
		public function getListNo(){
			$listNo = new Cart();
			$orderId = $listNo->getOrderId();
			return $orderId;
		}
	}	