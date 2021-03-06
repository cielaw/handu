<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>修改商品</title>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/js/jquery-1.7.2.min.js"></script>
    	<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/js/public.js"></script>
    	<script type="text/javascript">
    		var requestUri = "<?php echo U('getTypeAttr');?>";
    		var requestUrl = "<?php echo U('delListImgAjax');?>";
    		var requestUrlPic = "<?php echo U('delImgsAjax');?>";
    		var requestViewUrlPic = "<?php echo U('delViewImgsAjax');?>";
    	</script>
    	<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/js/goodsedit.js"></script>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/css/goodsType.css"/>
	<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/jquery.uploadify.min.js"></script>
	<link href="http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/uploadify.css" type="text/css" rel="stylesheet"></link>
	<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/Joker-tK/handu/handu/Static/ueditor1_4_3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/Joker-tK/handu/handu/Static/ueditor1_4_3/ueditor.all.min.js"> </script>
     <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/Joker-tK/handu/handu/Static/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
     <script type="text/javascript">
     	$(function(){
	//选择分类生成属性和规格
	function getSpecAttr(cid){
		
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
						attr +="<tr>"
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
						spec += "<tr>"
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
								+"附加价值<input type='text' name='spec["+v.aid+"][price][]' id='' value='' />"
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
	}
	$('select[name=cid]').change(function(){
		var tid = jQuery("select[name=cid] option:selected").attr('tid');
		if(tid == 0){
			alert('顶级分类不能添加商品');
		}
		//获得旧数据分类的cid
		var cid = $(this).val();
		//旧数据cid
		var oldCid = '<?php echo $info['cid'];?>';
		var oldAttr = '<?php echo $selected['attr'];?>';
		var oldSpec = '<?php echo $selected['spec'];?>';
		if(cid == oldCid){
			$('.attrTable').html(oldAttr);
			$('.specTable').html(oldSpec);
		}else{
			getSpecAttr(cid);
		}
	});
	//缓存过来数据直接分配
	var oldAttr = '<?php echo $selected['attr'];?>';
	var oldSpec = '<?php echo $selected['spec'];?>';
	alert
	$('.attrTable').html(oldAttr);
	$('.specTable').html(oldSpec);
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
	$('#editInput').submit(function(){
		var attr = $('.attrTable').html();
		var spec = $('.specTable').html();
		var hidden = "<input type='hidden' name='selected[attr]' id='' value='"+attr+"' />";
		hidden += "<input type='hidden' name='selected[spec]' id='' value='"+spec+"' />";
		$(this).append(hidden);
	//让选中规格和属性都有selected属性
	$('select').live('change',function(){
		$(this).find('option:selected').attr('selected',true).siblings().removeAttr('selected');
	})
	
		
})
     </script>
	</head>
	<body>
		<h3 class="title"><span class="btn btn-primary"><?php echo $type['tname'];?>添加商品</span><a href="<?php echo U('goods');?>" class="btn">商品列表</a></h3>
		<form action="" method="post" id="editInput">
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'>
				<th colspan="6"><span class="btn btn-primary">基本信息</span></th>	
				<input type="hidden" name="uid" id="" value="<?php echo $hd['session']['aid'];?>" />
				
			</tr>
			
			<tr pid='0'>
				<td>所属分类</td>
				<td>
					<input type="hidden" name="tid" id="tid" value="" />
					<select name="cid">
						<option value="">请选择分类</option>
						<?php foreach ($cate as $k=>$v){?>
						<option value="<?php echo $v['cid'];?>" tid="<?php echo $v['type_id'];?>"     <?php if($v['cid']==$info['cid']){ ?>selected<?php } ?>><?php echo $v['_name'];?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr pid='0'>
				<td>所属品牌</td>
				<td>
					<select name="bid">
						<option value="">请选择类型</option>
						<?php foreach ($brand as $k=>$v){?>
						<option value="<?php echo $v['bid'];?>"     <?php if($v['bid']==$info['bid']){ ?>selected<?php } ?>><?php echo $v['bname'];?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr pid='0'>
				<td>商品名称</td>
				<td>
					<input type="text" name="gname" id="" value="<?php echo $info['gname'];?>" />
				</td>
			</tr>
			<tr pid='0'>
				<td>商品货号</td>
				<td>
					<input type="text" name="gnumber" id="" value="<?php echo $info['gnumber'];?>" />
				</td>
			</tr>
			<tr pid='0'>
				<td>商品库存</td>
				<td>
					<input type="text" name="stock" id="" value="<?php echo $info['stock'];?>" />
				<stock>
			</tr>
			<tr pid='0'>
				<td>商品单位</td>
				<td>
					<input type="text" name="unit" id="" value="<?php echo $info['unit'];?>" />
				</td>
			</tr>
			<tr pid='0'>
				<td>商场价格</td>
				<td>
					<input type="text" name="marketprice" id="" value="<?php echo $info['marketprice'];?>" />
				</td>
			</tr>
			<tr pid='0'>
				<td>商城价格</td>
				<td>
					<input type="text" name="shopprice" id="" value="<?php echo $info['shopprice'];?>" />
				</td>
			</tr>
			<tr>
				<td>展示位置</td>
				<td>
				 	<label for="is_index1" style="float: left;">普通商品 :</label>
				 	<input type="radio" name="is_index" id="is_index1" value="1"      <?php if($info['is_index']==1){ ?>checked<?php } ?> style="float: left; margin-right:10px"/>
					<label for="is_index5" style="float: left;">首页品牌展示大图:</label>
					<input type="radio" name="is_index" style="float: left;margin-right:10px" id="is_index5" value="5"     <?php if($info['is_index']==5){ ?>checked<?php } ?>/>
					<label for="is_index6" style="float: left;">首页品牌展示中图:</label>
					<input type="radio" name="is_index" id="is_index6" value="6"     <?php if($info['is_index']==6){ ?>checked<?php } ?> style="float: left;margin-right:10px"/>
					<label for="is_index7" style="float: left;">首页品牌展示小图:</label>
					<input type="radio" name="is_index" id="is_index7" value="7"     <?php if($info['is_index']==7){ ?>checked<?php } ?> style="float: left;margin-right:10px"/>
					<label for="is_index8" style="float: left;">首页品牌图展示:</label>
					<input type="radio" name="is_index" id="is_index7" value="8"     <?php if($info['is_index']==8){ ?>checked<?php } ?> style="float: left;margin-right:10px"/>
					<label for="is_index10" style="float: left;">轮播展示:</label>
					<input type="radio" name="is_index" id="is_index10" value="10"      <?php if($info['is_index']==10){ ?>checked<?php } ?> style="float: left;margin-right:10px"/>
				</td>
			</tr>
			<tr pid='0'>
				<td>点击次数</td>
				<td>
					<input type="text" name="click" id="" value="<?php echo $info['click'];?>" />
				</td>
			</tr>
			<tr pid='0'>
				<td>上传列表图</td>
				<td>
					
					    <?php if($info['listpic']){ ?>
						<div style="float: left;">
						<img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $info['listpic'];?>" width="100" class="lispic" gid='<?php echo $hd['get']['gid'];?>'/>
						<a href="javascript:;" style="color: red;vertical-align: -90px;" class="lsitimg">X</a>
						<input type="hidden" name="listpic" id="listpic" value="<?php echo $info['listpic'];?>" />
						</div>
					
					<?php } ?>
					<div lab="uploadFile" id="uploadListPic" style="">
			            <input id="fileList" type="file" multiple="true">
			            <script type="text/javascript">
			            
			                $(function() {
			                    $('#fileList').uploadify({
			                        'formData'     : {//POST数据
			                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
			                        },
			                        'fileTypeDesc' : '上传文件',//上传描述
			                        'fileTypeExts' : '<?php echo $set['filetype'];?>',
			                        'swf'      : 'http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/uploadify.swf',
			                        'uploader' : '<?php echo U("uploadList");?>',
			                        'buttonText':'选择文件',
			                        'fileSizeLimit' : '2000KB',
			                        'uploadLimit' : 1000,//上传文件数
			                        'width':65,
			                        'height':25,
			                        'successTimeout':10,//等待服务器响应时间
			                        'removeTimeout' : 0.2,//成功显示时间
			                        'onUploadSuccess' : function(file, data, response) {
			                            data=$.parseJSON(data);
			                            var imageUrl = data.image?data.url:'http://127.0.0.1/Joker-tK/handu/handu/Static/image/default.png';
			                            var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' class='hd-w80 hd-h70' width='100'/></li>";
			                              var input = '<input type="hidden" name="listpic" id="" value="'+data.path+'" />';
			                            $("#uploadList ul").prepend(li);
			                            $("#uploadList ul").prepend(input);
			                        }
			                    });
			                });
			            </script>
			            <div id="uploadList">
			                <ul>
			 
			                </ul>
			            </div>
			        </div>
			        
				</td>
			</tr>
			<tr pid='0'>
				<td>上传首页图</td>
				<td>
					
					    <?php if($info['indexpic']){ ?>
						<div style="float: left;">
						<img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $info['indexpic'];?>" width="100" class="lispic" gid='<?php echo $hd['get']['gid'];?>'/>
						<a href="javascript:;" style="color: red;vertical-align: -90px;" class="lsitimg">X</a>
						<input type="hidden" name="indextpic" id="indextpic" value="<?php echo $info['indexpic'];?>" />
						</div>
					
					<?php } ?>
					<div lab="uploadFile" id="uploadListPic" style="">
			            <input id="fileIndex" type="file" multiple="true">
			            <script type="text/javascript">
			            
			                $(function() {
			                    $('#fileIndex').uploadify({
			                        'formData'     : {//POST数据
			                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
			                        },
			                        'fileTypeDesc' : '上传文件',//上传描述
			                        'fileTypeExts' : '<?php echo $set['filetype'];?>',
			                        'swf'      : 'http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/uploadify.swf',
			                        'uploader' : '<?php echo U("uploadIndex");?>',
			                        'buttonText':'选择文件',
			                        'fileSizeLimit' : '2000KB',
			                        'uploadLimit' : 1000,//上传文件数
			                        'width':65,
			                        'height':25,
			                        'successTimeout':10,//等待服务器响应时间
			                        'removeTimeout' : 0.2,//成功显示时间
			                        'onUploadSuccess' : function(file, data, response) {
			                            data=$.parseJSON(data);
			                            var imageUrl = data.image?data.url:'http://127.0.0.1/Joker-tK/handu/handu/Static/image/default.png';
			                            var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' class='hd-w80 hd-h70' width='100'/></li>";
			                              var input = '<input type="text" name="indexpic" id="" value="'+data.path+'" />';
			                            $("#uploadIndex ul").prepend(li);
			                            $("#uploadIndex ul").prepend(input);
			                        }
			                    });
			                });
			            </script>
			            <div id="uploadIndex">
			                <ul>
			 
			                </ul>
			            </div>
			        </div>
			        
				</td>
			</tr>
		</table>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'>
				<th colspan="6"><span class="btn btn-primary">商品属性</span></th>
			</tr>
		</table>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered attrTable">
			
		</table>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr class="specTitle">
				<th colspan="6"><span class="btn btn-primary">商品规格</span></th>
			</tr>
		</table>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered specTable">
			
		</table>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'>
				<th colspan="6"><span class="btn btn-primary">商品详细</span></th>	
			</tr>
			<tr pid='0'>
				<td class="btn btn-primary">上传图集</td>
				<td>
					    <?php if($info['shoppic']){ ?>
						<?php foreach ($info['shoppic'] as $k=>$v){?>
							<div style="float: left;">
							<img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $v;?>" class="imgShop" width="100" gid="<?php echo $hd['get']['gid'];?>"/>
							<input type="hidden" name="shoppic[]" id="shoppic[]" value="<?php echo $v;?>" />
							<a href="javascript:;" class="shopImgA">X</a>
							</div>
						<?php }?>
					<?php } ?>
					 <div lab="uploadFile">
			            <input id="pic" type="file" multiple="true">
			            <script type="text/javascript">
			                $(function() {
			                    $('#pic').uploadify({
			                        'formData'     : {//POST数据
			                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
			                        },
			                        'fileTypeDesc' : '上传文件',//上传描述
			                        'fileTypeExts' : '<?php echo $set['filetype'];?>',
			                        'swf'      : 'http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/uploadify.swf',
			                        'uploader' : '<?php echo U("pic");?>',
			                        'buttonText':'选择文件',
			                        'fileSizeLimit' : '2000KB',
			                        'uploadLimit' : 1000,//上传文件数
			                        'width':65,
			                        'height':25,
			                        'successTimeout':10,//等待服务器响应时间
			                        'removeTimeout' : 0.2,//成功显示时间
			                        'onUploadSuccess' : function(file, data, response) {
			                            data=$.parseJSON(data);
			                            var imageUrl = data.image?data.url:'http://127.0.0.1/Joker-tK/handu/handu/Static/image/default.png';
			                            var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' class='hd-w80 hd-h70' width='100'/></li>";
			                              var input = '<input type="hidden" name="shoppic[]" id="" value="'+data.path+'" />';
			                            $("#picThree ul").prepend(input);
			                            $("#picThree ul").prepend(li);
			                          
			                        }
			                    });
			                });
			            </script>
			            <div id="picThree">
			                <ul>
			 
			                </ul>
			            </div>
			        </div>
			        
				</td>
			</tr>
			
			<tr class="">
				<td class="btn btn-primary detail">商品详细</td>
				<td class="edit">
					<script id="editor" type="text/plain" style="width:1360px;" name="intro"><?php echo $info['intro'];?></script>
                    <script>
	        				var ue = UE.getEditor('editor');
	   				 </script>
				</td>
			</tr>
			<tr pid='0'>
				<td class="btn btn-primary service">售后服务</td>
				<td>
					<script id="editor1" type="text/plain" style="width:1360px;" name="service"><?php echo $info['service'];?></script>
                    <script>
	        				var ue = UE.getEditor('editor1');
	   				 </script>
				</td>
			</tr>
		</table>
		<table border="" cellspacing="" cellpadding="" class="table table-bordered">
			<tr pid='0'><th colspan="6"><input type="submit" class="btn btn-primary" value="提交"/></th></tr>
		</table>
		</form>
	</body>
</html>
