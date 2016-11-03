<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/common.css" />
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/index/css/checkout.css" />

		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			var requestUri = "<?php echo U('order');?>";
			var requestUrl = "<?php echo U('shoppingSuccess');?>";
		</script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/checkout.js"></script>
		<script language="javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/js/address.js"></script>
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
		<!--顶部导航开始-->
		<!--顶部导航开始-->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div id="global_nav">
	<div class="global_nav">
		<div class="global_info_left">
			<ul>
				<li><a href="http://127.0.0.1/Joker-tK/handu/handu" class="returnIndex">返回首页</a></li>
				<!--<li><a href="">收藏本站</a></li>-->		
			</ul>
		</div>		
		<div class="global_info_right">
			<ul class="reloZome">
				    <?php if(isset($_SESSION['email']) && isset($_SESSION['uid'])){ ?>
					<li><a href="<?php echo U('Login/out');?>">您好,<?php echo $hd['session']['email'];?>！</a></li>
					<li><a href="<?php echo U('Login/out');?>">退出</a></li>
				<?php }else{ ?>
					<li><a href="">您好，欢迎光临韩都衣舍！</a></li>
					<li><a href="<?php echo U('Login/login');?>">登录 </a></li>
					<li><a href="<?php echo U('Register/register');?>" class="info_red" target="_blank">注册</a></li>
				<?php } ?>
					<li><a href="<?php echo U('Cart/cart');?>">购物车</a></li>
					<li><a href="<?php echo U('Member/index');?>">个人中心</a></li>
			</ul>
		</div>		
	</div>
