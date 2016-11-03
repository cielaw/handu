<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/cart.css"/>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/jquery-1.8.2.min.js"></script>
		
		<script type="text/javascript">
    		var requestCartc = "<?php echo U('Cart/countAjax');?>";
		</script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/cart.js"></script>
	</head>
	<body>
		<!--顶部导航开始-->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div id="global_nav">
	<div class="global_nav">
		<div class="global_info_left">
			<ul>
				<li><a href="http://127.0.0.1/Joker-tK/handu/handu" class="returnIndex">返回首页</a></li>
				<!--<li><a href="">收藏本站</a></li>-->		
			</ul>
		</div>		
		<div class="global_info_right">
			<ul class="reloZome">
				    <?php if(isset($_SESSION['email']) && isset($_SESSION['uid'])){ ?>
					<li><a href="<?php echo U('Login/out');?>">您好,<?php echo $hd['session']['email'];?>！</a></li>
					<li><a href="<?php echo U('Login/out');?>">退出</a></li>
				<?php }else{ ?>
					<li><a href="">您好，欢迎光临韩都衣舍！</a></li>
					<li><a href="<?php echo U('Login/login');?>">登录 </a></li>
					<li><a href="<?php echo U('Register/register');?>" class="info_red" target="_blank">注册</a></li>
				<?php } ?>
					<li><a href="<?php echo U('Cart/cart');?>">购物车</a></li>
					<li><a href="<?php echo U('Member/index');?>">个人中心</a></li>
			</ul>
		</div>		
	</div>
</div>						
		<!--顶部导航右边结束-->
		<div id="cartAll">
			<div class="carHeader">
				<a href="" class="headerLeft"></a>
				<div class="headerRight">
					
				</div>
			</div>
			<div class="cartContent">
				<div class="goodsattr">
					<ul>
						<li style="width: 381px;">商品名称</li>
						<li style="width: 132px;">售价</li>
						<li style="width: 132px;">数量</li>
						<li style="width: 122px;">小计</li>
						<li style="width: 134px;">操作</li>
						<li style="width: 186px;">备注</li>
					</ul><span id="">
						
					</span>
				</div>
				<div class="goodsValue">
					<?php foreach ($info['goods'] as $k=>$v){?>
					<div class="goodThis">
						<h3 class="brandBuy" sid='<?php echo $k;?>'>品牌：<?php echo $v['bname'];?></h3>
						<ul>
							<li style="width:367px;
	;">
								<img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $v['listpic'];?>" width="60" />
								<span ><?php echo hd_substr($v['name'],16,'...');?>
								<br />
									<?php foreach ($v['options'] as $kk=>$vv){?>
										<?php echo $kk;?>:<?php echo $vv;?>
									<?php }?>
								</span>
							</li>
							<li style="width: 132px;">
								<span>
									<?php echo $v['price'];?>
								</span>
							</li>
							<li style="width: 132px;" >
								
								<span>
									
									<i class="decrease">-</i>
									<input type="" name="" id="" class="inputNum" value="<?php echo $v['num'];?>" />
									<i class="increase">+</i>
								</span>
							</li>	
							<li style="width: 122px;">
								<span class="totalPrice" >
									<?php echo $v['total'];?>
								</span>
								
							</li>
							<li style="width: 134px;">
								
								<span >
									<a href="<?php echo U('del',array('sid'=>$k));?>" class="del">删除</a>
								</span>
							</li>
							<li style="width: 184px;
	;"></li>
						</ul>
					</div>
					<?php }?>
					
					<div class="countGoods">
						<table border="0" cellspacing="" cellpadding="">
							<tr>
								<td class="totelnum"><?php echo $info['total_rows'];?>件商品</td>
								<td class="totelcount">总计：</td><td class="totelPrice" ><?php echo $info['total'];?></td></tr>
							<tr><td class="totelnum1"></td><td class="totelcount">满立减：</td><td >- ￥0.00</td></tr>
						</table>
					</div>	
					<div class="yourPay">
						<h3>购物金额总计： <i class="totelPrice"><?php echo $info['total'];?></i></h3>
					</div>
					
				</div>
				<div class="PurchaseAction">
					<a href="<?php echo U('Index/index');?>">
						<div class="continue"></div>
					</a>
					
					<div >
						<a href="<?php echo U('checkout');?>" class="toPay"></a>
					</div>
				</div>
			</div>
		</div>
		<!--尾部开始-->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--尾部开始-->

		<div id="footer">
			<div class="footerIn">
				<!--优势开始-->
				<div class="advance">
					
				</div>
				<!--优势结尾-->
				<!--尾部导航开始-->
				<div class="blackOut">
					<div class="footer_black"> 
    				 	<a href="" target="_blank">首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;
     					<a href="http://www.houdunwang.com">后盾网</a>
   					</div>
   				</div>
				<!--尾部导航结束-->
				<!--icon开始-->
				<div class="iconBottom">
					<center>
         				<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/zxmbutton02_sy.jpg" alt="" height="38" border="0" width="114">
        				<a href="" target="_blank">
        					<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/zxmbutton05_sy.jpg" alt="" style="margin:5px 5px 0 5px;" height="38" border="0" width="103">
        					
        				</a>
						<a href="" target="_blank" style="display:inline-block;position:relative;width:102px;height:37px;">
       						<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/cnnic.png" alt="" height="37" border="0" width="102">
							
						</a>
        				<a style="display: inline-block;width: 74px;margin: 4px 3px;"> 
        					<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/cctv.png" alt="" height="40" border="0" width="74">
        					
        				</a>
        			</center>
				</div>
				<!--icon结束-->	
			</div>
		</div>
		<!--尾部结束-->

		<!--尾部结束-->
		<script type="text/javascript">
			$(function(){
				//删除用户、帖子
				$('.del').click(function(){
					return confirm('确定要删除吗？');
				})

			})
	</script>
	</body>
		