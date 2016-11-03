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
				<h3 class="title"><span class="btn btn-primary"><?php echo $type['tname'];?>类型的属性</span><a href="<?php echo U('TypeAttr/index',array('tid'=>$_GET['tid']));?>" class="btn">属性列表</a></h3>
				    <form action="" method="post">
					    <table border="" cellspacing="" cellpadding="" class="table table-bordered">
							<tr><th>属性名称</th><td><input type="text" name="aname"><input type="hidden" name="type_id" value="<?php echo $hd['get']['tid'];?>"></td></tr>
							<tr><td>属性类别</td><td>属性<input type="radio"  name="atype" value="0"><br />
								规格<input type="radio" name="atype" value="1"></td></tr>
							<tr><td>属性值(多个值用 竖线 | 分隔) </td>
								<td>
								<textarea name="avalue" rows="" cols=""></textarea>
								<!--<input type="text"  name="avalue">-->
								
								</td>
							</tr>
							<tr><td colspan = "2"><button type="submit"  class="btn">Submit</button></tr>	
						</table>
					</form>	
			</div>
	</body>
</html>
