<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/order.css"/>
		<script src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		
		
	</head>
	<body>
		<div id="order">
			<div class="order">
				
				<h1 class="theme"><span>我的订单</span></h1>
				<table class="table"style="font-size: 12px;" width="100%">
			        <tr style="background:#B3B3B3">
			            <td>商品名称</td>
			            <td>规格</td>
			            <td>单价</td>
			            <td>数量</td>
			            <td>售后</td>
			            <td>实付款</td>
			            <td>交易操作</td>
			       
			    	<tr/>
			    <?php foreach ($myOrder as $k=>$v){?>
			    
			        <tr class="shouhou" count="<?php echo count($v['orderList']);?>" style="background:#C3C3C3">
			            <td colspan="7"><span>订单编号：<i> <?php echo $v['order_no'];?></i> <span>下单时间：<i><?php echo $v['rise_tme'];?></i></span> <span>韩都客服</span></span></td>
			        </tr>
			  	<?php foreach ($v['orderList'] as $key=>$value){?>
			  		
			        <tr style="background:#F3F3F3">
			            <td><a href=""><img style="float: left;" width="50" src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $value['listpic'];?>"/></a><span style="display: inline-block;float:left;"><br /><?php echo substr($value['gname'],0,60);?></span></td>
			            <td style="vertical-align:middle; text-align:center;"><?php echo $value['spec'];?></td>
			            <td style="vertical-align:middle; text-align:center;"><?php echo $value['price'];?></td>
			            <td style="vertical-align:middle; text-align:center;"><?php echo $value['num'];?></td>
			            <td rowspan="
<?php echo count($v['orderList']);?>" class="operate<?php echo $key;?>"></td>
			            <td rowspan="
<?php echo count($v['orderList']);?>" class="operate<?php echo $key;?>" style="vertical-align:middle; text-align:center;"><?php echo $v['total_price'];?></td>
			            <td rowspan="
<?php echo count($v['orderList']);?>" style="vertical-align:middle; text-align:center;" class="operate<?php echo $key;?>"> 
						    <?php if($v['status']==0){ ?>
						<a href="<?php echo U('cart/pay',array('orderid'=>$v['order_id']));?>" target="_top" order_id="<?php echo $v['order_id'];?>" class="pay" style="background: #C91532;color: white;display: inline-block;width: 40px;text-decoration: none;">支付</a>
						<a href="<?php echo U("delList",array('order_id'=>$v['order_id']));?>"style="display: inline-block;width: 50px;text-decoration: none;color: black;" class='del'>取消订单</a>
						<?php } ?>
						     <?php if($v['status']==1){ ?>
						 	已付款
			            <?php } ?>
			                 <?php if($v['status']==2){ ?>
						 	已发货
			            <?php } ?>
			                 <?php if($v['status']!=3 && $v['status']!=0){ ?>
						 	 <a href="javascript:;" style="background: #C91532;color: white;display: inline-block;width: 40px;text-decoration: none;" class="recieve" order_id="<?php echo $v['order_id'];?>">收货</a>
						<?php } ?>
						     <?php if($v['status']==3){ ?>
						 	 已收货
			            <?php } ?>
			           <br/>
			            </td>
			           
			        </tr>
			   
			    <?php }?>
			    <?php }?>
			     </table>
			</div>
		</div>
	</body>
	<script type="text/javascript">
			$(function(){
				//删除td显示一个	售后 实付款 	交易操作
				var count = $('.shouhou').attr('count');
				for (var i=1;i<=count;i++) {
					$('.operate'+i).remove();
				}
				//删除用户、帖子
				$('.del').click(function(){
					return confirm('确定要删除吗？');
				})
				$('.recieve').click(function(){
					var orderId = $(this).attr('order_id');
					var td = $(this).parent('td');
					$.ajax({
						type:"post",
						url:"<?php echo U('recieve');?>",
						data:{'orderId':orderId},
						dataType:'json',
						success:function(phpdata){
							if(phpdata == 1){
								alert('收货成功');
								td.html('已收货');
							}
						}
					});
				});
				$('.recieve').live('click',function(){
					var orderId = $(this).attr('order_id');
					var td = $(this).parent('td');
					$.ajax({
						type:"post",
						url:"<?php echo U('recieve');?>",
						data:{'orderId':orderId},
						dataType:'json',
						success:function(phpdata){
							if(phpdata == 1){
								alert('收货成功');
								td.html('已收货');
							}
						}
					});
				});
				$('.pay').click(function(){
					var orderId = $(this).attr('order_id');
					var td = $(this).parent('td');
					$.ajax({
						type:"post",
						url:"<?php echo U('pay');?>",
						data:{'orderId':orderId},
						dataType:'json',
						success:function(phpdata){
							var recive = '';
							if(phpdata){
								alert('支付成功');
								 recive +=  '已支付<br/><a href="javascript:;" style="background: #C91532;color: white;display: inline-block;width: 40px;text-decoration: none;" class="recieve" order_id='+phpdata+'>收货</a>';
								 td.html(recive);
							}
						}
					});
				});
				$('.pay').click(function(){
					var orderId = $(this).attr('order_id');
					
				});
			})
	</script>
</html>
