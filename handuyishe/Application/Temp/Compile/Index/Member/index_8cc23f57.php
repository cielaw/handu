<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/member.css"/>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/commom.js"></script>
		<base target="iframe"/>
	</head>
	<body>
		<!--顶部导航开始-->
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
						<span class='gwcxc'></span>我的购物车<span class = "youjiantou">&gt;</span></a>
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
		<!--导航结束-->
		<!--会员主体开始-->
		<div id="member">
			<div class="member">
				<!--面包屑导航开始-->
				<!--<h3 class="memNav">您当前的位置:<a>韩都衣舍</a> &gt; <a href="">我的韩都</a></h3>-->
				<!--面包屑导航结束-->
				<!--会员具体内容开始-->
				<div class="memContent">
					<div class="memLeft">
						<a href="" class="home"><span>我的韩都</span></a>
						<div class="nav">
						<dl>
							<dt>交易管理<span></span></dt>
							<dd><a href="<?php echo U('order');?>">我的订单</a></dd>
						</dl>
						<dl>
							<dt>个人信息<span></span></dt>
							<dd><a href="<?php echo U('profile');?>">基本资料</a></dd>
							<dd><a href="<?php echo U('address');?>">地址管理</a></dd>
							<dd><a href="<?php echo U('edit_password');?>">修改密码</a></dd>
						</dl>
					</div>
					</div>
					
					<div class="memRight">
						 <iframe src="<?php echo U('profile');?>" scrolling="no" frameborder="0" style="height:100%;width:100%;" name="iframe"></iframe>
					</div>
				</div>
				<!--会员具体内容结束-->
			</div>
		</div>
		<!--会员主体结束-->
		<!--尾部开始-->
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
			
		