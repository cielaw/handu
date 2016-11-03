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