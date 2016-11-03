<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/js/jquery-1.7.2.min.js"></script>
    	<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/js/public.js"></script>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/css/goodsType.css"/>
	</head>
	<body>
		<h3 class="title"><span class="btn btn-primary">商品列表</span><a href="<?php echo U('add');?>" class="btn">添加商品</a></h3>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'>
				<th>商品ID</th>
				<th>商品名称</th>
				<th>商品价格</th>
				<th>库存</th>
				<th>展示位置</th>
				<th>点击次数</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
			<?php foreach ($result as $k=>$v){?>
			<tr>
				<td><?php echo $v['gid'];?></td>
				<td><?php echo $v['gname'];?></td>
				<td>市场价<?php echo $v['marketprice'];?><br/>商场价<?php echo $v['shopprice'];?></td>
				<td><?php echo $v['stock'];?></td>
				<td>
					    <?php if($v['is_index']==1){ ?>普通商品<?php } ?>
					    <?php if($v['is_index']==5){ ?>首页品牌展示大图<?php } ?>
					    <?php if($v['is_index']==6){ ?>首页品牌展示中图<?php } ?>
					    <?php if($v['is_index']==7){ ?>首页品牌展示小图<?php } ?>
					    <?php if($v['is_index']==8){ ?>首页品牌图展示<?php } ?>
					    <?php if($v['is_index']==10){ ?>首页轮播<?php } ?>
					
				</td>
				<td><?php echo $v['click'];?></td>
				<td><?php echo date('Y-m-d H:i:s',$v['shelvestime']);?></td>
				<td>
					<a href="<?php echo U('goodsList',array('gid'=>$v['gid'],'tid'=>$v['tid']));?>" class="btn btn-info btn-mini">货品列表</a>
					<a href="<?php echo U('edit',array('gid'=>$v['gid']));?>" class="btn btn-info btn-mini">修改</a>
					<a href="<?php echo U('delete',array('gid'=>$v['gid']));?>" class="btn btn-danger btn-mini del">删除</a>					
				</td>
			</tr>
			<?php }?>
		</table>
	
	</body>
</html>
