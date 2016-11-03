<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/shoppingSuccess.css"/>
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
		<!--购买产品确认开始-->
		<div id="checkoutAll">
			<div class="checkoutHeader">
				<a href="" class="headerLeft"></a>
				<div class="headerRight"></div>
				<div class="successInfo">
					<h3>恭喜您,订单提交成功！</h3>
					<table border="0" cellspacing="" cellpadding="">
						<tr>
							<th>订单编号</th>
							<th>应付金额</th>
							<th>配送方式</th>
							<th>支付方式</th>
						</tr>
						<tr>
							<td><?php echo $success['No'];?></td>
							<td><?php echo $success['price'];?></td>
							<td><?php echo $success['status'];?></td>
							<td><?php echo $success['payway'];?></td>
						</tr>
					</table>
					<h3 style="margin-left: 550px;margin-top: 10px;padding-top: 0px;">
						<a href="<?php echo U('Cart/pay',array('orderid'=>$success['id'])	);?>" style="font-size:15px;color:white;margin:0 auto; display:block;background: #C80A28;width: 150px;height: 40px;line-height: 40px;">立即支付</a>
					</h3>
				</div>
				<?php
					unset($_SESSION['success']);
					?>
			</div>	
			</div>
		<!--购买产品确认结束-->
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
	</body>
		