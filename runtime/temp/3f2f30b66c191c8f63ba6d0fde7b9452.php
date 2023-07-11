<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"/Users/lambor/Desktop/code/app/app/admin/view/contact/index.html";i:1680798075;s:62:"/Users/lambor/Desktop/code/app/app/admin/view/common/head.html";i:1517565830;s:62:"/Users/lambor/Desktop/code/app/app/admin/view/common/foot.html";i:1517565830;}*/ ?>
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
        <legend>联系方式</legend>
    </fieldset>
    <div class="demoTable layui-form">
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>关键字">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="<?php echo url('index'); ?>" class="layui-btn">显示全部</a>
        <!-- <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button> -->
        <a href="<?php echo url('add'); ?>" class="layui-btn" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i><?php echo lang('add'); ?>联系方式</a>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<style type="text/css">
     .layui-table-cell {
            height: auto;
            line-height: 28px;
        }

   } 
</style>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>



<script type="text/html" id="action">
    <a href="<?php echo url('edit'); ?>?id={{d.id}}" class="layui-btn layui-btn-xs">编辑</a>
    <!-- <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a> -->
</script>
<script src="__STATIC__/common/js/angular.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        layui.use(['table','form'], function() {
            var table = layui.table,form = layui.form,$ = layui.jquery;
            var tableIn = table.render({
                id: 'contact',
                elem: '#list',
                url: '<?php echo url("index"); ?>',
                method: 'post',
                page:true,
                cols: [[
                    {checkbox: true},
                    {field: 'id', title: '<?php echo lang("id"); ?>', width: 80, align: 'center'},
                    {field: 'title', title: '联系应用', width: 150, align: 'center'},
                    {field: 'url', title: '下载地址', width: 250, align: 'center'},
                    {width: 160, align: 'center', toolbar: '#action'}
                ]],
                limit:20
            });
            form.on('switch(open)', function(obj){
                loading =layer.load(1, {shade: [0.1,'#fff']});
                var id = this.value;
                var open = obj.elem.checked===true?1:0;
                $.post('<?php echo url("editState"); ?>',{'id':id,'open':open},function (res) {
                    layer.close(loading);
                    if (res.status==1) {
                        tableIn.reload();
                    }else{
                        layer.msg(res.msg,{time:1000,icon:2});
                        return false;
                    }
                })
            });
            //搜索
            $('#search').on('click', function () {
                var key = $('#key').val();
                if ($.trim(key) === '') {
                    layer.msg('<?php echo lang("pleaseEnter"); ?>关键字！', {icon: 0});
                    return;
                }
                tableIn.reload({
                    where: {key: key}
                });
            });
            
            table.on('tool(list)', function(obj) {
                var data = obj.data;
                if (obj.event === 'del'){
                    layer.confirm('您确定要删除该联系方式吗？', function(index){
                        var loading = layer.load(1, {shade: [0.1, '#fff']});
                        $.post("<?php echo url('del'); ?>",{id:data.id},function(res){
                            layer.close(loading);
                            if(res.code===1){
                                layer.msg(res.msg,{time:1000,icon:1});
                                tableIn.reload();
                            }else{
                                layer.msg('操作失败！',{time:1000,icon:2});
                            }
                        });
                        layer.close(index);
                    });
                }
            });
            
            $('#delAll').click(function(){
                layer.confirm('确认要删除选中的联系方式吗？', {icon: 3}, function(index) {
                    layer.close(index);
                    var checkStatus = table.checkStatus('product'); //test即为参数id设定的值
                    var ids = [];
                    $(checkStatus.data).each(function (i, o) {
                        ids.push(o.id);
                    });
                    var loading = layer.load(1, {shade: [0.1, '#fff']});
                    $.post("<?php echo url('delall'); ?>", {ids: ids}, function (data) {
                        layer.close(loading);
                        if (data.code === 1) {
                            layer.msg(data.msg, {time: 1000, icon: 1});
                            tableIn.reload();
                        } else {
                            layer.msg(data.msg, {time: 1000, icon: 2});
                        }
                    });
                });
            })
        })
    }]);
</script>