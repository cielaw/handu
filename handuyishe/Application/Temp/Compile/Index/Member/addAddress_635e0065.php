<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/index/css/profile.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/index/css/hdjs.css"/>
		<script language="javascript" src="http://127.0.0.1/handuyishe/Static/index/js/address.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/index/js/jquery-1.8.2.min.js"></script>
		<script language="javascript">
			var s=["s1","s2","s3"];
			var opt0 = ["请选择省","请选择市","请选择县（区）"];
			function setup(){
			 for(i=0;i<s.length-1;i++)
			  document.getElementById(s[i]).onclick=new Function("change("+(i+1)+")");
			 change(0);
			}
			window.onload=function(){
			setup()	
				
			};
			$(function(){
				
				$('.dj').live('click',function(){
					var dj = $('#s1').val() + '省,' + $('#s2').val() + '市,' + $('#s3').val();
					alert(dj);	
				})
			})
		</script>
	</head>
	<body>
		<div id="order">
			<div class="order">
				<h1 class="theme"><span>收货地址添加</span></h1>
				<form id="HDJS" action="" method="post">
    <table class="hd-form hd-table hd-table-form">
        
        <tbody>

        <tr>
            <th class="hd-w150">收货人</th>
            <td>
                <input name="receiver" type="text">
            </td>
        </tr>
        <tr>
            <th>所在地区</th>
            <td>
               <select id="s1" name="province">
					<option>省份</option>
				</select>
				<select id="s2" name="city">
					<option>地级市</option>
				</select>
				<select id="s3" name="country">
					<option>市、县级市、县</option>
				</select>
            </td>
        </tr>
        
        <tr>
            <th>详细地址</th>
            <td>
                <input name="address" type="text">
            </td>
        </tr>
        <tr>
            <th>电话</th>
            <td>
                <label><input name="phone" type="text"> 
                <span id="hd_sex"></span>
            </td>
        </tr>
        <tr>
            <th>email</th>
            <td>
                <label><input name="email" type="text"> 
                <span id="hd_sex"></span>
            </td>
        </tr>
        </tbody>
    </table>
    <input value="确定" class="hd-btn hd-btn-sm" type="submit">
</form>


			</div>
		</div>
	</body>
</html>
