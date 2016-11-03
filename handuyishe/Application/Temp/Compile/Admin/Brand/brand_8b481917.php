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
		<h3 class="title"><span class="btn btn-primary"><?php echo $type['tname'];?>商品品牌</span><a href="<?php echo U('add');?>" class="btn">添加品牌</a></h3>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'>
				<th>品牌ID</th>
				<th>品牌名称</th>
				<th>品牌LOGO</th>
				<th>排序</th>
				<th>是否热门</th>
				<th>操作</th>
			</tr>
			<form action="" method="post">
			<?php foreach ($info as $k=>$v){?>
			<tr>
				<td><?php echo $v['bid'];?></td>
				<td><?php echo $v['bname'];?></td>
				<td>    <?php if($v['logo']){ ?><img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $v['logo'];?>" width="50"/><?php }else{ ?>无logo<?php } ?></td>
				<td><input type="text" name="<?php echo $v['bid'];?>" id="order" value="<?php echo $v['sort'];?>" /></td>
				<td><?php echo $v['is_hot'];?></td>
				
				<td>
					<a href="<?php echo U('edit',array('bid'=>$v['bid']));?>" class="btn btn-info btn-mini">修改</a><a href="<?php echo U('delete',array('bid'=>$v['bid']));?>" class="btn btn-danger btn-mini del">删除</a>
					
				</td>
			</tr>
			<?php }?>
			<tr pid='0'><th colspan="6"><input type="submit" class="btn btn-primary" value="排序"/></th></tr>
			</form>
		</table>
	
	</body>
</html>
