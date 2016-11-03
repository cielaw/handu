<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/admin/Js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/jquery.uploadify.min.js"></script>
		<link href="http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/uploadify.css" type="text/css" rel="stylesheet"></link>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/css/goodsType.css"/>
		 <script type="text/javascript">
    	$(function(){
    		$('.close').click(function(){
    			//父级td
    			var td = $(this).parents('td');
    			alert(td);
    			//获取完整路径
    			var path = $(this).attr('path');
    			alert(path);
    			//获取对应aid
    			var bid = $(this).attr('bid');
    			alert(bid);
    			$.ajax({
    				type:"post",
    				url:"<?php echo U('delImg');?>",
    				data:{path:path,bid:bid},
    				success:function(){
    					//让图片隐藏
    					$('#img').hide();
    					//组合input字符串
    					var str = '<input type="file" name="logo" id="img" />';
    					//给td插入input
    					td.html(str);
    				}
    			});
    		});
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
					url:"<?php echo U('delListImgAjax');?>",
					data:{"path":path,"gid":gid},
					dataType:'json',
					success:function(phpDath){
						
			}
		});
	});
    	})
    </script>
	</head>
	<body>

		<div class="addType">
			 <h3 class="title"><span class="btn btn-primary">添加加品牌</span><a href="<?php echo U('brand');?>" class="btn">品牌列表</a></h3>
			   
			     <form action="" method="post" enctype="multipart/form-data">
			    <table border="" cellspacing="" cellpadding="" class="table table-bordered">
			    	<tr>
			    		<td>商品品牌名称</td>
			    		<td>
			    			<input type="hidden" name="bid" id="bid" value="<?php echo $info['bid'];?>" />
			        		<input type="text" placeholder="请填写品牌名 " name="bname" value="<?php echo $info['bname'];?>">
			    		</td>
			    	</tr>
			    	<tr>
			    		<td>商品品牌LOGO</td>
			    		<td style="position: relative;">
			    			    <?php if($info['logo']){ ?>
			       			<img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $info['logo'];?>" id="img" width="100"/>
			       			<a href="javascript:;" style="color: red;font-size: 15px;position: absolute;top: 20px;left: 90px; " class="close" path="<?php echo $info['logo'];?>" bid="<?php echo $info['bid'];?>">X</a>
			       			<input type="hidden" name="logo" value="<?php echo $info['logo'];?>"/>
			       			<?php }else{ ?>
			       			 <input type="file" name="logo">
			        		<?php } ?>
			    		</td>
			    	</tr>
			    	<tr pid='0'>
				<td>上传列表图</td>
				<td>
					
					    <?php if($info['showpic']){ ?>
						<div>
						<img src="http://127.0.0.1/Joker-tK/handu/handu/<?php echo $info['showpic'];?>" width="20" class="lispic" gid='<?php echo $hd['get']['gid'];?>'/>
						<a href="javascript:;" style="color: red;vertical-align: -90px;" class="lsitimg">X</a>
						<input type="text" name="showpic" id="showpic" value="<?php echo $info['showpic'];?>" />
						</div>
					
					<?php } ?>
					<div lab="uploadFile" id="uploadListPic" style="display: none;">
			            <input id="fileList" type="file" multiple="true">
			            <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
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
			                            var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' class='hd-w80 hd-h70' width='20'/></li>";
			                              var input = '<input type="hidden" name="showpic" id="" value="'+data.path+'" />';
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
			    	<tr>
			    		<td>是否热门</td>
			    		<td>
			    			是:<input type="radio" name="is_hot" value="1"     <?php if($info['is_hot'] == 1){ ?>checked<?php } ?>><br />
			                                               否:<input type="radio" name="is_hot" value="0"     <?php if($info['is_hot'] == 0){ ?>checked<?php } ?>>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td>商品分类排序</td>
			    		<td>
			    			<input type="text" placeholder="请填写排序 " name="sort" value="<?php echo $info['sort'];?>">
			    		</td>
			    	</tr>
			    	<tr>
			    		<td colspan="2">
			    			<button type="submit" class="btn">提交</button>
			    		</td>
			    	</tr>
			    </table>
			    </form>
		</div>
		
	</body>
</html>
