<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/register.css"/>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/commom.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/login.js"></script>
	</head>
	<body>
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--顶部导航开始-->
		<div id="global_nav">
			<div class="global_nav">
				<div class="global_info_left">
					<ul>
						<li><a href="http://127.0.0.1/Joker-tK/handu/handu" target="_blank" class="returnIndex">返回首页</a></li>
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
		<!--头部开始-->
		<div id="header">
			<div class="headerTop">
				<div class="headerLogo">
					<a href="http:http://127.0.0.1/Joker-tK/handu/handu"></a>
				</div>	
				<div class="headerSearch">
					<div class="searchForm">
						<form action="<?php echo U('List/search');?>" method="post">
							<input type="text" name="words" id="" class="text"/>
							<input type="submit" value="搜&nbsp;索"class="submit"/>
						</form>
					</div>
					<div class="hotWords">
					
					</div>
				</div>
				<!-- 购物车区开始 -->
				<div class="header_right">
	
					<a href="<?php echo U('cart/cart');?>">
						<span class='gwcxc'></span>我的购物车<span class ="number">0</span><span class = "youjiantou">&gt;</span></a>
					<div class="gwca" style="display: none;">
						<h3>购物车中还没有商品，赶紧选购吧！</h3>
						<ul style="margin: 10px;">
							
						</ul>
					</div>
					<h class="gwcas" >
								
					</h>
				</div>
				<!-- 购物车区结束 -->
			</div>
			<div class="header_bottom">
				<div class="header_complay">互联网时尚品牌运营集团
</div>			
				<div class="brand huadong">
					<input type="button" class="prev" id="prev" value="&lt;" />
					<input type="button" class="next" id="next"  value="&gt;" />
					<ul>
						<?php foreach ($brand as $k=>$v){?>
							<li><a href="<?php echo U('List/index',array('bid'=>$v['bid']));?>" class="bandLogo"><img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $v['logo'];?>"/></a>$k</li>
							
						<?php }?>
					</ul>
				</div>
			</div>	
			</div>	
		</div>
		<!--头部结束-->
		<!--导航开始-->
		<div class="handu_nav">
  <div class="handu_menu ">
    <div class="all show_cate">
      <a class="all_text" href="" target="_blank">全部商品分类<b></b></a>
     
    </div>
    <ul class="handu_menu_o ">
        <li class="menu_item">
        	<a target="_blank" href="http://127.0.0.1/Joker-tK/handu/handu">首页</a>
        </li>
        <?php foreach ($topCate as $k=>$v){?>
        <li class="menu_item">
        	<a target="_blank" href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['cname'];?></a>
        </li>
        <?php }?>
    </ul>
</div>
		<!--导航结束-->
		<!--注册开始-->
		<div id="register">
			<div class="adRegister">
				
			</div>
			<div class="Register">
				<div class="RegisterLeft">
					<div class="login">
						已是韩都衣舍用户：<a href="<?php echo U('Login/login');?>" class="toLogin">直接登录</a>
					</div>
					<div class="QRCode">
						<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/367-250.png"/>
					</div>
					
				</div>
				<div class="RegisterRight">
					<div class="RegisterReal">
						<h3><span></span>填写你的信息：</h3>
						<div class="registerForm">
							<form action="<?php echo U('register/register');?>" method="post" id="registerForm">
								<div class="emailInput">
									<p><i>Email：</i><input type="text" name="email" id="email"/><span></span> </p>
									<h5 id="emailError">Email地址作为用户名，同时也用于接收账户信息、订单通知及密码找回等功能</h5>
								</div>
								<div class="emailInput">
									<p><i>密码：</i><input type="password" name="password" id="password"/><span></span> </p>
									<h5 id="passwordError">8-24位字符，必须包含字母、数字的组合</h5>
								</div>
								<div class="emailInput">
									<p><i>确认密码：</i><input type="password" name="rePassword" id="repassword"/><span></span> </p>
									<h5 id="repassworderror">请再次输入密码，两次输入必须一致</h5>
								</div>
								<div class="emailInput">
									<p><i>验证码：</i><input type="text" name="verify" class="verify"/><img src=<?php echo U('Register/verify');?> id="imgVerify"/><span></span> </p>
									<h5 id="verifyError"></h5>
								</div>
								
								<div class="xieyi">
									<input type="checkbox" name="agree"  id="" class="checkbox" value="1" />
									<h3>我已看过并接受《用户协议》</h3>
								</div>
								<div class="emailInput emailSubmit">
									<p><i></i><input type="submit" class="subbackground" /><span></span> </p>	
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--注册结束-->
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
