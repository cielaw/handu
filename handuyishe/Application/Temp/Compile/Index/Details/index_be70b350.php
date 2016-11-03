<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/index/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/index/css/details.css"/>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/commom.js"></script>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/backTop.js"></script>
		<style type="text/css">
			.backTop{
			width: 50px;
			height: 50px;
			background: #C80A28;
			cursor: pointer;
			color: white;
			line-height: 50px;
			}
		</style>
		<script type="text/javascript">
    		var requestUri = "<?php echo U('goodsCount');?>";
    		var requestCart = "<?php echo U('Cart/index');?>";
    		var requestCartc = "<?php echo U('Cart/cart');?>";
    		var requestCarta = "<?php echo U('Cart/checkout');?>";
    		var requestUrii = "<?php echo U('Index/ajaxGetCart');?>";
    		$(function() {
			var options =
				{
					zoomWidth: 480, //放大镜的宽度
					zoomHeight: 480,//放大镜的高度
					zoomType:'standard'
				};
				$(".jqzoom").jqzoom(options);
				$('.picSmall').click(function(){
					$('.jqzoom').eq($(this).index()).show().siblings().hide();
				});
				$('.backTop').backTop();
			});
			
		</script>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/detail.js"></script>
		<link rel="stylesheet" href="http://localhost/handuyishe/Static/index/jqZoom/css/jqzoom.css" type="text/css">
		<script src="http://localhost/handuyishe/Static/index/jqZoom/js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
		<style type="text/css">
			.left{
				position: relative;
			}
			.jqzoom{
				position: absolute;
				left: 0;
				top: 0;
			}
			
		</style>
	</head>
	<body>
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--顶部导航开始-->
		<div id="global_nav">
			<div class="global_nav">
				<div class="global_info_left">
					<ul>
						<li><a href="http://localhost/handuyishe" target="_blank" class="returnIndex">返回首页</a></li>
						<!--<li><a href="">收藏本站</a></li>-->
					</ul>
				</div>
				<div class="global_info_right">
					<ul class="reloZome">
						    <?php if(isset($_SESSION['email']) && isset($_SESSION['uid'])){ ?>
							<li><a href="<?php echo U('Login/out');?>">您好,<?php echo $hd['session']['email'];?>！</a></li>
							<li><a href="<?php echo U('Login/out');?>">退出</a></li>
						<?php }else{ ?>
							<li><a href="">您好，欢迎光临韩都衣舍！</a></li>
							<li><a href="<?php echo U('Login/login');?>">登录 </a></li>
							<li><a href="<?php echo U('Register/register');?>" class="info_red" target="_blank">注册</a></li>
						<?php } ?>
						<li><a href="<?php echo U('Cart/cart');?>">购物车</a></li>
						<li><a href="<?php echo U('Member/index');?>">个人中心</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--顶部导航右边结束-->
		<!--头部开始-->
		<div id="header">
			<div class="headerTop">
				<div class="headerLogo">
					<a href="http:http://localhost/handuyishe"></a>
				</div>	
				<div class="headerSearch">
					<div class="searchForm">
						<form action="<?php echo U('List/search');?>" method="post">
							<input type="text" name="words" id="" class="text"/>
							<input type="submit" value="搜&nbsp;索"class="submit"/>
						</form>
					</div>
					<div class="hotWords">
					
					</div>
				</div>
				<!-- 购物车区开始 -->
				<div class="header_right">
	
					<a href="<?php echo U('cart/cart');?>">
						<span class='gwcxc'></span>我的购物车<span class = "youjiantou">&gt;</span></a>
					<div class="gwca" style="display: none;">
						<h3>购物车中还没有商品，赶紧选购吧！</h3>
						<ul style="margin: 10px;">
							
						</ul>
					</div>
					<h class="gwcas" >
								
					</h>
				</div>
				<!-- 购物车区结束 -->
			</div>
			<div class="header_bottom">
				<div class="header_complay">互联网时尚品牌运营集团
