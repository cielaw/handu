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