<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/handuyishe/Static/index/css/common.css"/>
		<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/index/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			var requestUrii = "<?php echo U('ajaxGetCart');?>";
		</script>
		<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/index/js/handu.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/index/js/backTop.js"></script>
		<script type="text/javascript" src="http://127.0.0.1/handuyishe/Static/index/js/animate.js"></script>
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
	</head>
	<body>
		
		<!--顶部导航开始-->
		<div id="global_nav">
			<div class="global_nav">
				<div class="global_info_left">
					<ul>
						<li><a href="" class="returnIndex">返回首页</a></li>
						<!--<li><a href="">收藏本站</a></li>-->
					</ul>
				</div>
				<div class="global_info_right">
					<ul class="reloZome">
						    <?php if(isset($_SESSION['email']) && isset($_SESSION['uid'])){ ?>
							<li><a href="">您好<?php echo $hd['session']['email'];?>！</a></li>
							<li><a href="<?php echo U('Login/out');?>">退出</a></li>
						<?php }else{ ?>
							<li><a href="">您好，欢迎光临韩都衣舍！</a></li>
							<li><a href="<?php echo U('Login/login');?>">登录 </a></li>
							<li><a href="<?php echo U('Register/register');?>" class="info_red">注册</a></li>
						<?php } ?>
						<li><a href="<?php echo U('Cart/cart');?>">购物车</a></li>
						<li><a href="<?php echo U('Member/index');?>">个人中心</a></li>
						<li><a href=""></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--顶部导航右边结束-->
		<!--头部开始-->
		<div id="header">
			<div class="headerTop">
				<div class="headerLogo">
					<a href="http://127.0.0.1/handuyishe"></a>
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
							<li><a href="<?php echo U('List/index',array('bid'=>$v['bid']));?>" class="bandLogo"><img src="http://127.0.0.1/handuyishe/<?php echo $v['logo'];?>"/></a>$k</li>
							
						<?php }?>
					</ul>
				</div>
			</div>	
		</div>
		<!--头部结束-->
		<!--导航开始-->
		<div class="handu_nav">
  <div class="handu_menu ">
    <div class="all show_cate">
      <a class="all_text" href="" target="_blank">全部商品分类<b></b></a>
      <div class="categoryBd" style="display: block;">
        <ul>
        	        <?php
        //初始化
        $hd['list']['v'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($secondView)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($secondView as $v) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=7)break;
                //第几个值
                $hd['list'][v]['index']++;
                //第1个值
                $hd['list'][v]['first']=($listId == 0);
                //最后一个值
                $hd['list'][v]['last']= (count($secondView)-1 <= $listId);
                //总数
                $hd['list'][v]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
        	    <?php if($hd['list']['v']['first']){ ?><li class="item item1" ><h3 class="itemHd itemHd1"><?php } ?>
        	    <?php if($hd['list']['v']['index']==2){ ?><li class="item item2" ><h3 class="itemHd itemHd2"><?php } ?>
        	    <?php if($hd['list']['v']['index']==3){ ?><li class="item item3 spe_item" ><h3 class="itemHd itemHd3"><?php } ?>
        	    <?php if($hd['list']['v']['index']==4){ ?><li class="item item4 spe_item" ><h3 class="itemHd itemHd4"><?php } ?>
        	    <?php if($hd['list']['v']['index']==5){ ?><li class="item item5 spe_item" ><h3 class="itemHd itemHd5"><?php } ?>
        	    <?php if($hd['list']['v']['index']==6){ ?><li class="item item6 spe_item" ><h3 class="itemHd itemHd6"><?php } ?>
        	    <?php if($hd['list']['v']['index']==7){ ?><li class="item item7 spe_item" ><h3 class="itemHd itemHd7 "><?php } ?>
            
              		<i></i><?php echo $v['cateTopName'];?>                            
              		<span class="itemIcon"></span>
            	</h3>
            	
                <p class="itemCol itemCol_sp"> 
                			        <?php
        //初始化
        $hd['list']['s'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($v['second'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($v['second'] as $s) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=4)break;
                //第几个值
                $hd['list'][s]['index']++;
                //第1个值
                $hd['list'][s]['first']=($listId == 0);
                //最后一个值
                $hd['list'][s]['last']= (count($v['second'])-1 <= $listId);
                //总数
                $hd['list'][s]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                    		<a href="<?php echo U('List/index',array('cid'=>$s['cid']));?>" target="_blank"  font-weight: bold;"><?php echo $s['cname'];?></a>
                    		<?php }}?>
                    	
              	</p>
              	    <?php if($hd['list']['v']['first'] || $hd['list']['v']['index']==2){ ?>
              	<p class="itemCol itemCol_sp" style="height: 16px;">                
                   	        <?php
        //初始化
        $hd['list']['s'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($v['second'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=4;
            foreach ($v['second'] as $s) {
                //开始值
                if ($listId<4) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=4)break;
                //第几个值
                $hd['list'][s]['index']++;
                //第1个值
                $hd['list'][s]['first']=($listId == 4);
                //最后一个值
                $hd['list'][s]['last']= (count($v['second'])-1 <= $listId);
                //总数
                $hd['list'][s]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                    		<a href="<?php echo U('List/index',array('cid'=>$s['cid']));?>" target="_blank" style="color: rgb(200, 10, 40); font-weight: bold;"><?php echo $s['cname'];?></a>
                    <?php }}?>
                    
              	</p>
              	<?php } ?>
              	    <?php if($hd['list']['v']['first'] || $hd['list']['v']['index']==2 ){ ?>
                <div class="subCategory sub1" >
                    <div class="subView">
                  		<h3 class="subItem_hd" style="margin-left: 20px;">
                  			<a href="" target="_blank"><?php echo $v['cateTopName'];?></a>
                		</h3>
                		<p class="subItem_cat" style="margin-left: 20px;">
                		   <?php foreach ($v['second'] as $k=>$v){?>
		                   <a href="<?php echo U("List/index",array('cid'=>$v['cid']));?>" target="_blank"><?php echo $v['cname'];?></a>
		                 	<?php }?>
                		</p>   
                	</div>
	                <div class="sub_logo">
	                    <h3> 韩都集团 旗下品牌: </h3>
				  			<?php foreach ($brand as $key=>$value){?>
				  			<a href="<?php echo U('brand/index',array('bid'=>$value['bid']));?>" class="bandLogo"><img src="http://127.0.0.1/handuyishe/<?php echo $value['logo'];?>"/></a>
				  			<?php }?>
				  	</div>
         		</div>
         		<?php }else{ ?>
         		<div class="subCategory" >
                 	<div class="sub_item">
               			<h3 class="subItem_hd">
                  			<a href="" target="_blank"><?php echo $v['cateTopName'];?></a>
                		</h3>
                		<p class="subItem_cat">
                		   <?php foreach ($v['second'] as $k=>$v){?>
		                   <a href="<?php echo U("List/index",array('cid'=>$v['cid']));?>" target="_blank"><?php echo $v['cname'];?></a>
		                 	<?php }?>
                		</p>    
              		</div>
	              	<div class="sub_logo">
	                    <h3> 韩都集团 旗下品牌: </h3>
	                    	<?php foreach ($brand as $key=>$value){?>
				  			<a href="<?php echo U('brand/index',array('bid'=>$value['bid']));?>" class="bandLogo"><img src="http://127.0.0.1/handuyishe/<?php echo $value['logo'];?>"/></a>
				  			<?php }?>
							
				  	</div>
          		</div>
         		<?php } ?>
       	 	</li>
       	 	<?php }}?>
       </ul>
   
      </div> 
      
   
       
    </div>
    <ul class="handu_menu_o ">
        <li class="menu_item"><a target="_blank" href="http://127.0.0.1/handuyishe">首页</a></li>
        <?php foreach ($topCate as $k=>$v){?>
        <li class="menu_item">
        	<a target="_blank" href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['cname'];?></a>
        </li>
        <?php }?>
    </ul>
