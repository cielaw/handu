<?php
	class OrderListController extends AuthController{
		public function index(){
			$order = K('Order')->all();
			$myOrder = array();
			foreach($order as $k=>$v){
				$order_id = $v['order_id'];
				$orderList = M()->join('__order_list__ o JOIN __goods__ g ON o.goods_id=g.gid')->where("o.order_id={$order_id}")->all();
				$temp = array();
				foreach($orderList as $key=>$value){
					$price = $value['totalMoney']/$value['num'];
					$value['price'] = $price;
					$temp[]=$value;
				}
				$v['orderList'] = $temp;
				$myOrder[$k] = $v;
			}
			$this->assign('myOrder',$myOrder);
			$this->display();
		}
		public function delOrder(){
			$order_id = Q('get.order_id');
			if(!K('Order')->where("order_id='{$order_id}'")->del()) $this->error('删除失败');
			if(!K('OrderList')->where("order_id='{$order_id}'")->del()) $this->error('删除失败');
			$this->success('删除成功');
		}
		public function editOrder(){
			$order_id = Q('get.order_id',0,'intval');
			$order = K('Order')->where("order_id={$order_id}")->all();
			$myOrder = array();
			foreach($order as $k=>$v){
				$order_id = $v['order_id'];
				$orderList = K('OrderList')->where("order_id={$order_id}")->all();
				$orderList = M()->join('__order_list__ o JOIN __goods__ g ON o.goods_id=g.gid')->where("o.order_id={$order_id}")->all();
				$temp = array();
				foreach($orderList as $key=>$value){
					$price = $value['totalMoney']/$value['purchase_num'];
					$value['price'] = $price;
					$temp[]=$value;
				}
				$v['orderList'] = $temp;
				$myOrder[$k] = $v;
			}
			$this->assign('myOrder',$myOrder);
			$this->display();
		}
		public function statusAjax(){
			$order_id = Q('post.order_id');
			$status = Q('post.status');
			$data = array(
				'status'=>$status,
				'order_id'=>$order_id,
			);
			if(!K('Order')->save($data)) return fasle;
			echo 1;
			die;
		}
		public function changeOlNumAjax(){
			$num = Q('post.num',0,'intval');
			$olId = Q('post.olid',0,'intaval');
			$order_id = Q('post.order_id',0,'intval');
			$origalData = K('OrderList')->where("olid={$olId}")->find();
			$origalMoney = $origalData['totalMoney'];
			$origalNum = $origalData['purchase_num'];
			$price = $origalMoney/$origalNum;
			$totalMoney = $price*$num;
			$data = array(
				'olid'=>$olId,
				'purchase_num'=>$num,
				'totalMoney'=>$totalMoney
			);
			if(!K('OrderList')->save($data)) return false;
			echo 1;
			die;
		}
		public function delOrderList(){
			$olid = Q('get.olid',0,'intal');
			$order_id = Q('get.order_id',0,'intal');
			
			if(!K('OrderList')->where("olid={$olid}")->del()) p('删除失败');
			if(!K('OrderList')->where("order_id={$order_id}")->all()){
				K('Order')->where("order_id={$order_id}")->del();
				$this->success('删除成功',U('index'));
			}else{
				$this->success("删除成功",U('editOrder',array('order_id'=>$order_id )));
			}			
			
			
			
		}
	}
