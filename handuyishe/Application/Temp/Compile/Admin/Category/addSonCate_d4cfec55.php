<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/Admin/css/goodsType.css"/>
	</head>
	<body>

		<div class="addType">
			 <legend><h3 class="title"><span class="btn btn-primary" style="margin-left: 10px;">添加分类</span><a href="<?php echo U('index');?>" class="btn ">分类列表</a></h3></legend>
			    <form action="" method="post" >
			      <fieldset style="margin-left: 10px;">
			        <label>商品类型名称</label>
			        <select name="type_id">
			        	<option value="">请选商品类型</option>
			        	<?php foreach ($result as $k=>$v){?>
			        	<option value="<?php echo $v['tid'];?>"><?php echo $v['tname'];?></option>
			        	<?php }?>
			        </select>
			        <input type="hidden" name="fid" id="fid" value="<?php echo $hd['get']['fid'];?>" />
			        <label>商品分类名称</label>
			        <input type="text" placeholder="请填写分类名 " name="cname">
			        <label>商品分类排序</label>
			        <input type="text" placeholder="请填写排序 " name="sort">
			        <span class="help-block"></span>
			        <button type="submit" class="btn">提交</button>
			      </fieldset>
			    </form>
		</div>
		
	</body>
</html>
