<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"/www/wwwroot/ishop/home/admin/app/admin/view/users/edit.html";i:1618476220;s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/common/head.html";i:1517565830;s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/common/foot.html";i:1517565830;}*/ ?>
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
        <legend><?php echo $title; ?></legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo lang('nickname'); ?></label>
            <div class="layui-input-4">
                <input type="text" name="username" ng-model="field.username" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?><?php echo lang('nickname'); ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学号</label>
            <div class="layui-input-4">
                <input type="text" name="number" ng-model="field.number" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>学号" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo lang('email'); ?></label>
            <div class="layui-input-4">
                <input type="text" name="email" ng-model="field.email" lay-verify="eamil" placeholder="输入<?php echo lang('email'); ?>" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                必填：用于找回密码
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo lang('tel'); ?></label>
            <div class="layui-input-4">
                <input type="text" name="mobile" ng-model="field.mobile" lay-verify="mobile" placeholder="输入<?php echo lang('tel'); ?>" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                只能填写数字
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo lang('pwd'); ?></label>
            <div class="layui-input-4">
                <input type="password" name="password" placeholder="输入<?php echo lang('pwd'); ?>" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                密码必须大于6位，小于15位
            </div>
        </div>
       <div class="layui-form-item">
            <label class="layui-form-label">收货地址</label>
            <div class="layui-input-4">
                <input type="text" name="address" ng-model="field.address" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>收货地址" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script src="__STATIC__/common/js/angular.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',function($scope) {
        $scope.field = <?php echo $info; ?>;
        layui.use(['form', 'layer'], function () {
            var form = layui.form, layer = layui.layer,$= layui.jquery;
            
            form.on('submit(submit)', function (data) {
                // 提交到方法 默认为本身
                var loading = layer.load(1, {shade: [0.1, '#fff']});
                data.field.id = $scope.field.id;
                $.post("", data.field, function (res) {
                    layer.close(loading);
                    if (res.code > 0) {
                        // layer.msg(res.msg, {time: 1800, icon: 1}, function () {
                        //     location.href = res.url;
                        // });
                        parent.tableIn.reload();
                        setTimeout(function(){
                            parent.layer.close(index);

                        },100)
                    } else {
                        layer.msg(res.msg, {time: 1800, icon: 2});
                    }
                });
            })
        });
    });
</script>
</body>
</html>