<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/Admin/css/orderList.css"/>
		<script src="http://localhost/handuyishe/Static/Admin/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div id="order">
			<div class="order">
				
				<h1 class="theme"><span>订单</span></h1>
				<table class="table"style="font-size: 12px;" width="100%">
			        <tr style="background:#B3B3B3">
			            <td>商品名称</td>
			            <td>规格</td>
			            <td>单价</td>
			            <td>数量</td>
			            <td>订单状态</td>
			            <td>实付款</td>
			            <td>操作</td>
			       
			    	<tr/>
			    <?php foreach ($myOrder as $k=>$v){?>
			    
			        <tr class="shouhou" count="<?php echo count($v['orderList']);?>" style="background:#C3C3C3">
			            <td colspan="7"><span >订单编号：<i> <?php echo $v['order_no'];?></i> <span>收货人：<i><?php echo $v['reciever'];?></i></span>&nbsp;&nbsp; <span>收货地址</span><i><?php echo $v['order_address'];?></i></td>
			        </tr>
			  	<?php foreach ($v['orderList'] as $key=>$value){?>
			  		
			        <tr style="background:#C3C3C3">
			            <td><a href=""><img style="float: left;" width="50" src="http://localhost/handuyishe/<?php echo $value['listpic'];?>"/></a><span style="display: inline-block;float:left;"><br /><?php echo substr($value['gname'],0,60);?></span></td>
			            <td style="vertical-align:middle; text-align:center;" ><?php echo $value['spec'];?></td>
			            <td style="vertical-align:middle; text-align:center;"><?php echo $value['price'];?></td>
			            <td style="vertical-align:middle; text-align:center;"><?php echo $value['num'];?></td>
			            <td rowspan="
<?php echo count($v['orderList']);?>" class="operate<?php echo $key;?>" style="vertical-align:middle; text-align:center;">
							<!--<input type="text" name="status" value="<?php echo $v['status'];?>" style="width: 40px;"/>-->
							<select name="status">
								<option value="7" >请选状态</option>
								<option value="0"     <?php if($v['status'] ==0){ ?>selected<?php } ?> >未发货</option>
								<option value="1"     <?php if($v['status'] ==1){ ?>selected<?php } ?> >已付款</option>
								<option value="2"     <?php if($v['status'] ==2){ ?>selected<?php } ?> >已发货</option>
								<option value="3"    <?php if($v['status'] ==3){ ?>selected<?php } ?> >已送达</option>
							</select>
							<input type="hidden" name="statusSiblins"  value="<?php echo $v['order_id'];?>" />
			            </td>
			            <td rowspan="
<?php echo count($v['orderList']);?>"  class="operate<?php echo $key;?> orderNo" style="vertical-align:middle; text-align:center;" class="" ><?php echo $v['total_price'];?></td>
			            <td rowspan="
<?php echo count($v['orderList']);?>" style="vertical-align:middle; text-align:center;" class="operate<?php echo $key;?>">
							<a href="<?php echo U("delOrder",array('order_id'=>$v['order_id']));?>"style="display: inline-block;width: 50px;text-decoration: none;color: black;" class='del'>取消订单</a>
							<br />
							<a href="<?php echo U("editOrder",array('order_id'=>$v['order_id']));?>" style="display: inline-block;width: 50px;text-decoration: none;color: black;">编辑</a>
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
					var operate = 'operate'+1;
					$('.operate'+i).remove();
				}
				//删除用户、帖子
				$('.del').click(function(){
					return confirm('是否要取消订单？');
				})
				//订单状态异步
				$('select[name=status]').change(function(){
					var order_id = $(this).siblings('input[name=statusSiblins]').attr('value');
					var status = $(this).val();
					if(status == 7){
						alert('请选状态');
						return false;
					}
					if(status == 1){
						alert('用户已付款不可选');
						return false;
					}
					$.ajax({
					type:"post",
						url:"<?php echo U('OrderList/statusAjax');?>",
						data:{"status":status,"order_id":order_id},
						dataType:'json',
						success:function(phpDath){
							
						}
					});
				});

			})
	</script>
</html>
