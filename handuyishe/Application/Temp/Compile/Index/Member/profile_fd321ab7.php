<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/hdjs.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/profile.css"/>
		<script language="javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/address.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/jquery-1.8.2.min.js"></script>
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
				<h1 class="theme"><span>我的基本资料</span></h1>
				
<form id="HDJS" action="" method="post">
    <table class="hd-form hd-table hd-table-form">
        
        <tbody>

        <tr>
            <th class="hd-w150">用户名</th>
            <td>
                <input name="username" type="text" value="<?php echo $profile['username'];?>">
            </td>
        </tr>
        <tr>
            <th>会员类型</th>
            <td>
                <input name="hidden" type="hidden">
            </td>
        </tr>
        
        <tr>
            <th>真实姓名</th>
            <td>
                <input name="realname" type="text" value="<?php echo $profile['realname'];?>">
            </td>
        </tr>
         <tr>
            <th>生日</th>
            <td>
                <select name="year">
					<option value="0">请选择年份</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					<option value="1982">1982</option>
					<option value="1983">1983</option>
					<option value="1984">1984</option>
					<option value="1985">1985</option>
					<option value="1986">1986</option>
					<option value="1987">1987</option>
					<option value="1988">1988</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option>
					<option value="1991">1991</option>
					<option value="1992" selected>1992</option>
					<option value="1993">1993</option>
					<option value="1994">1994</option>
					<option value="1995">1995</option>
					<option value="1996">1996</option>
					<option value="1997">1997</option>
					<option value="1998">1998</option>
					<option value="1999">1999</option>
					<option value="2000">2000</option>
				</select>
				<select name="month">
					<option value="0">请选中月份</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5" selected>5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				<select name="day">
					<option value="0">请选择天</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7" selected>7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="22">22</option>
					<option value="21">21</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
            </td>
        </tr>
        <tr>
            <th>性别</th>
            <td>
                <label><input name="sex" value="男" type="radio"     <?php if($profile['sex']==男){ ?>checked<?php } ?>> 男</label>
                <label><input name="sex" value="女" type="radio"    <?php if($profile['sex']==女){ ?>checked<?php } ?>> 女</label>
                <span id="hd_sex"></span>
            </td>
        </tr>
        
        <tr>
            <th>手机号码</th>
            <td>
                <input name="phone" type="text" value="<?php echo $profile['phone'];?>">
            </td>
        </tr>
        </tbody>
    </table>
     <input name="uid" type="hidden" value="<?php echo $hd['session']['uid'];?>">
    <input value="确定" class="hd-btn hd-btn-sm" type="submit">
</form>


			</div>
		</div>
	</body>
</html>

