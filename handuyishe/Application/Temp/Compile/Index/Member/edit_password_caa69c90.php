<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/edit_password.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/bootstrap.min.css"/>
	</head>
	<body>
		<div id="order">
			<div class="order">
				<h1 class="theme"><span>修改密码</span></h1>
				    <form method="post" class="form-horizontal" style="margin-top: 50px;margin-left: 100px;">
					      <div class="control-group">
					        <label class="control-label" for="inputEmail">原密码</label>
					        <div class="controls">
					          <input type="password" id="oldPassword" name="oldPassword" placeholder="原密码">
					        </div>
					      </div>
					      <div class="control-group">
					        <label class="control-label" for="inputPassword">新密码</label>
					        <div class="controls">
					          <input type="password" id="newPassword" name="password" placeholder="新密码">
					        </div>
					      </div>
					      <div class="control-group">
					        <label class="control-label" for="inputPassword">确认密码</label>
					        <div class="controls">
					          <input type="password" id="newPasswordRe" name="rePassword" placeholder="确认密码">
					        </div>
					      </div>
					      <div class="control-group">
					    <div class="controls">
					      
					      <button type="submit" class="btn btn btn-danger">保存</button>
					    </div>
					  </div>
					    </form>
			</div>
		</div>
	</body>
</html>


