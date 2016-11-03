<?php
	/**
	 * 会员中心控制器
	 */
	class MemberController extends AhthorController{
		public function index(){
			//品牌
			$Brand = K('Brand')->all();
			$this->assign('brand',$Brand);
			$topCate = K('Category')->where('fid=0')->all();
			$this->assign('topCate',$topCate);
			$this->display('member');
		}
		/**
		 * 个人介绍
		 */
		public function profile(){
			$model = K('User');
			if(IS_POST){
				if(!$model->profile()) p($model->error);
			}
			$uid = $_SESSION['uid'];
			$profile = $model->where("uid={$uid}")->find();
			$this->assign('profile',$profile);
			$this->display();
		}
		/**
		 * 修改密码
		 */
		public function edit_password(){
			$model = K('User');
			if(IS_POST){
				if(!$model->modifyPassword()) $this->error($model->error);;
				$this->success('修改密码成功');
			}
			$this->display();
		}
		/**
		 * 显示地址
		 */
		public function address(){
			$uid = $_SESSION['uid'];
			$address = K('Address')->where("user_id={$uid}")->all();
			$this->assign('address',$address);
			$this->display();
		}
		/**
		 * 订单
		 */
		public function order(){
			$uid = $_SESSION['uid'];
			$order = K('Order')->where("user_id='{$uid}'")->all();
			$myOrder = array();
			foreach($order as $k=>$v){
				$order_id = $v['order_id'];
				$orderList = K('OrderList')->where("order_id={$order_id}")->all();
				$orderList = M()->join('__order_list__ o JOIN __goods__ g ON o.goods_id=g.gid')->where("order_id={$order_id}")->all();
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
		/**
		 * 增加地址
		 */
		public function addAddress(){
			if(IS_POST){
				$model = K('Address');	
				if(!$model->addAddress()) /*p($model->error)*/; 
			}
			$this->display();
		}
		/**
		 * 编辑地址
		 */
		public function editAddr(){
			$addr_id = Q('get.addr_id');
			if(IS_POST){
				$model = K('Address');
				if($model->editAddr()) $this->error($model->error);
				$this->success('修改成功',U('address'));
			}
			$model = K('Address');	
			$info = $model->where("addr_id={$addr_id}")->find();
			$this->assign('info',$info);
			$this->display('editAddr');
		}
		/**
		 * 删除地址
		 */
		public function DELAddr(){
			$addr_id = Q('get.addr_id');
			if(!K('Address')->where("addr_id={$addr_id}")->del()) $this->error('没有成功删除');
			$this->success('删除成功');
		}
		/**
		 * 删除订单
		 */
		 public function delList(){
		 	$order_id = Q('get.order_id');
			if(!K('Order')->where("order_id='{$order_id}'")->del()) $this->error('删除失败');
			if(!K('OrderList')->where("order_id='{$order_id}'")->del()) $this->error('删除失败');
			$this->success('删除成功');
		 }
		 /**
		  * 收货
		  */
		 public function recieve(){
			if(IS_AJAX){
				$orderId = Q('post.orderId',0,'intval');
				$data = array(
					'status'=>3
				);
				if(K('Order')->where("order_id='{$orderId}'")->update($data)) echo 1;
				die;
			}
		 }
		 /**
		  * 支付
		  */
		 public function pay(){
			if(IS_AJAX){
				$orderId = Q('post.orderId',0,'intval');
				$data = array(
					'status'=>1
				);
				if(K('Order')->where("order_id='{$orderId}'")->update($data)) echo $orderId;
				die;
			}
		}
	}
	