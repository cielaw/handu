<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/Admin/css/goodsType.css"/>
	</head>
	<body>
		<h3 class="title"><span class="btn btn-primary"><?php echo $type['tname'];?>类型的属性</span><a href="<?php echo U('GoodsType/index');?>" class="btn">类型列表</a></h3>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr><th>属性ID</th><th>属性名称</th><th>属性类别</th><th>属性值</th><th>操作</th></tr>
			<?php foreach ($result as $k=>$v){?>
			<tr><td><?php echo $v['aid'];?></td><td><?php echo $v['aname'];?></td><td>    <?php if($v['atype'] == 0){ ?>属性<?php }else{ ?>规格<?php } ?></td><td><?php echo $v['avalue'];?></td><td><a href="<?php echo U('editTypeAttr',array('aid'=>$v['aid']));?>" class="btn btn-info">修改</a><a href="<?php echo U('delTypeAttr',array('aid'=>$v['aid']));?>" class="btn btn-danger">删除</a></td></tr>
			<?php }?>
			<tr><td colspan="5"><a href="<?php echo U('addTypeAttr',array('tid'=>$type['tid']));?>" class="btn btn-success">添加属性</a></td></tr>	
		</table>
	</body>
</html>