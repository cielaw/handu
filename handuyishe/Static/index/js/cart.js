$(function(){
	//点击减少
	$('.decrease').click(function(){
		var inputNum = $(this).parents('.goodThis').find('.inputNum').val();
		inputNum = parseInt(inputNum);
		inputNum = inputNum-1;
		$(this).parents('.goodThis').find('.inputNum').val(inputNum);
		var sid = $(this).parents('.goodThis').find('.brandBuy').attr('sid');
		var total = $(this).parents('.goodThis').find('.totalPrice');
		$.ajax({
			type:"post",
			url:requestCartc,
			data:{"inputNum":inputNum,'sid':sid},
			dataType:'json',
			success:function(phpDath){
				total.html(phpDath.total);
				$('.totelnum').html(phpDath.goodsNum+'件商品');
				$('.totelPrice').html(phpDath.TotalPrice);
				$('.yourPay').children('i').html(phpDath.TotalPrice);
			}
		});
	});
	//点击增加
	$('.increase').click(function(){
		var inputNum = $(this).parents('.goodThis').find('.inputNum').val();
		inputNum = parseInt(inputNum);
		inputNum = inputNum+1;
		var total = $(this).parents('.goodThis').find('.totalPrice');
		$(this).parents('.goodThis').find('.inputNum').val(inputNum);
		var sid = $(this).parents('.goodThis').find('.brandBuy').attr('sid');
		$.ajax({
			type:"post",
			url:requestCartc,
			data:{"inputNum":inputNum,'sid':sid},
			dataType:'json',
			success:function(phpDath){
				total.html(phpDath.total);
				$('.totelnum').html(phpDath.goodsNum+'件商品');
				$('.totelPrice').html(phpDath.TotalPrice);
				$('.yourPay').children('i').html(phpDath.TotalPrice);
			}
		});
	});
	//input框输入离开焦点事件
	$('.inputNum').blur(function(){
		var inputNum =$(this).val();
		if(inputNum<=0){
			return false;
		}
		if(isNaN(inputNum)){
			alert('请输入正确的购买数字');
		}
		var sid = $(this).parents('.goodThis').find('.brandBuy').attr('sid');
		var total = $(this).parents('.goodThis').find('.totalPrice');
		$.ajax({
			type:"post",
			url:requestCartc,
			data:{"inputNum":inputNum,'sid':sid},
			dataType:'json',
			success:function(phpDath){
				total.html(phpDath.total);
				$('.totelnum').html(phpDath.goodsNum+'件商品');
				$('.totelPrice').html(phpDath.TotalPrice);
				$('.yourPay').children('i').html(phpDath.TotalPrice);
			}
		});
		
	});
	
})
