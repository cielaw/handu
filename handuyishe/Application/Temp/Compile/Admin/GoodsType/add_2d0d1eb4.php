<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/css/goodsType.css"/>
	</head>
	<body>

		<div class="addType">
				 <legend><h3 class="title"><span class="btn btn-primary" style="margin-left: 10px;">添加分类</span><a href="<?php echo U('GoodsType/index');?>" class="btn ">分类列表</a></h3></legend>
			    <form action="" method="post" style="margin-left: 10px;">
			      <fieldset>
			        <label>商品类型名称</label>
			        <input type="text" placeholder="请填写商品分类名 " name="tname">
			        <span class="help-block">请填写商品分类名 </span>
			        <button type="submit" class="btn">Submit</button>
			      </fieldset>
			    </form>
		</div>
		
	</body>
</html>
