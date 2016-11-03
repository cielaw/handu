<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/Admin/js/jquery-1.7.2.min.js"></script>
    	<script type="text/javascript" src="http://localhost/handuyishe/Static/Admin/js/public.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/Admin/css/goodsType.css"/>
	</head>
	<body>
		<h3 class="title"><span class="btn btn-primary">分类类型</span><a href="<?php echo U('GoodsType/add');?>" class="btn">添加类型</a></h3>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr><th>类型ID</th><th>类型名称</th><th>操作</th></tr>
			<?php foreach ($result as $k=>$v){?>
				<tr><td><?php echo $v['tid'];?></td><td><?php echo $v['tname'];?></td><td><a href="<?php echo U('TypeAttr/index',array('tid'=>$v['tid']));?>" class="btn btn-success btn-mini">属性列表</a><a href="<?php echo U('Typeedit',array('tid'=>$v[tid]));?>" class="btn btn-info btn-mini">修改</a><a href="<?php echo U('Typedel',array('tid'=>$v[tid]));?>" class="btn btn-danger btn-mini del">删除</a></td></tr>
			<?php }?>
		</table>
	</body>
</html>
