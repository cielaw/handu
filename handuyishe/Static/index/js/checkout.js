$(function(){
	//选择收货地址
	$('.shopping_order_address>li').click(function(){
		$(this).addClass('selected').siblings('li').removeClass('selected');
		var reciever = $(this).find('.receiver').attr('receiver');
		var phone = $(this).find('.phone').attr('phone');
		var province = $(this).find('.province').attr('province');
		var city = $(this).find('.city').attr('city');
		var country = $(this).find('.country').attr('country');
		var address = $(this).find('.address').attr('address');
		var email = $(this).find('.email').attr('email');
		var fullAddress = province+city+country+address;
		$('#reciever').attr('value',reciever);
		$('#address').attr('value',address);
		$('#tel').attr('value',phone);
		$('#email').attr('value',email);
		$('#fullAddress').attr('value',fullAddress);
		$('#edit_address').hide();
		$('#new_address').attr('value','使用新地址');
	});
	$('#new_address').toggle(function(){
		$(this).attr('value','使用旧地址');
		$('#edit_address').show();
		$('#reciever').attr('value','');
		$('#address').attr('value','');
		$('#tel').attr('value','');
		$('#email').attr('value','');
		$('#fullAddress').attr('value','');
	},function(){
		$('#edit_address').hide();
		$(this).attr('value','使用新地址');
	});
	//总付款（商品加快递）
	$('.express_list_tr').click(function(){
		var shipping = $('input[name="shipping"]:checked ').val()
		if( shipping== 10 ){
			var total_amounta = $('#total_amount').attr('total_amount');
			var totala = parseInt(total_amounta)+15;
			$("#total_amount").html(totala);
			$('#send_momey').html(15);
		};
		if(shipping ==6){
			var total_amountb = $('#total_amount').attr('total_amount');
			var totalb = parseInt(total_amountb)+15;
			$("#total_amount").html(totalb);
			$('#send_momey').html(15);
		}
		if(shipping ==3){
			var total_amountc = $('#total_amount').attr('total_amount');
			var totalc = parseInt(total_amountc)+20;
			$("#total_amount").html(totalc);
			$('#send_momey').html(20);
		}
		if(shipping ==9){
			var total_amountc = $('#total_amount').attr('total_amount');
			var totalc = parseInt(total_amountc);
			$("#total_amount").html(totalc);
			$('#send_momey').html(0);
		}
	});
	
})
