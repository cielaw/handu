<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>后盾cms教学 - 后台管理中心</title>
    <script src="http://localhost/handuyishe/Static/admin/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(function(){
            //*********左侧导航效果*************
            $('.left_menu a').click(function(){
                //去掉所有
                $('.left_menu a').removeClass('action');
                //当前添加
                $(this).addClass('action');
            });

            $('.left_menu dt').toggle(function() {
                $(this).nextAll('dd').show(500);
            },function(){
                $(this).nextAll('dd').hide(500);
            });

        })
    </script>
    <link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Application/Admin/View/Index/Css/css.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/handuyishe/Application/Admin/View/Index/Css/quick_menu.css">
    <base target="iframe"/>
</head>
<body>
<div class="nav">
    <!--头部左侧导航-->
    <div class="top_menu">韩都衣舍</div>
    <!--头部左侧导航-->
    <!--头部右侧导航-->
    <div class="r_menu">
    	</span>
        <?php echo $hd['session']['aemail'];?>
        <span>|
         <a href="<?php echo U('Login/out');?>" target="_self">[退出]</a><span>|</span>
        <a href="<?php echo U('Index/Index/index');?>" target="_blank">前台首页</a>
    </div>
    <!--头部右侧导航-->
</div>
<!--左侧导航-->
<div class="main">
    <!--主体左侧导航-->
    <div class="left_menu">
        <div class="nid_0">
            <dl>
                <div>
                	<dt>商品</dt>
                    <dd>
                        <a href="<?php echo U('Goods/goods');?>">商品列表</a>
                        <a href="<?php echo U('Goods/add');?>">添加商品</a>
                    </dd>
                    <dt>商品类型</dt>
                    <dd>
                        <a href="<?php echo U('GoodsType/index');?>">类型列表</a>
                        <a href="<?php echo U('GoodsType/add');?>">添加类型</a>
                    </dd>
                    <dt>商品品牌</dt>
                    <dd>
                        <a href="<?php echo U('Brand/brand');?>">品牌列表</a>
                        <a href="<?php echo U('Brand/add');?>">添加品牌</a>
                    </dd>
                     <dt>商品分类</dt>
                    <dd>
                        <a href="<?php echo U('Category/index');?>">分类列表</a>
                        <a href="<?php echo U('Category/addTopCate');?>">添加分类</a>
                    </dd>
                    <dt>订单管理</dt>
                    <dd>
                        <a href="<?php echo U('OrderList/index');?>">订单列表</a>
                    </dd>
                </div>
             </dl>
        </div>
    </div>
    <!--主体左侧导航-->
    <!--内容显示区域-->

    <div class="top_content">
        <iframe src="<?php echo U('welcome');?>" scrolling="auto" frameborder="0" style="height:100%;width:100%;" name="iframe"></iframe>
    </div>
    <!--内容显示区域-->
</div>

</body>
</html>