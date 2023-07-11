<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:63:"/Users/lambor/Desktop/code/app/app/home/view/index/details.html";i:1680798601;s:61:"/Users/lambor/Desktop/code/app/app/home/view/common/mate.html";i:1680791436;s:61:"/Users/lambor/Desktop/code/app/app/home/view/common/head.html";i:1680791559;s:61:"/Users/lambor/Desktop/code/app/app/home/view/common/foot.html";i:1680791177;}*/ ?>
<!doctype html>
<html lang="zh-CN">

<head>
	<title><?php echo $product['name']; ?> - 赢咖系列 - 凤凰联盟-官方网站</title>
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

	<div class="container margin-top-large">
		<div class="grid margin-bottom-big">
			<div class="small-x9">
				<div class="media moble-app">
					<img src="__PUBLIC__<?php echo $product['pic']; ?>" alt="<?php echo $product['name']; ?>" class="icon"
						style="width: 120px;height:120px;">
					<div class="media-body margin-top-small" style="padding-left: 20px !important;">
						<strong style="font-size:16px;font-weight:bold;"><?php echo $product['name']; ?></strong>
						<p class="margin-top-small">
							<span style="display:block;font-size:14px;" class="line-large"></span>
							<span style="display:block;font-size:14px;" class="line-big"><i
									class="icon-clock-bg text-dot" style="margin-top:-1px;"></i> 已有<i
									class="text-dot padding-left-small padding-right-small"><?php echo $product['reg']; ?></i>万用户注册成功！</span>
							<span style="display:block;font-size:14px;color:#00d200"> <i class="icon-success-bg"
									style="margin-top:-1px;"></i> 安全链接加载成功！</span>
						</p>
					</div>
				</div>
			</div>
			<div class="small-x3 small-show">
				<div id="ring" class="ring" data-ring='<?php echo $product['data_ring']; ?>'></div>
				<div class="text-center" style="width:100px;">好评率</div>
			</div>
		</div>
		<div class="line-haoping margin-top small-hidden">
			<div>好评率：<?php echo $product['rate']; ?>%</div>
			<div class="progress progress-small">
				<span class="progress-bar" style="width:96%;"></span>
			</div>
		</div>
		<div class="margin-top-big link-panel bg radius-big padding-top-big">

			<div class="w9 link-item">
				<div class="input-icon" style="width:80%">
					<span><em class="icon-clock text-gray"></em></span>
					<div class="input input-small bg-white">
						<span class="text-success" id="ceshu0">--</span> <i class="icon-link margin-left"></i> <span
							class="text-info">注册地址一</span>
					</div>
				</div>
			</div>
			<div class="w3 link-btn"><a
					href="<?php echo $product['reg_link1']; ?>"
					class="button button-mini bg-info" target="_self">立即注册</a></div>
			<div class="clear w12"></div>
			<div class="w9 link-item">
				<div class="input-icon" style="width:80%">
					<span><em class="icon-clock text-gray"></em></span>
					<div class="input input-small bg-white">
						<span class="text-success" id="ceshu1">--</span> <i class="icon-link margin-left"></i> <span
							class="text-info">注册地址二</span>
					</div>
				</div>
			</div>
			<div class="w3 link-btn"><a
					href="<?php echo $product['reg_link2']; ?>"
					class="button button-mini bg-info" target="_self">立即注册</a></div>
			<div class="clear w12"></div>
			<div class="w9 link-item">
				<div class="input-icon" style="width:80%">
					<span><em class="icon-clock text-gray"></em></span>
					<div class="input input-small bg-white">
						<span class="text-success" id="ceshu2">--</span> <i class="icon-link margin-left"></i> <span
							class="text-info">注册地址三</span>
					</div>
				</div>
			</div>
			<div class="w3 link-btn"><a
					href="<?php echo $product['reg_link3']; ?>"
					class="button button-mini bg-info" target="_self">立即注册</a></div>
			<div class="clear w12"></div>

			<div class="w9 link-item">
				<div class="input-icon" style="width:80%">
					<span><em class="icon-clock text-gray"></em></span>
					<div class="input input-small bg-white">
						<span class="text-success" id="ceshu3">--</span> <i class="icon-link margin-left"></i> <span
							class="text-warning">登录地址一</span>
					</div>
				</div>
			</div>
			<div class="w3 link-btn"><a href="<?php echo $product['login_link1']; ?>" class="button button-mini bg-warning"
					target="_self">前往登录</a></div>
			<div class="clear w12"></div>
			<div class="w9 link-item">
				<div class="input-icon" style="width:80%">
					<span><em class="icon-clock text-gray"></em></span>
					<div class="input input-small bg-white">
						<span class="text-success" id="ceshu4">--</span> <i class="icon-link margin-left"></i> <span
							class="text-warning">登录地址二</span>
					</div>
				</div>
			</div>
			<div class="w3 link-btn"><a href="<?php echo $product['login_link2']; ?>" class="button button-mini bg-warning"
					target="_self">前往登录</a></div>
			<div class="clear w12"></div>
			<div class="w9 link-item">
				<div class="input-icon" style="width:80%">
					<span><em class="icon-clock text-gray"></em></span>
					<div class="input input-small bg-white">
						<span class="text-success" id="ceshu5">--</span> <i class="icon-link margin-left"></i> <span
							class="text-warning">登录地址三</span>
					</div>
				</div>
			</div>
			<div class="w3 link-btn"><a href="<?php echo $product['login_link3']; ?>" class="button button-mini bg-warning"
					target="_self">前往登录</a></div>
			<div class="clear w12"></div>

		</div>
		<div class="w12" style="height: 10px;float:left;"></div>
		<div class="quote border-info alert-info margin-top-big" style="clear:both;">
			温馨提示：主管已缴纳押金用作风险担保！有任何风险操作，我们会立即终止推广，并拉入黑名单，用主管已缴纳押金维护客户权益，请放心娱乐！ - 仅限本站注册会员！
		</div>
		<div class="spline-little"></div>
	</div>

	<div id="speed-test" style="display:none;"></div>

	<div class="container">
		<h5 class="margin-top-large margin-bottom-big">强烈推荐</h5>
		<div class="grid">
			<?php if(is_array($hot) || $hot instanceof \think\Collection || $hot instanceof \think\Paginator): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
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
			<?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
	</div>

	<div class="layout bg margin-top-big text-center padding-large">
		凤凰联盟-官方网站 &copy; 版权所有
	</div>
</body>
<script src="__HOME__/js/main-ui.min.js"></script>
<script src="__HOME__/js/app.js"></script>
<script>
	runSpeed();
</script>

</html>