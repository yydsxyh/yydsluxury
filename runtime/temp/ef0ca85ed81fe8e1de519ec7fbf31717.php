<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"/www/wwwroot/ishop/home/admin/app/admin/view/order/form.html";i:1619349101;s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/common/head.html";i:1517565830;s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/common/foot.html";i:1517565830;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo config('sys_name'); ?>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__STATIC__/common/css/font.css" media="all">
</head>
<body class="skin-<?php if(!empty($_COOKIE['skin'])){echo $_COOKIE['skin'];}else{echo '0';setcookie('skin','0');}?>">
<div class="admin-main layui-anim layui-anim-upbit" ng-app="hd" ng-controller="ctrl">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>订单详情</legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
        <blockquote class="layui-elem-quote" style="background-color:white">基本信息</blockquote>
        <div class="layui-form-item">
            <label class="layui-form-label">订单号</label>
            <div class="layui-input-4">
                <input type="text" name="sn" ng-model="field.sn" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>订单号" class="layui-input" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">订单金额</label>
            <div class="layui-input-4">
                <input type="text" name="price" ng-model="field.price" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>订单总额" class="layui-input" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">下单时间</label>
            <div class="layui-input-4">
                <input type="text" name="createtime" ng-model="field.createtime" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>下单时间" class="layui-input" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">收件人</label>
            <div class="layui-input-4">
                <input type="text" name="username" ng-model="field.username" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>客户姓名" class="layui-input" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系方式</label>
            <div class="layui-input-4">
                <input type="text" name="mobile" ng-model="field.mobile" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>联系方式" class="layui-input" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">收货地址</label>
            <div class="layui-input-4">
                <input type="text" name="address" ng-model="field.address" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>收货地址" class="layui-input" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-4">
                <input type="text" name="status" ng-model="field.status" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>状态" class="layui-input" readonly>
            </div>
        </div>
        <blockquote class="layui-elem-quote" style="background-color:white">商品明细</blockquote>
        <div class="layui-form-item layui-input-5">
            <table class="layui-table">
                <colgroup>
                    <col width="200">
                    <col width="150">
                    <col width="150">
                </colgroup>
                <thead>
                    <tr>
                        <th>商品名称</th>
                        <th>数量</th>
                        <th>价格</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['product']['name']; ?></td>
                        <td><?php echo $vo['quantity']; ?></td>
                        <td><?php echo $vo['product']['price']; ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        
    </form>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <!-- <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button> -->
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
        </div>
    </div>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script src="__STATIC__/common/js/angular.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        $scope.field = '<?php echo $info; ?>'!='null'?<?php echo $info; ?>:{id:'',state:'',product_name:'',sn:'',price:'',discount_price:'',real_price:'',expiry:'',createtime:'',imei:'',username:'',mobile:''};
        
    }]);
</script>