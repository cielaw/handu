$(function(){
	//品牌toggle
	$('.cateTree .hstyle').toggle(function(){
		$(this).siblings('dd').children('.ulSecCate').show();
		$(this).parents('dl').siblings().find('.ulSecCate').hide();
	},function(){
		
		$(this).siblings('dd').children('.ulSecCate').hide();
	});
	//属性更多
	$('.attr-border:gt(3)').hide();
	$('.more').toggle(function(){
		$('.attr-border:gt(3)').show();
		$(this).html('收起更多商品特性');
	},function(){
		$('.attr-border:gt(3)').hide();
		$(this).html('更多选项(商品特性)');
	});
	
})
