<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/js/jquery-1.7.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Joker-tK/handu/handu/Static/Admin/css/goodsType.css"/>
		<script type="text/javascript" src="http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/jquery.uploadify.min.js"></script>
		<link href="http://127.0.0.1/Joker-tK/handu/handu/Static/uploadify/uploadify.css" type="text/css" rel="stylesheet"></link>
	</head>
	<body>

		<div class="addType">
			 <legend><h3 class="title"><span class="btn btn-primary" style="margin-left: 10px;">添加加品牌</span><a href="<?php echo U('brand');?>" class="btn ">品牌列表</a></h3></legend>
			    <form action="" method="post" enctype="multipart/form-data">
			    <table border="" cellspacing="" cellpadding="" class="table table-bordered">
			    	<tr>
			    		<td>商品品牌名称</td>
			    		<td>
			    			<input type="text" placeholder="请填写品牌名 " name="bname">
			    		</td>
			    	</tr>
			    	<tr>
			    		<td>品牌logo</td>
			    		<td>
			    			 <input type="file" name="logo">
			    		</td>
			    	</tr>
			    	<tr pid='0'>
				<td>上传列表图</td>
				<td>
					 <div lab="uploadFile">
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
	                            var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' width='20' class='hd-w80 hd-h70'/></li>";
	                              var input = '<input type="text" name="showpic" id="" value="'+data.path+'" />';
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
			    			   是:<input type="radio" name="is_hot" value="1"><br />
			                                                        否:<input type="radio" name="is_hot" value="0" checked>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td>商品分类排序</td>
			    		<td>
			    			<input type="text" placeholder="请填写排序 " name="sort">
			    		</td>
			    	</tr>
			    	<tr>
			    		<td colspan="2">
			    			<button type="submit" class="btn">提交</button>
			    		</td>
			    		
			    	</tr>
			    </table>
			     <!-- <fieldset style="margin-left: 10px;">
			        <label>商品品牌名称</label>
			        
			       	<label>商品品牌LOGO</label>
			       
			        <label>是否热门</label>
			                       是:<input type="radio" name="is_hot" value="1"><br />
			                       否:<input type="radio" name="is_hot" value="0" checked>
			        <label>商品分类排序</label>
			        <input type="text" placeholder="请填写排序 " name="sort">
			        <span class="help-block"></span>
			        
			      </fieldset>-->
			    </form>
		</div>
		
	</body>
</html>
