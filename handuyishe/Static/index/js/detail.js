$(function(){
	//点击尺寸和颜色时，获得商品信息
	$('.specLi>.spec').click(function(){
		$(this).addClass('red').siblings('a').removeClass('red');
		var gid = $(this).attr('gid');
		//选择的长度
		var len = $('.red').length;
		var specLi = $('.specLi').length;
		if(len >= specLi){
			var combine = '';
			$.each($('.red'), function() {
				combine +=$(this).attr('gaid')+',';
			});
			$.ajax({
			type:"post",
			url:requestUri,
			data:{"combine":combine,'gid':gid},
			dataType:'json',
			success:function(phpDath){
				$('#artno').html(phpDath.artno);
				$('.newPrice').html(phpDath.price);
				$('.stockList').html(phpDath.stock);
				$('.addCart').attr("glid",phpDath.glid);
				$('.addCart').attr("price",phpDath.price);
				$('.buy').attr("glid",phpDath.glid);
				$('.buy').attr("price",phpDath.price);
				$('.stockList').attr('num',phpDath.stock);
				
			}
		});
		}
		
	});
	//点击减少
	$('.decrease').click(function(){
		var inputNum = parseInt($('.inputNum').val());
		if(inputNum <= 0){
			alert('请正确填写商品数');
			return fasle;
		}
		inputNum = inputNum-1;
		$('.inputNum').val(inputNum);
	});
	//点击增加
	$('.increase').click(function(){
		var inputNum = parseInt($('.inputNum').val());
		var sum = parseInt($('.stockList').attr('num'));
		if(inputNum>=sum){
			alert('库存仅'+sum);
			return fasle;
		}
		inputNum = inputNum+1;
		$('.inputNum').val(inputNum);
	});
	//手动输入数量
	$('.inputNum').blur(function(){
		var inputNum = $(this).val();
		if(inputNum<=0){
			alert('请正确输入数量');
			return false;
		}
		if(inputNum>$('.stockList').attr('num')){
			alert('库存不足');
			return false;
		}
		
	});
	//商品加购物车
	$('.addCart').click(function(){
		var glid = $(this).attr('glid');
		var gid = $(this).attr('gid');
		var price = $(this).attr('price');
		var count = $('.inputNum').val();
		if($('.stockList').attr('num')==0){
			alert('库存不足');
			return false;
		}
		if(glid == 0 || price == 0){
			alert('请选择颜色和尺寸');
			return false;
		}
		if(count == 0){
			alert('请填写数量');
			return false;
		}
		
		$.ajax({
			type:"post",
			url:requestCart,
			data:{"glid":glid,"gid":gid,'count':count,'price':price},
			dataType:'json',
			success:function(phpDath){
				location.href= requestCartc;
			}
		});
	});
	//商品立即购买
	$('.buy').click(function(){
		var glid = $(this).attr('glid');
		var gid = $(this).attr('gid');
		var price = $(this).attr('price');
		var count = $('.inputNum').val();
		if($('.stockList').attr('num')==0){
			alert('库存不足');
			return false;
		}
		if(glid == 0 || price == 0){
			alert('请选择颜色和尺寸');
			return false;
		}
		if(count == 0){
			alert('请填写数量');
			return false;
		}
		
		$.ajax({
			type:"post",
			url:requestCart,
			data:{"glid":glid,"gid":gid,'count':count,'price':price},
			dataType:'json',
			success:function(phpDath){
				location.href= requestCarta;
			}
		});
	});
})