</div>
		<!--导航结束-->
		<!--轮播开始-->
		<div id="Carousel " class="zhuping_center" style="width: 100%;">
			<div class="Carousel zhuping_lb" style="width: 100%;">
				
				<a href="<?php echo U('Details/index',array('gid'=>198));?>" style="display: block;">
						<div style="height:450px;width:100%;background:url(http://127.0.0.1/handuyishe/Static/index/images/lunbo/lunbo1.jpg) no-repeat center 0px;"></div>
				</a>
				<a href="<?php echo U('Details/index',array('gid'=>199));?>">
						<div style="height:450px;width:100%;background:url(http://127.0.0.1/handuyishe/Static/index/images/lunbo/lunbo2.jpg) no-repeat center 0px;"></div>
				</a>
				<a href="<?php echo U('Details/index',array('gid'=>200));?>">
						<div style="height:450px;width:100%;background:url(http://127.0.0.1/handuyishe/Static/index/images/lunbo/lunbo3.jpg) no-repeat center 0px;float:left;"></div>
				</a>
				<a href="<?php echo U('Details/index',array('gid'=>201));?>">
						<div style="height:450px;width:100%;background:url(http://127.0.0.1/handuyishe/Static/index/images/lunbo/lunbo4.jpg) no-repeat center 0px;float:left;"></div>
				</a>
				<a href="<?php echo U('Details/index',array('gid'=>202));?>">
						<div style="height:450px;width:100%;background:url(http://127.0.0.1/handuyishe/Static/index/images/lunbo/lunbo5.jpg) no-repeat center 0px;float:left;"></div>
				</a>
			</div>
			<!-- 数字图标 -->
	        <ul class="lunbo_list">
	        	<li style="background:#B61B1F">1</li>
	        	<li>2</li>
	        	<li>3</li>
	        	<li>4</li>
	        	<li>5</li>
	        </ul>
	        <!-- 左右点击键 -->
	        <a class="left" href="javascript:;">&lt;</a>
	        <a class="right" href="javascript:;">&gt;</a>
		</div>
		<!--轮播结束-->
		<!--产品展示开始-->
		<div id="productsAll">
			<div class="productsAllIn">
				
				<!--新品上市开始-->
				<div id="new_arrival" class="new_arrival" style="position: relative;">
					<h1>
						<ul class="newArrival newTitle" style="">
							<li style="background:#B61B1F;color:white; ">韩风女装</li>
							<li>韩风男装</li>
							<li>韩风名媛</li>
						</ul>
					</h1>
					        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($newShelves)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($newShelves as $n) {
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
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($newShelves)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<ul class="newContent newGoods"     <?php if($hd['list']['n']['first']){ ?>style="display: block;"<?php }else{ ?>style="display: none;"<?php } ?>>
						        <?php
        //初始化
        $hd['list']['k'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($n)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($n as $k) {
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
                $hd['list'][k]['index']++;
                //第1个值
                $hd['list'][k]['first']=($listId == 0);
                //最后一个值
                $hd['list'][k]['last']= (count($n)-1 <= $listId);
                //总数
                $hd['list'][k]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
						<li>
							<a href="<?php echo U('Details/index',array('gid'=>$k['gid']));?>">
								<img src="http://127.0.0.1/handuyishe/<?php echo $k['listpic'];?>" alt="" />
								<span></span>
							</a>
							<h3><a href="<?php echo U('Details/index',array('gid'=>$k['gid']));?>"><?php echo hd_substr($k['gname'],15,'');?></a></h3>
							<em>￥<?php echo $k['shopprice'];?></em>
							<span class="originaPice">￥<?php echo $k['marketprice'];?></span>
						</li>
						<?php }}?>
					</ul>
					<?php }}?>
				</div>
				<!--新品上市结束-->
				<!--Hstyle开始-->
				        <?php
        //初始化
        $hd['list']['g'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($goodsBrand)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($goodsBrand as $g) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=1)break;
                //第几个值
                $hd['list'][g]['index']++;
                //第1个值
                $hd['list'][g]['first']=($listId == 0);
                //最后一个值
                $hd['list'][g]['last']= (count($goodsBrand)-1 <= $listId);
                //总数
                $hd['list'][g]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<div id="hstyle">
					<h1>
						<div class="hstyleNav">
							        <?php
        //初始化
        $hd['list']['c'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($g['cate'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($g['cate'] as $c) {
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
                $hd['list'][c]['index']++;
                //第1个值
                $hd['list'][c]['first']=($listId == 0);
                //最后一个值
                $hd['list'][c]['last']= (count($g['cate'])-1 <= $listId);
                //总数
                $hd['list'][c]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
							<a href="<?php echo U('list/index',array('cid'=>$c['cid'],'bid'=>$c['bid']));?>"><?php echo $c['cname'];?></a>
							<?php }}?>
							<a href="">更多></a>
						</div>
					</h1>
					<div class="hstyleMain">
						<div class="hstyleNavBar">
							<div class="hNavTop">
								<a href="<?php echo U('list/index',array('bid'=>19));?>" class="navImg">
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/hstyle/brand.jpg" alt="" />
									<h3><span></span></h3>
								</a>
							</div>
							<div class="hNavBottom">
								<a href="">
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/hstyle/piaoxinhui.jpg" width="190"/>
								</a>
							</div>
						</div>
						<div class="hstyleRight">
							<div class="hstyleImg">
								<a href="<?php echo U('details/index',array('gid'=>203));?>">
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/hstyle/big.jpg" class="bigImg" alt="" />
								</a>
								<a href="<?php echo U('details/index',array('gid'=>204));?>">
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/hstyle/mid.jpg" class="imgTop" />
								</a>
								<a href="<?php echo U('details/index',array('gid'=>205));?>">
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/hstyle/small.jpg" alt="" />
								</a>
							</div>
							<div class="hstyleRank">
								<h2>热销排行榜</h2>
								<ul>
									        <?php
        //初始化
        $hd['list']['r'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($g['goodHstyleRank'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($g['goodHstyleRank'] as $r) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=8)break;
                //第几个值
                $hd['list'][r]['index']++;
                //第1个值
                $hd['list'][r]['first']=($listId == 0);
                //最后一个值
                $hd['list'][r]['last']= (count($g['goodHstyleRank'])-1 <= $listId);
                //总数
                $hd['list'][r]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									<li class="rankhs">
										<h3 class="rankTitle"     <?php if($hd['list']['r']['first']){ ?>style="display: none;"<?php } ?> >								<span 
											    <?php if($hd['list']['r']['first']){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/01.png) no-repeat 0 0;" <?php } ?>
											
											    <?php if($hd['list']['r']['index']==2){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/02.png) no-repeat 0 0;" <?php } ?>
											    <?php if($hd['list']['r']['index']==3){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/03.png) no-repeat 0 0;" <?php } ?>
											    <?php if($hd['list']['r']['index']==4){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/04.png) no-repeat 0 0;" <?php } ?>
											    <?php if($hd['list']['r']['index']==5){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/05.png) no-repeat 0 0;" <?php } ?>
											    <?php if($hd['list']['r']['index']==6){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/06.png) no-repeat 0 0;" <?php } ?>
											    <?php if($hd['list']['r']['index']==7){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/07.png) no-repeat 0 0;" <?php } ?>
											    <?php if($hd['list']['r']['index']==8){ ?>style="background: url(http://127.0.0.1/handuyishe/Static/index/images/08.png) no-repeat 0 0;" <?php } ?>
											>
										</span>
											<?php echo hd_substr($r['gname'],10,'...');?>
										</h3>
										<div class="rankA"     <?php if($hd['list']['r']['index']!=1){ ?>style="display: none;"<?php } ?>     <?php if($hd['list']['r']['first']){ ?>style="display: block;"<?php } ?>>
											<a href="<?php echo U("Details/index",array('gid'=>$r['gid']));?>"><img src="http://127.0.0.1/handuyishe/<?php echo $r['listpic'];?>" alt="" width="80" height="114"/></a>
											<h3><a href="<?php echo U("Details/index",array('gid'=>$r['gid']));?>"><?php echo hd_substr($r['gname'],10,'...');?></a></h3>
											<br />
											<p><span>￥<?php echo $r['marketprice'];?></span></p>
											<br />
											<p><span>￥<?php echo $r['shopprice'];?></span></p>
											<br />
											<!--<p>已售出<em>333</em>笔</p>-->
										</div>
									</li>
									<?php }}?>
								</ul>
							</div>
						</div>
					</div>
					<ul class="newContent">
								        <?php
        //初始化
        $hd['list']['gs'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($g['goods'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($g['goods'] as $gs) {
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
                $hd['list'][gs]['index']++;
                //第1个值
                $hd['list'][gs]['first']=($listId == 0);
                //最后一个值
                $hd['list'][gs]['last']= (count($g['goods'])-1 <= $listId);
                //总数
                $hd['list'][gs]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
								<li>
									<a href="<?php echo U("Details/index",array('gid'=>$gs['gid']));?>">
										<img src="http://127.0.0.1/handuyishe/<?php echo $gs['listpic'];?>" alt="" />
										<span></span>
									</a>
									<h3><a href="<?php echo U("Details/index",array('gid'=>$gs['gid']));?>"><?php echo hd_substr($gs['gname'],10,'...');?></a></h3>
									<em>￥<?php echo $gs['marketprice'];?></em>
									<span class="originaPice">￥<?php echo $gs['shopprice'];?></span>
								</li>
								<?php }}?>
					</ul>
					<ul class="newContent">
								        <?php
        //初始化
        $hd['list']['gs'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($g['goods'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=5;
            foreach ($g['goods'] as $gs) {
                //开始值
                if ($listId<5) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=5)break;
                //第几个值
                $hd['list'][gs]['index']++;
                //第1个值
                $hd['list'][gs]['first']=($listId == 5);
                //最后一个值
                $hd['list'][gs]['last']= (count($g['goods'])-1 <= $listId);
                //总数
                $hd['list'][gs]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
								<li>
									<a href="<?php echo U("Details/index",array('gid'=>$gs['gid']));?>">
										<img src="http://127.0.0.1/handuyishe/<?php echo $gs['listpic'];?>" alt="" />
										<span></span>
									</a>
									<h3><a href="<?php echo U("Details/index",array('gid'=>$gs['gid']));?>"><?php echo hd_substr($gs['gname'],10,'...');?></a></h3>
									<em>￥<?php echo $gs['marketprice'];?></em>
									<span class="originaPice">￥<?php echo $gs['shopprice'];?></span>
								</li>
								<?php }}?>
							</ul>
				</div>
				<?php }}?>
				<!--Hstyle结束-->
				<!--AMH开始-->
				        <?php
        //初始化
        $hd['list']['g'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($goodsBrand)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=1;
            foreach ($goodsBrand as $g) {
                //开始值
                if ($listId<1) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][g]['index']++;
                //第1个值
                $hd['list'][g]['first']=($listId == 1);
                //最后一个值
                $hd['list'][g]['last']= (count($goodsBrand)-1 <= $listId);
                //总数
                $hd['list'][g]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<div class="amh" >
					
					<h1     <?php if($hd['list']['g']['first']){ ?>style=" background: url(http://127.0.0.1/handuyishe/Static/index/images/web_index.png) no-repeat 0px -109px; ;"<?php } ?>     <?php if($hd['list']['g']['index'] == 2){ ?>style=" background: url(http://127.0.0.1/handuyishe/Static/index/images/web_index.png) no-repeat 0px -140px;"<?php } ?>>
						<div class="amhNav">
							        <?php
        //初始化
        $hd['list']['c'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($g['cate'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($g['cate'] as $c) {
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
                $hd['list'][c]['index']++;
                //第1个值
                $hd['list'][c]['first']=($listId == 0);
                //最后一个值
                $hd['list'][c]['last']= (count($g['cate'])-1 <= $listId);
                //总数
                $hd['list'][c]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
							<a href="<?php echo U('List/index',array('bid'=>$c['bid'],'cid'=>$c['cid']));?>"><?php echo $c['cname'];?></a>
							<?php }}?>
							<a href="">更多></a>
						</div>
					</h1>
					<div class="amhMain">
						<div class="amhNavBar">
							<div class="hNavTop">
								    <?php if($hd['list']['g']['first']){ ?>
									<a href="<?php echo U('list/index',array('bid'=>23));?>" class="navImg">
										<img src="http://127.0.0.1/handuyishe/Static/index/images/special/AMH/brand.jpg" alt="" />
										<h3><span></span></h3>
									</a>
								<?php } ?>
								    <?php if($hd['list']['g']['index'] ==2){ ?>
									<a href="<?php echo U('list/index',array('bid'=>20));?>" class="navImg">
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/soneed/brand.jpg" alt="" />
									<h3><span></span></h3>
								</a>
								<?php } ?>
							</div>
							<div class="hNavBottom">
								    <?php if($hd['list']['g']['first']){ ?>
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/AMH/amh.jpg" width="190"/>
								<?php } ?>
								    <?php if($hd['list']['g']['index'] ==2){ ?>
								<img src="http://127.0.0.1/handuyishe/Static/index/images/special/soneed/soneed.jpg" width="190"/>
								<?php } ?>
							</div>
							
						</div>
						<div class="amhRight">
							<div class="amhImg">
								    <?php if($hd['list']['g']['first']){ ?>
								<a href="<?php echo U('details/index',array('gid'=>203));?>">
									
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/AMH/large.jpg" class="bigImg" alt="" />
									
								</a>
								<?php } ?>
								    <?php if($hd['list']['g']['index'] ==2){ ?>
								<a href="<?php echo U('details/index',array('gid'=>207));?>">
									
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/soneed/large.jpg" class="bigImg" alt="" />
									
								</a>
								<?php } ?>
								
							</div>
							<div class="amhFashion">
								    <?php if($hd['list']['g']['first']){ ?>
								<a href="<?php echo U('details/index',array('gid'=>204));?>">
									
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/AMH/mid.jpg" alt="" />
									
								</a>
								<?php } ?>
								    <?php if($hd['list']['g']['index'] ==2){ ?>
								<a href="<?php echo U('details/index',array('gid'=>208));?>">
									
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/soneed/mid.jpg" alt="" />
									
								</a>
								<?php } ?>
								    <?php if($hd['list']['g']['first']){ ?>
								<a href="<?php echo U('details/index',array('gid'=>206));?>">
									
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/AMH/small.jpg" alt="" />
									
								</a>
								<?php } ?>
								    <?php if($hd['list']['g']['index'] ==2){ ?>
								<a href="<?php echo U('details/index',array('gid'=>209));?>">
									
									<img src="http://127.0.0.1/handuyishe/Static/index/images/special/soneed/small.jpg" alt="" />
									
								</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<ul class="newContent">
						        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($g['goods'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($g['goods'] as $d) {
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
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($g['goods'])-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
						<li>
							<a href="<?php echo U('details/index',array('gid'=>$d['gid']));?>">
								<img src="http://127.0.0.1/handuyishe/<?php echo $d['listpic'];?>" alt="" />
								<span></span>
							</a>
							<h3><a href="<?php echo U('details/index',array('gid'=>$d['gid']));?>"><?php echo hd_substr($d['gname'],15,'...');?></a></h3>
							<em>￥<?php echo $d['shopprice'];?></em>
							<span class="originaPice">￥<?php echo $d['marketprice'];?></span>
						</li>		
						<?php }}?>		
					</ul>
				</div>
				<?php }}?>
				<!--AMH结束-->
			</div>
		</div>
		<div class="backTop">
			返回顶部
		</div>
		<!--产品展示结束-->
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
         				<img src="http://127.0.0.1/handuyishe/Static/index/images/zxmbutton02_sy.jpg" alt="" height="38" border="0" width="114">
        				<a href="" target="_blank">
        					<img src="http://127.0.0.1/handuyishe/Static/index/images/zxmbutton05_sy.jpg" alt="" style="margin:5px 5px 0 5px;" height="38" border="0" width="103">
        					
        				</a>
						<a href="" target="_blank" style="display:inline-block;position:relative;width:102px;height:37px;">
       						<img src="http://127.0.0.1/handuyishe/Static/index/images/cnnic.png" alt="" height="37" border="0" width="102">
							
						</a>
        				<a style="display: inline-block;width: 74px;margin: 4px 3px;"> 
        					<img src="http://127.0.0.1/handuyishe/Static/index/images/cctv.png" alt="" height="40" border="0" width="74">
        					
        				</a>
        			</center>
				</div>
				<!--icon结束-->	
			</div>
		</div>
		<!--尾部结束-->

		<!--尾部结束-->
	</body>
	<script type="text/javascript">
		$(function(){
		var q = 0;
		function runssp(){
	       q++;
	       // 判断
	       if(q==3){
	       	  q=0;
	       }
	       // 新品标题变化
	       $('.newGoods').eq(q).fadeIn().siblings('ul').fadeOut();
	       // 新品内容变化
	        $('.newArrival li').eq(q).css({background:'#B61B1F',color:'white'}).stop().siblings('li').css({background:'white',color:'black'});
		}
			// 启动定时器
			 timenew = setInterval(runssp,3000);
		
		    $('#new_arrival').hover(function(){
		         // 停止定时器
		         clearInterval(timenew);
		    },function(){
		    	 // 启动定时器
		         timenew = setInterval(runssp,3000);
		    });
    		$('.newArrival>li').mouseover(function(){
    			 $(this).css({background:'#B61B1F',color:'white'}).siblings('li').css({background:'white',color:'black'});
		         $(this).parents('.new_arrival').find('.newContent').eq($(this).index()).fadeIn('500').siblings('ul').fadeOut('500');
		    })
    		$('.backTop').backTop();
    		//hsyle
			var imgs = $.makeArray($("#hstyle img"));
			
			$(".amh").mouseout(function  () {
				  for (var i=0; i<imgs.length; i++){
		  // 需要使用自定义的animate函数，不能使用jquery自带的animate函数
			animate(imgs[i],{left:0,opacity:1},100);
		 }
	});

	for (var i=0; i<imgs.length; i++) {
		  
		  imgs[i].onmouseover=function  () {
			 
			 for (var j=0; j<imgs.length; j++) {
			 animate(imgs[j],{left:0,opacity:0.7},100);
			  
			 }
             animate(this,{left:-3,opacity:1},100);
			
		  }
	
	}
		});	
		$(function(){
			//hsyle
			var imgs = $.makeArray($("#new_arrival img"));
			
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
		})
		
	</script>
</html>
