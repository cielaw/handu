<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/index/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Static/index/css/list.css"/>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/commom.js"></script>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/list.js"></script>
		<script type="text/javascript" src="http://localhost/handuyishe/Static/index/js/backTop.js"></script>
		<style type="text/css">
			.backTop{
			width: 50px;
			height: 50px;
			background: #C80A28;
			cursor: pointer;
			color: white;
			line-height: 50px;
		})
		</style>
		<script type="text/javascript">
			$(function(){
				$('.backTop').backTop();	
			})
			
		</script>
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
		<!--列表内容开始-->
		<div id="listContent">
			<div class="listContent">
				<div class="cateLeft" >
					<div class="cateTree">
						<?php foreach ($leftBrand as $k=>$v){?>
						<dl>
							<dt class="hstyle">
								<a href="<?php echo U('index',array('bid'=>$v['bid']));?>" ><?php echo $v['bname'];?></a><i></i>
							</dt>
							<dd>
								
								<ul class="ulSecCate"     <?php if($v['bid']==$_GET['bid']){ ?>style="display:block;"<?php }else{ ?>style="display:none;"<?php } ?>>
									        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($v['bvalue'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($v['bvalue'] as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($v['bvalue'])-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									<li  >
										<a href="<?php echo U('index',array('cid'=>$d['cid'],'bid'=>$v['bid']));?>"     <?php if($_GET['cid'] == $d['cid']){ ?>style="color: #C8400A;"<?php } ?> ><?php echo $d['cname'];?></a>
									</li>
									<?php }}?>
								</ul>
							</dd>	
						</dl>
						<?php }?>
					</div>
					<div class="top10">
						<h3>人气热卖</h3>
						<?php foreach ($hotGoods as $k=>$v){?>
						<div class="topOne">
							<a href="<?php echo U('Details/index',array('gid'=>$v['gid']));?>"> 
								<img src="http://localhost/handuyishe/<?php echo $v['listpic'];?>"/>
							</a>
							<p>
								<span class="price" style="float: left;">￥<?php echo $v['shopprice'];?></span>
								<span class='num' style="float: right;">销量：<i><?php echo $v['pur_num'];?></i></span>
							</p>
							<h1><a href="<?php echo U('Details/index',array('gid'=>$v['gid']));?>"><?php echo hd_substr($v['gname'],10,'...');?></a></h1>
						</div>
						<?php }?>
					</div>
				</div>
				<div class="cateRight">
					<div class="handuListNav">
						您所在的位置 <code>&gt;</code>
						<a href="<?php echo U('List/index',array('bid'=>$bInfo['bid']));?>"><?php echo $bInfo['bname'];?>&gt;</a>
						<?php foreach ($cate as $k=>$v){?>
						<a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['cname'];?></a> <code>&gt;</code>
						<?php }?>
					</div>
					<!--筛选开始-->
					<div id="attr-box">
						<div class="attr">
							<ul>
								<?php foreach ($attr as $k=>$v){?>
								<li class="attr-border">
										<h2><?php echo $v['name'];?></h2>
										<ul class="attr-content">
											<?php
												$temp = $param;
												//为'不限'准备的
												$temp[$k] = 0;
											?>
											<li>
												<!--通过bid请求-->
												    <?php if( !isset($_GET['cid'])  && isset($_GET['bid'])){ ?>
													<!--有上架时间请求-->
													    <?php if(isset($_GET['shelvestime'])){ ?>
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'shelvestime'=>$_GET['shelvestime'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--价格参数请求-->
													<?php }else if(isset($_GET['price'])){ ?>
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'price'=>$_GET['price'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--销量参数请求-->
													<?php }else if(isset($_GET['num'])){ ?>
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'num'=>$_GET['num'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--默认请求-->
													<?php }else{ ?>		
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>
													<?php } ?>
													
												<?php } ?>
												<!--通过bid和cid结合请求-->
												    <?php if(isset($_GET['bid']) && isset($_GET['cid'])){ ?>
													<!--有上架时间请求-->
													    <?php if(isset($_GET['shelvestime'])){ ?>
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'shelvestime'=>$_GET['shelvestime'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--价格参数请求-->
													<?php }else if(isset($_GET['price'])){ ?>
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'price'=>$_GET['price'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--销量参数请求-->
													<?php }else if(isset($_GET['num'])){ ?>
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'num'=>$_GET['num'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--默认请求-->
													<?php }else{ ?>		
														<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>
													<?php } ?>
												<?php } ?>
												<!--通过cid结合请求-->
												    <?php if(isset($_GET['cid'])  && !isset($_GET['bid'])){ ?>
													<!--有上架时间请求-->
													    <?php if(isset($_GET['shelvestime'])){ ?>
														<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'shelvestime'=>$_GET['shelvestime'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--价格参数请求-->
													<?php }else if(isset($_GET['price'])){ ?>
														<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'price'=>$_GET['price'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--销量参数请求-->
													<?php }else if(isset($_GET['num'])){ ?>
														<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'num'=>$_GET['num'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>		
													<!--默认请求-->
													<?php }else{ ?>		
														<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)));?>"     <?php if($param[$k]==0){ ?>class='hover'<?php } ?>>不限</a>
													<?php } ?>
												<?php } ?>
												
											</li>
											<?php foreach ($v['value'] as $key=>$value){?>
												<?php
													$temp[$k] =$value['gaid']
												?>
												<li>
													    <?php if(isset($_GET['bid']) && isset($_GET['cid'])){ ?>
														    <?php if(isset($_GET['shelvestime'])){ ?>
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'bid'=>$_GET['bid'],'shelvestime'=>$_GET['shelvestime'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else if(isset($_GET['price'])){ ?>
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'bid'=>$_GET['bid'],'price'=>$_GET['price'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else if(isset($_GET['num'])){ ?>	
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'bid'=>$_GET['bid'],'num'=>$_GET['num'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else{ ?>
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'bid'=>$_GET['bid'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php } ?>
														
													<?php }else if(isset($_GET['bid']) && empty($_GET['cid'])){ ?>	
														    <?php if(isset($_GET['shelvestime'])){ ?>
															<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'shelvestime'=>$_GET['shelvestime'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else if(isset($_GET['price'])){ ?>
															<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'price'=>$_GET['price'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else if(isset($_GET['num'])){ ?>	
															<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'num'=>$_GET['num'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else{ ?>
															<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php } ?>
													 	
													<?php }else{ ?>
														    <?php if(isset($_GET['shelvestime'])){ ?>
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'shelvestime'=>$_GET['shelvestime'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else if(isset($_GET['price'])){ ?>
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'price'=>$_GET['price'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else if(isset($_GET['num'])){ ?>	
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'num'=>$_GET['num'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php }else{ ?>
															<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)));?>"      <?php if($param[$k]==$value['gaid']){ ?>class='hover'<?php } ?>><?php echo $value['gavalue'];?></a>
														<?php } ?>
													<?php } ?>
													
												</li>
											<?php }?>
										</ul>
									</li>
								<?php }?>
								
							</ul>
							<div class="more">
								更多选项(商品特性)	
							</div>
						</div>
					</div>
					<script type="text/javascript">
						$(function(){
							('.attr-content>li:gt(5)').hide();
						})
					</script>
					<!--筛选结束-->
					<div class="sortBar">
						<div class="sortBarLeft"  style="float: left;">
							<ul >
								<!--默认排序-->
								<li>
									<!--通过cid访问-->
									    <?php if( !isset($_GET['cid'])  && isset($_GET['bid'])){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid']));?>" >默认排序</a>
												<?php } ?>
									<!--通过bid和cid访问-->
									    <?php if(isset($_GET['bid']) && isset($_GET['cid'])){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'bid'=>$_GET['bid']));?>" >默认排序</a>
	                                                                                                                                                                                                                  											<?php } ?>
									<!--通过cid请求-->
									    <?php if(isset($_GET['cid'])  && !isset($_GET['bid'])){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid']));?>" >默认排序</a>
												<?php } ?>
									
								</li>
								<!--上架时间-->
								<li>
									<!--通过bid进入列表页-->
									    <?php if(!isset($_GET['cid'])  && isset($_GET['bid'])){ ?>
													<!--如果没有上架时间get参数的情况-->
													    <?php if(!isset($_GET['shelvestime'])){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'shelvestime'=>1));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													<!--如果有上架时间和get参数且为零的情况-->
													    <?php if(isset($_GET['shelvestime']) && $_GET['shelvestime']==0){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'shelvestime'=>1));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													<!--上架时间的get参数为1的情况-->
													    <?php if($_GET['shelvestime']==1){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'shelvestime'=>0));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
												    <?php if(isset($_GET['bid']) && isset($_GET['cid'])){ ?>
													    <?php if(!isset($_GET['shelvestime'])){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'shelvestime'=>1));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['shelvestime']) && $_GET['shelvestime']==0){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'shelvestime'=>1));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['shelvestime']==1){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'shelvestime'=>0));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
												    <?php if(isset($_GET['cid'])  && !isset($_GET['bid'])){ ?>
													    <?php if(!isset($_GET['shelvestime'])){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'shelvestime'=>1));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['shelvestime']) && $_GET['shelvestime']==0){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'shelvestime'=>1));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['shelvestime']==1){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'shelvestime'=>0));?>" >上架时间</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
									
								</li>
								<li>
									<!--通过cid和bid进入列表页-->
									    <?php if(empty($_GET['cid'])  && isset($_GET['bid'])){ ?>
													    <?php if(!isset($_GET['price'])){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'price'=>1));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['price']) && $_GET['price']==0){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'price'=>1));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['price']==1){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'price'=>0));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
												    <?php if(isset($_GET['bid']) && isset($_GET['cid'])){ ?>
													    <?php if(!isset($_GET['price'])){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'price'=>1));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['price']) && $_GET['price']==0){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'price'=>1));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['price']==1){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'price'=>0));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
												    <?php if(isset($_GET['cid'])  && !isset($_GET['bid'])){ ?>
													    <?php if(!isset($_GET['price'])){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'price'=>1));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['price']) && $_GET['price']==0){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'price'=>1));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['price']==1){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'price'=>0));?>" >价格</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
									
								</li>
								<li>
									<!--通过bid进入列表页-->
									    <?php if(empty($_GET['cid'])  && isset($_GET['bid'])){ ?>
													    <?php if(!isset($_GET['num'])){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'num'=>1));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['num']) && $_GET['num']==0){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'num'=>1));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['num']==1){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'num'=>0));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
												    <?php if(isset($_GET['bid']) && isset($_GET['cid'])){ ?>
													    <?php if(!isset($_GET['num'])){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'num'=>1));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['num']) && $_GET['num']==0){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'num'=>1));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['num']==1){ ?>
													<a href="<?php echo U('List/index',array('bid'=>$_GET['bid'],'cid'=>$_GET['cid'],'num'=>0));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
												    <?php if(isset($_GET['cid'])  && !isset($_GET['bid'])){ ?>
													    <?php if(!isset($_GET['num'])){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'num'=>1));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -1px -1px;"></span>
													<?php } ?>
													    <?php if(isset($_GET['num']) && $_GET['num']==0){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'num'=>1));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -9px -1px;"></span>
													<?php } ?>
													    <?php if($_GET['num']==1){ ?>
													<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'num'=>0));?>" >销量</a>
													<span style="background: url(http://localhost/handuyishe/Static/index/images/arrs.png) no-repeat -25px -1px;"></span>
													<?php } ?>
												<?php } ?>
												
								</li>
								
							</ul>
						</div>
						<div class="productPage" style="float: right;margin-right: 5px;margin-top: 10px;">
								<?php echo $page2;?>
						</div>
					</div>
					
					<div class="productGrid" style="border: 1px solid #AAAAAA;padding: 10px;">
						<div class="productGridin">
							<ul>
								    <?php if(!empty($goods)){ ?>
								<?php foreach ($goods as $k=>$v){?>
								<li class="">
									<div class="">
										<a href="<?php echo U('details/index',array('gid'=>$v['gid']));?>"><img src="http://localhost/handuyishe/<?php echo $v['indexpic'];?>"/></a>
									
									<h3 class="productTitle">
										<a href="<?php echo U('details/index',array('gid'=>$v['gid']));?>"><?php echo $v['gname'];?></a>
									</h3>
									<p class="price">
										<span class="newPrice">¥<?php echo $v['shopprice'];?></span>
										<span class="oldPrice">¥<?php echo $v['marketprice'];?></span>
									</p>
									</div>
									
								</li>
								<?php }?>
								<?php }else{ ?>
								<p style="font-weight:700;font-size: 20px;text-align: center;margin-top: 20px;">没有商品</p>
								<?php } ?>
							</ul>
							
						</div>
						<h3 style="text-align: center;clear: both;padding-top: 60px;"><?php echo $page;?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="backTop">
			返回顶部
		</div>
		<!--列表内容结束-->
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
		<script type="text/javascript">
			var requestUrii = "<?php echo U('Index/ajaxGetCart');?>";
		</script>
	</body>
