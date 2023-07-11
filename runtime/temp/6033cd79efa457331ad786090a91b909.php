<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"/Users/lambor/Desktop/code/app/app/admin/view/product/form.html";i:1680797503;s:62:"/Users/lambor/Desktop/code/app/app/admin/view/common/head.html";i:1517565830;s:62:"/Users/lambor/Desktop/code/app/app/admin/view/common/foot.html";i:1517565830;}*/ ?>
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
            <label class="layui-form-label">所属分类</label>
            <div class="layui-input-4">
                <select name="type_id" lay-verify="required" ng-model="field.type_id" ng-options="v.id as v.name for v in group" ng-selected="v.type_id==field.type_id">
                    <option value="">请选择所属分类</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">应用名称</label>
            <div class="layui-input-4">
                <input type="text" name="name" ng-model="field.name" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>应用名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">应用封面</label>
            <input type="hidden" name="pic" id="pic" value="{{field.pic}}">
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-primary" id="adBtn"><i class="icon icon-upload3"></i>点击上传</button>
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" id="adPic">
                        <p id="demoText"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">注册数</label>
            <div class="layui-input-4">
                <input type="text" name="reg" ng-model="field.reg" lay-verify="required|number" placeholder="<?php echo lang('pleaseEnter'); ?>价格" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">好评率</label>
            <div class="layui-input-4">
                <input type="text" name="sales" ng-model="field.sales" lay-verify="required|number" placeholder="<?php echo lang('pleaseEnter'); ?>销量" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">是否推荐</label>
                <div class="layui-input-block">
                    <input type="radio" name="hot" ng-model="field.hot" ng-checked="field.hot==1" ng-value="1" title="是">
                    <input type="radio" name="hot" ng-model="field.hot" ng-checked="field.hot==2" ng-value="2" title="否">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">注册地址1</label>
            <div class="layui-input-4">
                <input type="text" name="reg_link1" ng-model="field.reg_link1" lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>注册地址1" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">注册地址2</label>
            <div class="layui-input-4">
                <input type="text" name="reg_link2" ng-model="field.reg_link2" lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>注册地址2" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">注册地址3</label>
            <div class="layui-input-4">
                <input type="text" name="reg_link3" ng-model="field.reg_link3" lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>注册地址3" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录地址1</label>
            <div class="layui-input-4">
                <input type="text" name="login_link1" ng-model="field.login_link1" lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>登录地址1" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录地址2</label>
            <div class="layui-input-4">
                <input type="text" name="login_link2" ng-model="field.login_link2" lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>登录地址2" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录地址3</label>
            <div class="layui-input-4">
                <input type="text" name="login_link3" ng-model="field.login_link3" lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>登录地址3" class="layui-input">
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
<script src="__STATIC__/ueditor/ueditor.config.js" type="text/javascript"></script>
<script src="__STATIC__/ueditor/ueditor.all.min.js" type="text/javascript"></script>
<script>var editor = new UE.ui.Editor();editor.render("content");</script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        $scope.public = '__PUBLIC__';
        $scope.field = '<?php echo $info; ?>'!='null'?<?php echo $info; ?>:{type_id:'',id:'',name:'',price:'',open:1,sort:50,pic:'',special:''};
        $scope.group = <?php echo $productTypeList; ?>;
        $scope.imgs = <?php echo $images; ?>;
        layui.use(['form', 'layer','upload'], function () {
            var form = layui.form, $ = layui.jquery, upload = layui.upload;
            if($scope.field.pic){
                adPic.src = "__PUBLIC__"+ $scope.field.pic;
            }

            form.on('submit(submit)', function (data) {
                // 提交到方法 默认为本身
                data.field.id = $scope.field.id;

                var loading = layer.load(1, {shade: [0.1, '#fff']});
                $.post("", data.field, function (res) {
                    layer.close(loading);
                    if (res.code > 0) {
                        layer.msg(res.msg, {time: 1800, icon: 1}, function () {
                            location.href = res.url;
                        });
                    } else {
                        layer.msg(res.msg, {time: 1800, icon: 2});
                    }
                });
            });
            //普通图片上传
            var uploadInst = upload.render({
                elem: '#adBtn'
                ,url: '<?php echo url("UpFiles/upload"); ?>'
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#adPic').attr('src', result); //图片链接（base64）
                    });
                },
                done: function(res){
                    if(res.code>0){
                        $('#pic').val(res.url);
                    }else{
                        //如果上传失败
                        return layer.msg('上传失败');
                    }
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });

        });
    }]);
</script>