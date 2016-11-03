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
    	<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/js/category.js"></script>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/css/goodsType.css"/>
	</head>
	<body>
		<h3 class="title"><span class="btn btn-primary"><?php echo $type['tname'];?>商品分类</span><a href="<?php echo U('addTopCate');?>" class="btn">添加顶级分类</a></h3>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'>
				<th>展开</th>
				<th>分类ID</th>
				<th>分类名称</th>
				<th>排序</th>
				<th>操作</th>
			</tr>
			<form action="" method="post">
			<?php foreach ($result as $k=>$v){?>
			<tr cid="<?php echo $v['cid'];?>" pid="<?php echo $v['fid'];?>">
				<td><a href="javascript:void(0)" class="icon-plus"></a></td>
				<td><?php echo $v['cid'];?></td>
				<td><?php echo $v['_name'];?></td>
				<td><input type="text" name="<?php echo $v['cid'];?>" id="order" value="<?php echo $v['sort'];?>" /></td>
				<td>
					<a href="<?php echo U('addSonCate',array('fid'=>$v['cid']));?>" class="btn btn-success btn-mini">添加子分类</a><a href="<?php echo U('edit',array('cid'=>$v['cid']));?>" class="btn btn-info btn-mini">修改</a><a href="<?php echo U('delete',array('cid'=>$v['cid']));?>" class="btn btn-danger btn-mini del">删除</a>
					
				</td>
			</tr>
			<?php }?>
			<tr pid='0'><th colspan="5"><input type="submit" class="btn btn-primary" value="排序"/></th></tr>
			</form>
		</table>
	
	</body>
</html>