</div>			
				<div class="brand huadong">
					<input type="button" class="prev" id="prev" value="&lt;" />
					<input type="button" class="next" id="next"  value="&gt;" />
					<ul>
						<?php foreach ($brand as $k=>$v){?>
							<li><a href="<?php echo U('List/index',array('bid'=>$v['bid']));?>" class="bandLogo"><img src="http://localhost/handuyishe/<?php echo $v['logo'];?>"/></a>$k</li>
							
						<?php }?>
					</ul>
				</div>
			</div>	
			</div>	
		</div>
		<!--头部结束-->
		<!--导航开始-->
		<div class="handu_nav">
  <div class="handu_menu ">
    <div class="all show_cate">
      <a class="all_text" href="" target="_blank">全部商品分类<b></b></a>
     
    </div>
    <ul class="handu_menu_o ">
        <li class="menu_item">
        	<a target="_blank" href="http://localhost/handuyishe">首页</a>
        </li>
        <?php foreach ($topCate as $k=>$v){?>
        <li class="menu_item">
        	<a target="_blank" href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['cname'];?></a>
        </li>
        <?php }?>
    </ul>
</div>
		<!--导航结束-->
		<div id="goodsDetails">
			<div class="goodsDetails">
				<div class="detailNav">
					您所在的位置 &nbsp; >&nbsp;
					<?php foreach ($cate as $k=>$v){?>
						<a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['cname'];?></a> <code>&gt;</code>
					<?php }?>
					 <a href=""><?php echo $info['gname'];?></a>
				</div>
				<div class="hotCategory">
					
					<div class="newDiv">
						<h3 style="margin-bottom: 10px;"></h3>
						<ul class="newUl">
							<?php foreach ($newGoods as $k=>$v){?>
							<li style="border: 1px solid #C3C3C3;margin-bottom: 5px;margin-top: 5px;">
								<a href="<?php echo U('Details/index',array('gid'=>$v['gid']));?>"><img src="http://localhost/handuyishe/<?php echo $v['indexpic'];?>"/></a>
								<h5><a href="|U:'Details/index',array('gid'=>$v['gid'])}"><?php echo hd_substr($v['gname'],10,'...');?></a></h5>
								<p><em>￥<?php echo $v['shopprice'];?></em><i>￥<?php echo $v['marketprice'];?></i></p>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
				<div class="product_details">
					<div class="detailsTop">
						<div class="detailLeft">
							<div class="left">
			                            <?php
        //初始化
        $hd['list']['nv'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($info['shop_pic'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($info['shop_pic'] as $nv) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=5)break;
                //第几个值
                $hd['list'][nv]['index']++;
                //第1个值
                $hd['list'][nv]['first']=($listId == 0);
                //最后一个值
                $hd['list'][nv]['last']= (count($info['shop_pic'])-1 <= $listId);
                //总数
                $hd['list'][nv]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
			                    <a href="http://localhost/handuyishe/<?php echo $nv['1'];?>" class="jqzoom" style="display: none;" title="大图">
                  					<img src="http://localhost/handuyishe/<?php echo $nv['0'];?>" class="jqzoomImg" title="" style="border: 1px solid #666;"> 
                  				</a> 
                  				<?php }}?>
                  			</div>
							<ul>
								<?php foreach ($info['shop_pic_s'] as $k=>$v){?>
								<li class="picSmall">
									<img src="http://localhost/handuyishe/<?php echo $v;?>" alt="" />
								</li>
								<?php }?>
								
							</ul>
						</div>
						<div class="detailRight">
							<div class="detailInfo">
								<h1><?php echo $info['gname'];?></h1>
								<p>商品货号:<i id="artno"><?php echo $info['gnumber'];?></i> <span class="detailPrice">售价：<em>￥<?php echo $info['marketprice'];?></em></span></p>
								<p>促 销 价：<span class="newPrice">￥<?php echo $info['shopprice'];?></span> <em class="sale"><?php echo $info['discount'];?>折</em> </p>
								<p>销　　量：  <?php echo $info['pur_num'];?>件</p>
								<!--<p>用户评分： <span class="starOn"></span><span class="num">-->	
								<!--</span>(共有 <span class="commentNum">0 </span>条评论)</p>-->
							</div>
							<div class="shopInfo">
								<div id="">
									<ul>
										<?php foreach ($specs as $k=>$v){?>
										<li class='specLi'>
											<span><?php echo $v['specName'];?></span>
											<?php foreach ($v['specValue'] as $key=>$value){?>
											<a class="spec" gid='<?php echo $hd['get']['gid'];?>' gaid='<?php echo $value['gaid'];?>'><?php echo $value['gavalue'];?></a>			
											<?php }?>
										</li>
										<?php }?>
									</ul>
								</div>
								<div class="buyNum">
									<span style="line-height: 15px;font-size: 15px;">数量</span>
									<i class="decrease" style="margin-left: 30px;">-</i>
									<input type="" name="" id="" class="inputNum" value="1" />
									<i class="increase">+</i>
									<em>库存<b class="stockList" num=''><?php echo $info['stock'];?></b></em>
								</div>	
								<div class="submit">
									<a href="javascript:;" class="buy" glid='' price='' gid='<?php echo $hd['get']['gid'];?>'></a>
									<a href="javascript:;" class="addCart" glid='' price='' gid='<?php echo $hd['get']['gid'];?>'></a>
								</div>
							</div>
						</div>
					</div>
					<!--tab切换开始-->
					<div class="detailTab">
						<div class="tabBarBox">
							<ul>
								<li><a href="">商品详情</a></li>
							</ul>
						</div>
						<div class="flatContent">
							<div class="goodsAttrList">
								<ul>
									<li>货号：<?php echo $info['gnumber'];?></li>
									<?php foreach ($attr as $k=>$v){?>
										<li class="color"><?php echo $v['aname'];?>:<?php echo $v['gavalue'];?></li>
									<?php }?>
									
								</ul>
							</div>
							<div class="goodsShow">
								<img src="http://localhost/handuyishe/Static/index/images/750-302.jpg	" alt="" />
								<?php foreach ($info['viewpic'] as $k=>$v){?>
								<img src="http://localhost/handuyishe/<?php echo $v;?>" alt="" />
								<?php }?>
								<?php echo $info['intro'];?>
							</div>
						</div>
					</div>
					<!--tab切换结束-->
				</div>
				
			</div>
		</div>
		
		<!--尾部开始-->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--尾部开始-->

		<div id="footer">
			<div class="footerIn">
				<!--优势开始-->
				<div class="advance">
					
				</div>
				<!--优势结尾-->
				<!--尾部导航开始-->
				<div class="blackOut">
					<div class="footer_black"> 
    				 	<a href="" target="_blank">首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;
     					<a href="http://www.houdunwang.com">后盾网</a>
   					</div>
   				</div>
				<!--尾部导航结束-->
				<!--icon开始-->
				<div class="iconBottom">
					<center>
         				<img src="http://localhost/handuyishe/Static/index/images/zxmbutton02_sy.jpg" alt="" height="38" border="0" width="114">
        				<a href="" target="_blank">
        					<img src="http://localhost/handuyishe/Static/index/images/zxmbutton05_sy.jpg" alt="" style="margin:5px 5px 0 5px;" height="38" border="0" width="103">
        					
        				</a>
						<a href="" target="_blank" style="display:inline-block;position:relative;width:102px;height:37px;">
       						<img src="http://localhost/handuyishe/Static/index/images/cnnic.png" alt="" height="37" border="0" width="102">
							
						</a>
        				<a style="display: inline-block;width: 74px;margin: 4px 3px;"> 
        					<img src="http://localhost/handuyishe/Static/index/images/cctv.png" alt="" height="40" border="0" width="74">
        					
        				</a>
        			</center>
				</div>
				<!--icon结束-->	
			</div>
		</div>
		<!--尾部结束-->

		<!--尾部结束-->
		<div class="backTop">
			返回顶部
		</div>
	</body>