$(function(){
	
	//二级菜单
	
	$('.show_cate').hover(
  		function () {
    		$('.categoryBd').show();
  		},
  		function () {
     		$('.categoryBd').hide();
 		}
	);
	//二级菜单
	$('.item').hover(
  function () {
    $(this).children('.subCategory').show();
  },
  function () {
     $(this).children('.subCategory').hide();
  }
);
  //自动浮动
   var jq=1;
   var fin_ul =  $('.huadong').find('ul');
   var page_wid = 999;
   function runBrand(){
   		jq++;
   		if(jq >= 3){
   			fin_ul.css('left','1000px');
   			jq=1;
   		}
   		
   		fin_ul.animate({left:'-='+page_wid},500);
   }
   timeBrnad = setInterval(runBrand,5000);
    // 品牌浮动
   $('.huadong').hover(function(){
   		$(this).children('input').fadeIn();
   		clearInterval(timeBrnad);
   },function(){
   		$(this).children('input').fadeOut();
   		timeBrnad = setInterval(runBrand,5000);
   });
   
	// 右边按钮
	var page = 1;
	$('.huadong > .next').click(function(){
		var fin_ul =  $(this).parents('.huadong').find('ul');
		var page_count = 2;
		var page_wid = 999;
		if (page == page_count) {
			fin_ul.animate({left:'0px'}, 2000);
			page =1;

		}else{
			fin_ul.animate({left:'-='+page_wid}, 2000);
			page++;
		}
	})

	// 左边按钮
	$('.huadong > .prev').click(function(){
		var fin_ul =  $(this).parents('.huadong').find('ul');
		var page_count = 2;
		var page_wid = 999;
		if (page == 1) {
			fin_ul.animate({left:'-999px'}, 2000);
			page = 2;

		}else{
			fin_ul.animate({left:'+='+page_wid}, 2000);
			page--;
		}
	})
	//购物车下拉框
	 validate = {verify:true};
	$('.header_right').hover(function() {
		$('.gwca').fadeIn();
		 $('.gwcas').fadeIn();
	}, function() {
		$('.gwca').fadeOut();
		$('.gwcas').fadeOut(); 
	});
	//购物车
    		$('.header_right').mouseover(function(){
				var num = 1;
				var cart = '';
				if(validate.verify == true){
					validate.verify = false;
					$.ajax({
					type:"post",
					url:requestUrii,
					data:{"num":num},
					dataType:'json',
					success:function(phpDath){
						if(phpDath){
							$.each(phpDath.goods, function(k,v) {
							cart +='<li style="width=300px;height=40px;position: relative;">'
									+'<img width="20" style="" src="'+v.listpic+'"/>&nbsp;&nbsp;&nbsp;'
									+'<span style="position: absolute;left: 30px;top: 5px;">'+v.name+'</span>&nbsp;&nbsp;&nbsp;'
									+'<span style="position: absolute;left: 218px;top: 5px;">'+v.total+'元</span>'
									+'</li>';
							});
								cart +='<p style="text-align:right;color:#C80A2B;margin-right:10px;">总共'+phpDath.total_rows+'件&nbsp;小计'+phpDath.total+'元</p>';
							$('.gwca>ul').html(cart);
							$('.gwca>h3').hide();
							}
							
							
						}
						
					});	
				}
			})
    		$('.header_right').mouseout(function(){
    			validate.verify = true;
    		});
});
