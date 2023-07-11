<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/order/index.html";i:1619345296;s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/common/head.html";i:1517565830;s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/common/foot.html";i:1517565830;}*/ ?>
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
        <legend>订单列表</legend>
    </fieldset>
    <div class="demoTable layui-form">
        
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>订单号">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="<?php echo url('index'); ?>" class="layui-btn">显示全部</a>
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        
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
    <a href="<?php echo url('edit'); ?>?id={{d.id}}" class="layui-btn layui-btn-xs">查看</a>
    {{# if(!d.status){ }}
    <a class="layui-btn layui-btn-xs layui-btn-warm" lay-event="delivery">配送</a>
    {{# } }}
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="status">
    {{# if(d.status==1){ }}
        已配送
    {{# }else{  }}
        未配送
    {{# } }}
</script>
<script src="__STATIC__/common/js/angular.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        layui.use(['table','form'], function() {
            var table = layui.table,form = layui.form,$ = layui.jquery;
            var tableIn = table.render({
                id: 'order',
                elem: '#list',
                url: '<?php echo url("index"); ?>',
                method: 'post',
                page:true,
                cols: [[
                    {checkbox: true},
                    {field: 'id', title: '<?php echo lang("id"); ?>', width: 80, align: 'center'},
                    {field: 'sn', title: '订单号', width: 160, align: 'center'},
                    {field: 'username', title: '购买人', width: 150, align: 'center'},
                    {field: 'price', title: '价格', width: 160, align: 'center'},
                    {field: 'mobile', title: '联系电话', width: 160, align: 'center'},
                    {field: 'address', title: '配送地址', width: 160, align: 'center'},
                    {field: 'status', title: '状态', width: 160, align: 'center',templet: '#status'},
                    {width: 160, align: 'center', toolbar: '#action'}
                ]],
                limit:20
            });
            //搜索
            $('#search').on('click', function () {
                var key = $('#key').val();
                var type_id = $('#type_id').val();
                if ($.trim(key) === '') {
                    layer.msg('<?php echo lang("pleaseEnter"); ?>关键字！', {icon: 0});
                    return;
                }
                tableIn.reload({
                    where: {key: key,type_id: type_id}
                });
            });
            table.on('tool(list)', function(obj) {
                var data = obj.data;
                if (obj.event === 'del'){
                    layer.confirm('您确定要删除该订单吗？', function(index){
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
                }else if (obj.event === 'delivery'){
                    layer.confirm('您确定要配送该订单吗？', function(index){
                        var loading = layer.load(1, {shade: [0.1, '#fff']});
                        $.post("<?php echo url('delivery'); ?>",{id:data.id},function(res){
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
                layer.confirm('确认要删除选中的订单吗？', {icon: 3}, function(index) {
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