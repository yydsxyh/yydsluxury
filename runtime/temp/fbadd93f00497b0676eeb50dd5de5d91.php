<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"/Users/lambor/Desktop/code/info/app/home/view/index/form.html";i:1688923474;s:62:"/Users/lambor/Desktop/code/info/app/home/view/common/head.html";i:1688920525;s:62:"/Users/lambor/Desktop/code/info/app/home/view/common/foot.html";i:1688920544;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Top-up</title>
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
<style>
    .layui-form-pane .layui-form-label{
        width: 200px;
    }
</style>
<div class="admin-main layui-anim layui-anim-upbit" ng-app="hd" ng-controller="ctrl">
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo $title; ?></legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">My Registered Email</label>
            <div class="layui-input-4">
                <input type="text" name="email" ng-model="field.email" lay-verify="required" placeholder="Registered Email" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Contact</label>
            <div class="layui-input-4">
                <input type="text" name="contact" ng-model="field.contact" lay-verify="required" placeholder="Contact" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Pay To</label>
            <div class="layui-input-4">
                <input type="text" name="pay_to" ng-model="field.pay_to" lay-verify="required" placeholder="Pay To" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">My Bank Account Name</label>
            <div class="layui-input-4">
                <input type="text" name="account_name" ng-model="field.account_name" lay-verify="required" placeholder="Bank Account Name" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">My Bank Account No.</label>
            <div class="layui-input-4">
                <input type="text" name="account_no" ng-model="field.account_no" lay-verify="required" placeholder="Bank Account No." class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Reference Number</label>
            <div class="layui-input-4">
                <input type="text" name="reference_number" ng-model="field.reference_number" lay-verify="" placeholder="Reference Number" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Amount</label>
            <div class="layui-input-4">
                <input type="number" name="amount" ng-model="field.amount" lay-verify="required" placeholder="Amount" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">Remark About Your Top-up</label>
            <div class="layui-input-block">
                <!-- <input type="text" name="remark" ng-model="field.remark" lay-verify="" placeholder="User Remark" class="layui-input"> -->
                <textarea placeholder="User Remark" class="layui-textarea" name="remark">{{field.remark}}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Date Paid</label>
            <div class="layui-input-4">
                <input type="text" name="pay_date" ng-model="field.pay_date" lay-verify="required|date" id="date" lay-verify="date" placeholder="Date Paid" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Receipt</label>
            <input type="hidden" name="receipt" id="pic" value="{{field.receipt}}">
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-primary" id="adBtn"><i class="icon icon-upload3"></i>点击上传</button>
                    <!-- <div style="height: 38px;"></div> -->
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" id="adPic">
                        <p id="demoText"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">Invalid Remark</label>
            <div class="layui-input-block">
                <textarea placeholder="Remark" class="layui-textarea" name="" readonly>{{field.back_remark}}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit" style="background-color: #000;">Save</button>
                <a href="<?php echo url('record'); ?>" class="layui-btn layui-btn-primary">Back</a>
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
        $scope.field = '<?php echo $info; ?>'!='null'?<?php echo $info; ?>:{type_id:'',id:'',name:'',price:'',open:1,sort:1,pic:'',special:''};
        layui.use(['form', 'layer','upload','laydate'], function () {
            var form = layui.form, $ = layui.jquery, upload = layui.upload, laydate = layui.laydate;
            if($scope.field.receipt){
                adPic.src = $scope.field.receipt;
            }
            laydate.render({
                elem: '#date'
            });
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
                        return layer.msg('upload failed');
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