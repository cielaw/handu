<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/jquery-1.8.2.min.js"></script>
		<style type="text/css">
			*{
				padding: 0px;
				margin: 0px;
			}
			.top h3{
				margin-bottom: 10px;
			}
			.top p{
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
		<div id="all" style="width: 100%;height: 40px">
			<div class="top" style="margin: 0 auto; width: 950px;height: 40px">
				<div style="float:left;width: 118px;height: 40px;background: url(http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/T1HHFgXXVeXXXXXXXX.png) no-repeat;border-right:1px solid #333;"></div>
				<span style="display: block;float: left;margin-top: 10px;margin-left: 5px;">我的收银台</span>	
			</div>
		</div>
		<div id="content" style="width: 100%;background: #EFF0F1;clear: both;padding-top: 100px;padding-bottom: 100px;font-size: 12px;">
			<div class="top" style="margin: 0 auto; width: 950px;border-top: 5px solid #333;border-bottom: 5px solid #333;background: white;padding:150px 50px;">
				<h3>收款详情</h3>
				<p> 收款方： 	商户简称：韩都衣舍</p>
				<p> 订单号： 	<?php echo $info['order_no'];?></p>
				<p> 商品名称： 	韩都衣舍官方商城	<?php echo $info['order_no'];?></p>
				<p> 交易金额： 	<?php echo $info['total_price'];?></p>  
				<a href="javascript:;" class="pay" orderId='<?php echo $info['order_id'];?>'  style="text-align: center; display: block;width: font-size:15px;color:white;background: #C80A28;width: 150px;height: 40px;line-height: 40px;">支付</a>
			</div>
			
		</div>
		<div class="bottom" style="width: 100%;height: 40px">
			<div class="" style="margin: 0 auto; width: 600px;">
				<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/2R3cKfrKqS.png" />
			</div>
			
		</div>
		<script type="text/javascript">
			$(function(){
				$('.pay').click(function(){
					var orderId = $(this).attr('orderId');
					$.ajax({
						type:"post",
						url:"pay",
						data:{'orderId':orderId},
						dataType:'json',
						success:function(phpdata){
							if(phpdata == 1){
								alert('支付成功');
								location.href="<?php echo U('Index/index');?>";
							}
						}
					});
				});
			})
		</script>
	</body>
</html>
