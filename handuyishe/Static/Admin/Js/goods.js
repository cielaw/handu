$(function(){
	//选择分类生成属性和规格
	$('select[name=cid]').change(function(){
		var tid = jQuery("select[name=cid] option:selected").attr('tid');
		if(tid == 0){
			alert('顶级分类不能添加商品');
		}
		//获得分类的cid
		var cid = $(this).val();
		//通过cid找到相对应的类型属性
		$.ajax({
			type:"post",
			url:requestUri,
			data:{cid,cid},
			dataType:'json',
			success:function(phpData){
				//定义规则和属性
				var attr = '';
				var spec = '';
				//循环json组合字符串
				$.each(phpData, function(k,v) {
					//如果是属性的时候
					if(v.atype == 0){
						attr +="<tr  >"
							+"<td>"+v.aname+"</td>"
							+"<td>"
								+"<select name='attr["+v.aid+"]'>"
									+"<option value=''>--请选择属性</option>";
									var option="";
									$.each(v.avalue, function(kk,vv) {
										option +="<option value='"+vv+"'>"+vv+"</option>";
										
										
									});
									attr +=option;
								attr += "</select>"
							+"</td>"
						+"</tr>"
					}else{
						spec += "<tr >"
							+"<td>"+v.aname+"</td>"
							+"<td>"
								+"<select name='spec["+v.aid+"][value][]'>"
									+"<option value=''>--请选择规格--</option>";
									var opt = "";
									$.each(v.avalue, function(kk,vv) {
										opt +="<option value='"+vv+"'>"+vv+"</option>";
									});
								spec +=opt;
								spec +="</select>"
							+"</td>"
							+"<td>"
								+"附加价值<input type='text' name='spec["+v.aid+"][price][]' id='price"+v.aid+"' value='' />"
							+"</td>"
							+"<td>"
								+"<a href='javascript:;' class='btn btn-primary add-spec'>添加规格</a>"
							+"</td>"	
						+"</tr>";
					}
				});
				$('.attrTable').html(attr);
				$('.specTable').html(spec);
			}
		});
		
	});
	//点击添加规格，规则会多一个
	$('.add-spec').live('click',function(){
		var tr = $(this).parents('tr');
		//克隆哟个父级tr
		var cloneTr = tr.clone();
		cloneTr.find('a').html('删除规格').removeClass('btn-primary').removeClass('add-spec').addClass('btn-danger remove-spec');
		tr.after(cloneTr);
	});
	//点击删除规格
	$('.remove-spec').live('click',function(){
		$(this).parents('tr').remove();
	});
	//提交表单时，把规格属性存入隐藏域中
	$('#addInput').submit(function(){
		var attr = $('.attrTable').html();
		var spec = $('.specTable').html();
		var hidden = "<input type='hidden' name='selected[attr]' id='' value='"+attr+"' />";
		hidden += "<input type='hidden' name='selected[spec]' id='' value='"+spec+"' />";
		$(this).append(hidden);
	});
	//让选中规格和属性都有selected属性
	$('select').live('change',function(){
		$(this).find('option:selected').attr('selected',true).siblings().removeAttr('selected');
	})
	//附加价值赋值
		
})
















