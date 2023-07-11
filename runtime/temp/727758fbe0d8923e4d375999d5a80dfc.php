<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:60:"/Users/lambor/Desktop/code/app/app/home/view/index/cate.html";i:1680798561;s:61:"/Users/lambor/Desktop/code/app/app/home/view/common/mate.html";i:1680791436;s:61:"/Users/lambor/Desktop/code/app/app/home/view/common/head.html";i:1680791559;s:61:"/Users/lambor/Desktop/code/app/app/home/view/common/foot.html";i:1680791177;}*/ ?>
<!doctype html>
<html lang="zh-CN">

<head>
	<title><?php echo $title; ?></title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<link rel="shortcut icon" href="__HOME__/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="__HOME__/css/main-ui.min.css">
<link rel="stylesheet" href="__HOME__/css/main-ui.custom.min.css">
<link rel="stylesheet" href="__HOME__/css/app-style.css">
<script src="__HOME__/js/jquery.min.js"></script>
</head>

<body>
	<div class="navbar shadow-small" id="navbar">
    <a class="navbar-logo size-big" href="index.html">
        <img src="__HOME__/img/logo.png" height="40" class="margin-right-small">
        <strong>凤凰联盟</strong>
    </a>
    <div class="navbar-body" id="navbody">
        <ul class="nav text-center">
            <li><a href="index.html" class="active-sort">首页</a></li>

            <li><a href="<?php echo url('index/cate'); ?>?id=1" target="_blank">欧亿系列</a></li>

            <li><a href="<?php echo url('index/cate'); ?>?id=2" target="_blank">赢咖系列</a></li>

            <li><a href="<?php echo url('index/cate'); ?>?id=3" target="_blank">拉菲系列</a></li>

            <li><a href="<?php echo url('index/cate'); ?>?id=4" target="_blank">天系列</a></li>

            <li><a href="<?php echo url('index/contact'); ?>" target="_blan">联系我们</a></li>

            <li><a href="<?php echo url('index/jihua'); ?>" target="_blank">计划软件</a></li>

        </ul>
    </div>
    <span class="nav nav-switch size-mini" data-navswitch="#navbody"><i class="icon-nav"></i></span>
</div>

	<div class="container min-full">
		<h5 class="margin-top-large margin-bottom text-center"><?php echo $title; ?></h5>
		<div class="spline-little margin-bottom-small"></div>
		<div class="grid">

			<?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<div class="hover-bg big-x6 small-x6 padding-small padding-right-big">
				<div class="media effect-hover moble-app">
					<img src="__PUBLIC__<?php echo $vo['pic']; ?>" alt="<?php echo $vo['name']; ?>" class="icon scale">
					<div class="media-body margin-top-small">
						<strong><?php echo $vo['name']; ?></strong>
						<p class="margin-top">
							<span class="m-show"></span>
							<a href="<?php echo url('index/details'); ?>?id=<?php echo $vo['id']; ?>" target="_blank"
								class="button button-app radius-large">进入游戏</a>
						</p>
					</div>
				</div>
				<div class="spline-little-small"></div>
			</div>
			<?php endforeach; endif; else: echo "暂无数据" ;endif; ?>

		</div>
	</div>

	<div class="layout bg margin-top-big text-center padding-large">
		凤凰联盟-官方网站 &copy; 版权所有
	</div>
</body>
<script src="__HOME__/js/main-ui.min.js"></script>
<script src="__HOME__/js/app.js"></script>
<script>

</script>

</html>