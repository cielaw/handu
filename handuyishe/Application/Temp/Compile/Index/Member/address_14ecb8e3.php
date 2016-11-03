<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/address.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/bootstrap.min.css"/>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				//删除地址
				$('.del').click(function(){
					return confirm('确定要删除吗？');
				})
			})
		</script>
	</head>
	<body>
		<div id="order">
			<div class="order">
				<h1 class="theme"><span>收货地址</span><span class="add"><a href="<?php echo U('addAddress');?>">添加收货地址</a></span></h1>
				<table class="table table-bordered">
					<tr><th>收货人</th><th>所在地区</th><th>电话</th><th>email</th><th>操作</th></tr>
					<?php foreach ($address as $k=>$v){?>
					<tr><td><?php echo $v['receiver'];?></td><td><?php echo $v['province'];?><?php echo $v['city'];?><?php echo $v['country'];?><?php echo $v['address'];?></td><td><?php echo $v['phone'];?></td><td><?php echo $v['email'];?></td><td><a href="<?php echo U("editAddr",array('addr_id'=>$v['addr_id']));?>">修改</a>| <a href="<?php echo U("delAddr",array('addr_id'=>$v['addr_id']));?>" class="del">删除</a></td></tr>
					<?php }?>
				</table>
			</div>
		</div>
	</body>
</html>
