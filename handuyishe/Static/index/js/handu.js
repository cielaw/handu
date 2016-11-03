$(function(){
	//二级菜单
	$('.item').hover(
  function () {
    $(this).children('.subCategory').show();
    $(this).addClass('selected');
    
  },
  function () {
     $(this).children('.subCategory').hide();
     $(this).removeClass('selected');
  });
 
	// 首屏轮播图
	var f = 0;
	function runsp(){
       f++;
       // 判断
       if(f==6){
       	  f=0;
       }
       // 图片显隐变化
       $('.zhuping_lb a').eq(f).fadeIn().siblings('a').fadeOut();
       // 数字图标的变化
        $('.lunbo_list li').eq(f).css({background:'#B61B1F'}).stop().siblings('li').css({background:'#3E3E3E'});
	}
	// 启动定时器
	times = setInterval(runsp,3000);


    //2. 移入左右键显隐，定时器停止
    $('.zhuping_center').hover(function(){
    	 // 鼠标移入大盒子,左右点击键显示
         $('.zhuping_center .left,.zhuping_center .right').fadeIn();
         // 停止定时器
         clearInterval(times);
    },function(){
    	 // 鼠标移出大盒子,左右点击键消失
    	 $('.zhuping_center .left,.zhuping_center .right').fadeOut();
    	 // 启动定时器
         times = setInterval(runsp,3000);
    });
 
    // 移入数字图标切换背景图和小图标
    $('.lunbo_list li').mouseover(function(){
    	f = $(this).index();
    	// 背景图显隐
    	$('.zhuping_lb a').eq(f).fadeIn().siblings('a').stop().fadeOut();
    	// 数字图标背景色变化
    	$('.lunbo_list li').eq(f).css({background:"#B61B1F"}).siblings('li').css({background:'#3E3E3E'});
    });

    // 3左右点击切换背景图片和数字图标
    
    // 点击右侧按钮
    $('.zhuping_center .right').click(function(){
    	f++;
    	if(f==6){
    		f=0;
    	}
    	// 背景图显隐
    	$('.zhuping_lb a').eq(f).fadeIn().siblings('a').stop().fadeOut();
    	// 数字图标背景色变化
    	$('.lunbo_list li').eq(f).css({background:"#B61B1F"}).siblings('li').css({background:'#3E3E3E'});    	
    })
  
    // 点击左侧按钮
    $('.zhuping_center .left').click(function(){
    	f--;
    	if(f==-1){
    		f=5;
    	}
    	// 背景图显隐
    	$('.zhuping_lb a').eq(f).fadeIn().siblings('a').stop().fadeOut();
    	// 数字图标背景色变化
    	$('.lunbo_list li').eq(f).css({background:"#B61B1F"}).siblings('li').css({background:'#3E3E3E'});    	
       })
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
	//换一批
	mn=2;
	$('.change').click(function(){
		
		if (mn==3) {
			mn=1;
		}
		$('.brandsContentU'+mn).css({display:'block'}).siblings('ul').css({display:'none'});
		mn++;
	});
	// 服装部分选项卡
	$('.dongtai>li').mouseover(function(){
		$('.handuActiveContent').eq($(this).index()).show().siblings(".handuActiveContent").hide();
		$(this).css({borderBottom:'2px solid #FF0F3F'}).siblings().css({borderBottom:'2px solid #E7E7E7'});
		$(this).css({color:'#FF0F3F'}).siblings().css({color:'#000'});
	})
	//新品上市
	/*$('.newArrival>li').mouseover(function(){
		var three = $(this).index();
		$('.newContent').eq($(this).index()).show().siblings(".newContent").hide();	
	})*/
	//热销排行榜
	$('.rankhs').mouseover(function(){
		$(this).children('.rankTitle').hide().siblings().show();
		$(this).siblings().children('.rankTitle').show().siblings('.rankA').hide();
	})
	
	
	
	//amh品牌图片焦点
	var imgs = $.makeArray($(".amh img"));
	
	$(".amh").mouseout(function  () {
		  for (var i=0; i<imgs.length; i++){
		  // 需要使用自定义的animate函数，不能使用jquery自带的animate函数
			animate(imgs[i],{opacity:1},100);
		 }
	});

	for (var i=0; i<imgs.length; i++) {
		  
		  imgs[i].onmouseover=function  () {
			 
			 for (var j=0; j<imgs.length; j++) {
			 animate(imgs[j],{opacity:0.5},100);
			  
			 }
             animate(this,{opacity:1},100);
			
		  }
	
	}
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
})

	
 
