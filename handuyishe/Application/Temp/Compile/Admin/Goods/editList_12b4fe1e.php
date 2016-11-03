<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/Admin/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/Admin/js/jquery-1.7.2.min.js"></script>
    	<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/Admin/js/public.js"></script>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/Admin/css/goodsType.css"/>
	</head>
	<body>
		<h3 class="title"><span class="btn btn-primary">货品列表</span><a href="<?php echo U('goods');?>" class="btn">商品列表</a></h3>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'>
				<th>货品ID</th>
				<?php foreach ($temp as $k=>$v){?>
				<th><?php echo $v['aname'];?></th>
				<?php }?>
				<th>库存</th>
				<th>货号</th>
				<th>操作</th>
			</tr>
			
			<tr pid='0'>
				<th>修改货品</th>
				<form action="" method="post">
				<?php foreach ($result['combine'] as $k=>$v){?>
				<th>
					<select name="combine[]">
						
						<option value="">请选择</option>	
						<?php foreach ($v['gavalue'] as $kk=>$vv){?>
						<option value="<?php echo $kk;?>"     <?php if($kk==$result['id'][$k]){ ?>selected<?php } ?>><?php echo $vv;?></option>		
						<?php }?>
					</select>
				</th>
				<?php }?>
				<th>
					<input type="" name="stock" id="" value="<?php echo $result['stock'];?>" />
				</th>
				<th>
					<input type="" name="artno" id="" value="<?php echo $result['artno'];?>" />
				</th>
				<th>
					<input type="submit" name="" id="" value="确认修改"  class="btn btn-info btn-mini" />
				</th>
			</tr>
			</form>
			
		</table>
	
	</body>
</html>
