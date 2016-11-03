$(function(){
	//删除列表图
	$('.lsitimg').click(function(){
		alert(11);
		var path = $('.lispic').attr('src');
		var gid = $('.lispic').attr('gid');
		$(this).siblings().remove();
		$(this).remove();
		$('#lispic').remove();
		$('#listpic').remove();
		$('#uploadListPic').show();
		$(this).remove();
		$.ajax({
			type:"post",
			url:requestUrl,
			data:{"path":path,"gid":gid},
			dataType:'json',
			success:function(phpDath){
				
			}
		});
	});
	//删除图集
	$('.shopImgA').click(function(){
		var path = $(this).siblings().attr('src');
		var gid = $('.lispic').attr('gid');
		$(this).siblings().remove();
		$(this).remove();
		$.ajax({
			type:"post",
			url:requestUrlPic,
			data:{"path":path},
			dataType:'json',
			success:function(phpDath){
				
			}
		});
		
	});
	//删除图集
	$('.shopImgB').click(function(){
		var path = $(this).siblings().attr('src');
		var gid = $('.lispic').attr('gid');
		$(this).siblings().remove();
		$(this).remove();
		$.ajax({
			type:"post",
			url:requestViewUrlPic,
			data:{"path":path},
			dataType:'json',
			success:function(phpDath){
				
			}
		});
		
	});
	
		
})
















