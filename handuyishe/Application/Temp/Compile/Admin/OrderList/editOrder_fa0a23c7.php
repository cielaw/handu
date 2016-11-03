<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/Admin/css/orderList.css"/>
		<script src="http://127.0.0.1/handuyishe/Static/Admin/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
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
			            <td>操作</td>
			       
			    	<tr/>
			    <?php foreach ($myOrder as $k=>$v){?>
			    
			        <tr class="shouhou" count="<?php echo count($v['orderList']);?>" style="background:#C3C3C3">
			            <td colspan="7"><span >订单编号：<i> <?php echo $v['order_no'];?></i> <span>下单时间：<i><?php echo $v['rise_tme'];?></i></span> <span>韩都客服</span></span></td>
			        </tr>
			  	<?php foreach ($v['orderList'] as $key=>$value){?>
			  		
			        <tr style="background:#C3C3C3">
			            <td><a href=""><img style="float: left;" width="50" src="http://127.0.0.1/handuyishe/<?php echo $value['listpic'];?>"/></a><span style="display: inline-block;float:left;"><br /><?php echo substr($value['gname'],0,60);?></span></td>
			            <td style="vertical-align:middle; text-align:center;" ><?php echo $value['spec'];?></td>
			            <td style="vertical-align:middle; text-align:center;"><?php echo $value['price'];?></td>
			            <td style="vertical-align:middle; text-align:center;">
			            	<input type="text" name="num" style="width: 30px;text-align: center;" value="<?php echo $value['purchase_num'];?>"  />
			            	<input type="hidden" name="olid"  value="<?php echo $value['olid'];?>" />
			            </td>
			            <td  style="vertical-align:middle; text-align:center;">
							<a href="<?php echo U("delOrderList",array('olid'=>$value['olid'],'order_id'=>$_GET['order_id']));?>" class="del">删除</a>
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
				
				//删除用户、帖子
				$('.del').click(function(){
					return confirm('是否要取消订单？');
				})
				
				$('input[name=num]').blur(function(){
					var num = $(this).val();
					var olid = $(this).siblings('input[name=olid]').val();
					$.ajax({
						type:"post",
						url:"<?php echo U('changeOlNumAjax');?>",
						data:{'num':num,'olid':olid},
						dataType:'json',
						success:function(phpData){
							
						}
					});
				});
			})
	</script>
</html>