</div>						
		<!--顶部导航右边结束-->
		<!--确认订单开始-->
		<div id="checkoutAll">
			<div class="checkoutHeader">
				<a href="" class="headerLeft"></a>
				<div class="headerRight">

				</div>
			</div>
		</div>
		<form action="" method="post" name="theForm" id="theForm">
			<div class="wrap" style="padding-top:20px;background:#fefefe;">
				<div class="wrap_content">

					<div class="shopping_order">
						<div class="shopping_order_title">填写并核对订单信息</div>
						<ul class="confirm_list">
							<li id="shop_address">

								<h2>收货人信息</h2>
								<div class="shopping_order_currentinfo" style="display:block;">

								</div>
								<div id="all_address" class="shopping_order_info_parent" style="display: block;">

									<ul class="shopping_order_address" id="shopping_order_address" style="width:100%;">
										<?php foreach ($address as $k=>$v){?>
										<li     <?php if($v['default_address']==1){ ?>class="selected"<?php } ?> >
											<span class="address_name">&nbsp;&nbsp;&nbsp;
												<i class="receiver" receiver='<?php echo $v['receiver'];?>'><?php echo $v['receiver'];?></i>&nbsp;&nbsp;&nbsp;
												<i class="phone" phone='<?php echo $v['phone'];?>'><?php echo $v['phone'];?></i>&nbsp;&nbsp;&nbsp;
												
											</span>
											<br>
											<span class="address_dizhi" style="word-break: break-all;word-wrap: break-word;overflow:hidden;position:absolute;top:25px;padding: 5px 10px;line-height: 25px;height:40px;">
												<i class="province" province="<?php echo $v['province'];?>"><?php echo $v['province'];?></i>
												<i class="city" city="<?php echo $v['city'];?>"><?php echo $v['city'];?></i>
												<i class="country" country="<?php echo $v['country'];?>"><?php echo $v['country'];?></i>
												<i class="address" address="<?php echo $v['address'];?>"><?php echo $v['address'];?></i>
												<br />
												<i class="email" email="<?php echo $v['email'];?>"><?php echo $v['email'];?></i>
											</span>
											<br>
										</li>
										<?php }?>
										
										<li id="newAddress" style="background:none;">
											<span>
									        <input name="" value="使用新地址" style="display: inline-block;padding: 0 10px;overflow: hidden;border: 1px solid #ccc;border-width: 0 1px;border-radius: 2px;cursor: pointer;color: #333;height: 25px;line-height: 25px;" type="button" id="new_address">
									      </span>
										</li>
									</ul>
									<ul class="shopping_order_addressContent" id="edit_address" style="display: none;">
										<li>
											<div class="all_address_name"><em class="star">*</em>收货人姓名：</div>
											<input id="reciever" name="reciever" maxlength="20" class="all_address_txt" type="text"> (必填)</li>
										<li>
											<div class="all_address_name"><em class="star">*</em>所在地区：</div>
											<div class="all_address_select">
												<select id="s1" name="province">
													<option>省份</option>
												</select>
												<select id="s2" name="city">
													<option>地级市</option>
												</select>
												<select id="s3" name="country">
													<option>市、县级市、县</option>
												</select>
											</div>
										</li>
										<li>
											<div class="all_address_name"><em class="star">*</em>详细地址：</div>
											<input id="address" name="address" class="all_address_txt00" maxlength="200" type="text">(必填)</li>

										<li>
											<div class="all_address_name"><em class="star">*</em>电话：</div>
											<input id="tel" class="all_address_txt" maxlength="12" name="tel" type="text"> (必填)</li>
										<li>
											<div class="all_address_name"><em class="star">*</em>电子邮箱：</div>
											<input id="email" class="all_address_txt" name="email" type="text">(必填)</li>
											<input id="fullAddress" class="all_address_txt" name="fullAddress" type="hidden"></li>
										
									</ul>

									<script>
										
											///点radio最后改变配送方式

										function changeAddress(address, is_now) {
												if (address.val() == " ") {
													$(".shopping_order_addressContent").css("display", "block");
												} else {
													$(".shopping_order_addressContent").css("display", "none");
												}
												address.parents().find('.shopping_order_address li').removeClass('selected');
												address.parent().parent().addClass('selected');
												var address_dizhi = address.parents('.address_name').siblings(".address_dizhi").text();
												var address_name = address.parents('span').text().trim();
												var address_tel = address.parents('.address_name').siblings(".address_tel").text();
												$.get('flow.php?step=ajax_change_address', {
													address_id: address.val(),
													is_now: is_now,
													goods_price: $('#goodsPriceTotal').val(),
													discount: $('#discountTotal').val()
												}, function(data) {
													$('#shop_shopping').html(data); //改变运送方式
													//改变显示的内容
													$('#address_name').html(address_name + '&nbsp;' + address_tel);
													$('#address_address').html(address_dizhi);
												}, 'json');
											}
											
											
											/**收货地址绑定事件**/
									</script>

								</div>
								<div></div>
							</li>

							<li>
								<h2>配送方式</h2>
								<div style="display: none;" class="shopping_order_currentinfo">
									<p id="peisong_way"><span>普通快递&nbsp;￥0.00&nbsp;送货时间不限</span></p>
									<input name="best_time" value="送货时间不限" type="hidden">
								</div>
								<div class="shopping_order_delivery shopping_order_info_parent" style="">

									<table class="express_list">
										<thead>
											<tr>
												<th width="15%">送货方式</th>
												<th width="15%">配送时间</th>
												<th width="20%">运费标准</th>
											</tr>
										</thead>
										<tbody>

											<tr class="express_list_tr">
												<td>
													<input name="shipping" class="shopping_order_delivery_radiop" value="10" type="radio">&nbsp; <span class="shipping_name">货到付款</span>
													<input class="shipping_is_now" value="0" type="hidden">
												</td>
												<td>
													<select style="display: none;" name="district" class="selDistricts">
														<option selected="selected" value="送货时间不限">送货时间不限</option>
														<option value="周六日、假期送货">周六日、假期送货</option>
														<option value="周一至周五">周一至周五</option>
													</select>
												</td>
												<td style="text-indent:20px;"><span class="shipping_fee">￥15.00</span></td>
											</tr>
											<tr class="express_list_tr selected">
												<td>
													<input name="shipping" class="shopping_order_delivery_radiop" checked="checked" value="9" type="radio">&nbsp; <span class="shipping_name">普通快递</span>
													<input class="shipping_is_now" value="0" type="hidden">
												</td>
												<td>
													<select style="" name="district" class="selDistricts">
														<option selected="selected" value="送货时间不限">送货时间不限</option>
														<option value="周六日、假期送货">周六日、假期送货</option>
														<option value="周一至周五">周一至周五</option>
													</select>
												</td>
												<td style="text-indent:20px;"><span class="shipping_fee">￥0.00</span></td>
											</tr>
											<tr class="express_list_tr">
												<td>
													<input name="shipping" class="shopping_order_delivery_radiop" value="6" type="radio">&nbsp; <span class="shipping_name">EMS 国内特快专递</span>
													<input class="shipping_is_now" value="0" type="hidden">
												</td>
												<td>
													<select style="display: none;" name="district" class="selDistricts">
														<option selected="selected" value="送货时间不限">送货时间不限</option>
														<option value="周六日、假期送货">周六日、假期送货</option>
														<option value="周一至周五">周一至周五</option>
													</select>
												</td>
												<td style="text-indent:20px;"><span class="shipping_fee">￥15.00</span></td>
											</tr>
											<tr class="express_list_tr">
												<td>
													<input name="shipping" class="shopping_order_delivery_radiop" value="3" type="radio">&nbsp; <span class="shipping_name">顺丰速运</span>
													<input class="shipping_is_now" value="0" type="hidden">
												</td>
												<td>
													<select style="display: none;" name="district" class="selDistricts">
														<option selected="selected" value="送货时间不限">送货时间不限</option>
														<option value="周六日、假期送货">周六日、假期送货</option>
														<option value="周一至周五">周一至周五</option>
													</select>
												</td>
												<td style="text-indent:20px;"><span class="shipping_fee">￥20.00</span></td>
											</tr>

										</tbody>
									</table>
									<div class="cart_btn btn7 fl"></div>
								</div>

								<script>
									$(function() {
										//配送时间改变
										$(".selDistricts").change(function() {
											var ship_name = $(this).parents('tr').children().find('.shipping_name').html();
											var ship_fee = $(this).parents('tr').children().find('.shipping_fee').html();
											var arrive_time = $(this).val();
											$('#peisong_way').html(ship_name + '&nbsp;' + ship_fee + '&nbsp;' + arrive_time);
											$("input[name='best_time']").val(arrive_time);
										});
										/**配送方式行选中事件**/
										$(".express_list_tr").each(function(index, item) {
											$(this).click(function() {
												$(this).find("input[name='shipping']").attr("checked", true);
												var shipping_is_now = $.trim($(".shipping_is_now").val());
												// alert(shipping_is_now);
												changeShipping($(this).find("input[name='shipping']"), shipping_is_now);
											});
										});
									});
									 ///改变运送方式 改变价格
									function changeShipping(obj, is_now) {
										//改变颜色
										obj.parents('tr').siblings('tr').removeClass('selected');
										obj.parents('tr').addClass('selected');
										var shippingValue = obj.val();
										if (shippingValue <= 0) {
											$("#PaymentSelect").html("请选择支付方式");
											$("#payment").val(0);
											return false;
										}
										if (shippingValue == 10) {
											$("#pay_name").html('货到付款');
											$('#pay_id').val(46);
											$("input[name=selectPayment][value=46]").attr("checked", 'checked');
											$('#zifu_way_xiugai').hide();
										} else {
											$("#pay_name").html('支付宝');
											$("#pay_id").val(24);
											$("input[name=selectPayment][value=24]").attr("checked", 'checked');
											$('#zifu_way_xiugai').show();
										}
										var shipping_name = obj.next().html();
										var selDistricts = obj.parents('tr').find('.selDistricts').val();
										var shipping_fee = obj.parents('tr').find('.shipping_fee').html();
										//显示运送的时间
										$(".express_list select[name='district']").hide();
										obj.parents('tr').find('.selDistricts').show();
										var addrId = $("input:radio:checked[name='address']").val();
										$.post("flow.php?step=select_shipping", {
											address_id: addrId,
											shipping: shippingValue,
											is_now: is_now
										}, function(result) {
											if (result.error == '') {
												$(".accumulated2").html(result.content); //改变价格列表
												$('#total_amount').html(result.total); //改变总价格
												$('#peisong_way').html('<span >' + shipping_name + '&nbsp;' + shipping_fee + '&nbsp;' + selDistricts + '</span>') //显示配送方式的名称
											} else {
												alert(result.error);
											}
										}, "JSON");
									}
								</script>

							</li>

							<li>
								<h2>支付方式</h2>
								<div class="shopping_order_pay">
									<div class="shopping_order_pay02 shopping_order_info_parent" style="display:block;">
										<ul class="shopping_order_pay0002">
											<h2 class="selected">支付平台</h2>
											<li>
												<input name="selectPayment" value="支付宝" checked="checked" type="radio">&nbsp;<img class="payment_img" style="cursor:pointer;" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/alipay.gif" height="32" border="0" width="125">
												
												<br><span id="zf_tip" style="color: #f00;font-size: 12px; margin-left:26px;"></span>
											</li>

										</ul>
										<ul class="shopping_order_pay0002">
											<h2>货到付款</h2>

											<li>
												<input name="selectPayment" value="46" type="radio">&nbsp;<img class="payment_img" style="cursor:pointer;" src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/cod.gif" height="32" border="0" width="125">
												<input name="payname" value="货到付款" type="hidden">

											</li>

										</ul>

										<div class="cart_btn btn6 fl" onclick="openHide(this,2,'save');"></div>
									</div>
								</div>
							</li>
						</ul>

						<h2>商品清单</h2>
						<a href="<?php echo U('cart');?>" style="color:#1887E0; float:right;margin-right:50px;" >回到购物车，修改订单&gt;&gt;</a>

						<div class="shopping_order_information">
							<div class="shopping_order_information_title">
								<span class="information_title">商品图片</span>
								<span class="information_title information_title00">商品名称</span>
								<span class="information_title">规格</span>
								<span class="information_title">单价</span>
								<span class="information_title">数量</span>
								<span class="information_title">小计</span>
							</div>
							<?php foreach ($info as $k=>$v){?>
								<h3>  <span>品牌:<?php echo $v['bname'];?></h3>

								<ul class="shopping_order_information_ul">

									<li>
										<div class="information_pic">
											<a href="" title="" target="_blank"><img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $v['listpic'];?>" alt="" height="77" border="0" width="77"></a>
										</div>
										<div class="information_name">
											<div class="middle">
												<a href="" title="" target="_blank"><?php echo $v['name'];?></a>
												<br>
												<span></span> </div>
										</div>
										<div class="information_xinxi">
											<div class="middle">
												<?php foreach ($v['options'] as $key=>$value){?>
													<?php echo $key;?>:<?php echo $value;?>
												<?php }?>
											</div>
										</div>
										<div class="information_xinxi">
											<div class="cprice"><span>￥<?php echo $v['price'];?></span>
												<br>

											</div>
										</div>
										<div class="information_xinxi">
											<div class="middle">2</div>
										</div>
										<div class="information_subtotal">
											<div class="middle"><?php echo $v['total'];?></div>
										</div>
									</li>

								</ul>
							<?php }?>
							<div class="accumulated2 fr">

								<input id="goodsPriceTotal" name="goodsPriceTotal" value="466.48" type="hidden">
								
							</div>
						</div>
						<div class="information_bonus_pay">
							<div class="information_bonus_total">
								<input class="cart_btn btn13" style="background: #C80A28;color: white;font-size: 20px;border: none;" value="提交订单" type="submit">
							</div>
							<div class="information_bonus_total">
								快递费:<span id="send_momey" total_amount='<?php echo $hd['session']['cart']['total'];?>'>0</span>
								您共需要为订单支付:<span id="total_amount" total_amount='<?php echo $hd['session']['cart']['total'];?>'><?php echo $hd['session']['cart']['total'];?></span>
							</div>
						</div>
					</div>
				</div>
		</form>

		<!--确认订单结束-->
		<!--尾部开始-->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--尾部开始-->

		<div id="footer">
			<div class="footerIn">
				<!--优势开始-->
				<div class="advance">
					
				</div>
				<!--优势结尾-->
				<!--尾部导航开始-->
				<div class="blackOut">
					<div class="footer_black"> 
    				 	<a href="" target="_blank">首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;
     					<a href="http://www.houdunwang.com">后盾网</a>
   					</div>
   				</div>
				<!--尾部导航结束-->
				<!--icon开始-->
				<div class="iconBottom">
					<center>
         				<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/zxmbutton02_sy.jpg" alt="" height="38" border="0" width="114">
        				<a href="" target="_blank">
        					<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/zxmbutton05_sy.jpg" alt="" style="margin:5px 5px 0 5px;" height="38" border="0" width="103">
        					
        				</a>
						<a href="" target="_blank" style="display:inline-block;position:relative;width:102px;height:37px;">
       						<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/cnnic.png" alt="" height="37" border="0" width="102">
							
						</a>
        				<a style="display: inline-block;width: 74px;margin: 4px 3px;"> 
        					<img src="http://127.0.0.1/Joker-tK/handu/handu/Static/index/images/cctv.png" alt="" height="40" border="0" width="74">
        					
        				</a>
        			</center>
				</div>
				<!--icon结束-->	
			</div>
		</div>
		<!--尾部结束-->

		<!--尾部结束-->
	</body>