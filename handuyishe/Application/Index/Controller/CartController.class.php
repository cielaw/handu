<?php
	/**
	 * 添加购物车
	 */
	class CartController extends Controller{
		/**
		 * 购物车ajax
		 */
		public function index(){
			if(IS_AJAX){
				$gid = Q('post.gid',0,'intval');
				$glid = Q('post.glid',0,'intval');
				$count = Q('post.count',0,'intval');
				$price = Q('post.price',0,'intval');
				$goodsInfo = M()->join('__goods__ g JOIN __brand__ b ON g.bid=b.bid')->where("gid={$gid}")->find();
				//查商品表
				$gid = $goodsInfo['gid'];
				$name = $goodsInfo['gname'];
				$listPic = $goodsInfo['listpic'];
				$goodsList = K('GoodsList')->where("glid={$glid}")->find();
				$combine = $goodsList['combine'];
				$spec = K('GoodsAttr')->field('gavalue')->where("gaid in({$combine})")->all();
				$color =$spec[0]['gavalue'];
				$size = $spec[1]['gavalue']; 
				$bname = $goodsInfo['bname'];
				$data = array(
  					'id' => $gid, // 商品 ID
  					'name'=>$name,// 商品名称
  					'bname'=>$bname,//品牌名称
  					'num' => $count, // 商品数量
  					'price' =>$price, // 商品价格
  					'listpic' =>$listPic,
  					'options' => array(// 其他参数如价格、颜色、可以为数组或字符串
  						'color' => $color,
   						'size' => $size
     				)
				);
				$result = $this->addCart($data);
				echo 1;
				die;
			}
		}
		/**
		 *添加购物车 
		 */
		public function addCart($data){
			$add = new Cart();
			$info = $add->add($data);
			return $info;
		}
		public function cart(){
			if(!isset($_SESSION['cart'])) $this->error('请先添加商品',U('index/index'));
			$info =$_SESSION['cart'];
			$this->assign('info',$info);
			$this->display('cart');
		}
		/**
		 * 数量加减ajax
		 */
		public function countAjax(){
			if(IS_AJAX){
				$sid = Q('post.sid');
				$num = Q('post.inputNum',0,'intval');
				$data = array(
				'sid'=>$sid,// 唯一 sid，添加购物车时自动生成
				'num'=>$num
			);
			$this->saveCart($data);
			$infoNum = $_SESSION['cart']['total_rows'];
			$infoTotalPrice = $_SESSION['cart']['total'];
			$info = $_SESSION['cart']['goods'][$sid];
			$info['TotalPrice'] =$infoTotalPrice;
			$info['goodsNum'] = $infoNum;
			echo json_encode($info);
			
			die;
			}
			
		}
		/**
		 * 购物车更新
		 */
		public function saveCart($data){
			$save = new Cart();
			$info = $save->update($data);
		}
		/**
		 * 订单删除
		 */
		public function del(){
			$sid = Q('get.sid');
			$decreaseNum = $_SESSION['cart']['goods'][$sid]['num'];
			$oraginalNum = $_SESSION['cart']['total_rows'];
			$_SESSION['cart']['total_rows'] = $oraginalNum-$decreaseNum;
			$decreasePrice = $_SESSION['cart']['goods'][$sid]['total'];
			$oraginalPrice = $_SESSION['cart']['total'];
			$_SESSION['cart']['total'] = $oraginalPrice-$decreasePrice;
			if($sid){
				unset($_SESSION['cart']['goods'][$sid]);
				$this->success('删除成功');
			}
		}
		/**
		 * 确认订单信息
		 */
		public function checkout(){
			if(IS_POST){
				$model = K('Order');
				if(!$model->order()) $this->error(($model->error));
				$this->success('订单提交成功',U('shoppingSuccess'));
			}
			$uid = Q('session.uid');
			if($uid){
				if($address = K('Address')->where("user_id={$uid}")->all()){
					$this->assign('address',$address);
				}
				
				if(isset($_SESSION['cart'])){
					$info =$_SESSION['cart'];
					$this->assign('info',$info);
				}else{
					$this->success('欢迎到韩都衣舍购物',U('index/index'));
				}
			}else{
				$this->success('请登录',U('Login/login'));
			}
			if(isset($_SESSION['cart'])){
				$info = $_SESSION['cart']['goods'];
				$this->assign('info',$info);
			}else{
				$this->error('请选购商品',U('Index/index'));
			}
			
			$this->display();
		}
		/**
		 * 下单成功
		 */
		public function shoppingSuccess(){
			if(isset($_SESSION['success'])){
				$success = $_SESSION['success'];
			$this->assign('success',$success);
			}else{
				$this->error('请选购商品',U('Index/index'));
			}
			
			$this->display();
		}
		/**
		 * 付款
		 */
		public function pay(){
			if(IS_AJAX){
				$orderId = Q('post.orderId',0,'intval');
				$data = array(
					'status'=>1
				);
				if(K('Order')->where("order_id='{$orderId}'")->update($data)) echo 1;
				die;
			}
			$orderId = Q('get.orderid',0,'intval');
			$info = K('Order')->where("order_id='{$orderId}'")->find();
			$this->assign('info',$info);
			$this->display();
		}
	}
