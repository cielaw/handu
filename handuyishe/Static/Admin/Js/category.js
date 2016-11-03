$(function(){
	$('tr[pid!=0]').hide();
	$('.icon-plus').toggle(function(){
		$(this).removeClass().addClass('icon-minus');
		var index = $(this).parents('tr').attr('cid');
		$('tr[pid=' + index + ']').show();	

	},function(){
		$(this).removeClass().addClass('icon-plus');
		var index = $(this).parents('tr').attr('cid');
		$('tr[pid=' + index + ']').hide();	
	})

})