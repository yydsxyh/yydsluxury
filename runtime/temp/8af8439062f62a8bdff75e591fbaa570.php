<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"/Users/lambor/Desktop/code/info/app/admin/view/order/index.html";i:1688921723;s:63:"/Users/lambor/Desktop/code/info/app/admin/view/common/head.html";i:1688906090;s:63:"/Users/lambor/Desktop/code/info/app/admin/view/common/foot.html";i:1517565830;}*/ ?>
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
            <select name="status" lay-filter="status" ng-model="status" ng-options="v.id as v.title for v in group" ng-selected="v.id==field.status" id="status">
                <option value="">请选择状态</option>
            </select>
        </div>
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>User关键字">
        </div>
        <button class="layui-btn" id="search" data-type="reload">搜索</button>
        <a href="<?php echo url('index'); ?>" class="layui-btn">显示全部</a>
        <!-- <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button> -->
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<style type="text/css">
     .layui-table-cell {
        height: auto;
        line-height: 28px;
    }
    .layui-table-cell {
        overflow: visible;
    }
    .layui-table-box {
        overflow: visible;
    }
    .layui-table-body {
        overflow: visible;
    }
    .layui-form-select dl dd{
        text-align: left;
    }
    .red{
        color: red;
    }
</style>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script type="text/html" id="img">
   {{# if(d.pic){ }}<img src=__PUBLIC__/{{d.pic}} />{{# } }}
</script>
<script type="text/html" id="order">
    <input name="{{d.id}}" data-id="{{d.id}}" class="list_order layui-input" value=" {{d.sort}}" size="10"/>
</script>

<script type="text/html" id="status-tab">
    <span class="layui-badge-dot {{d.status==0 ? 'layui-bg-blue': (d.status == 1 ? 'layui-bg-green' : '') }}"></span>
    <div class="layui-inline spid" data-id="{{d.id}}">
        <select class="status-tab" name="status-tab" lay-filter="status-tab">
            <option value="0" {{d.status==0 ? 'selected':'' }}>Unverified</option>
            <option value="1" {{d.status==1 ? 'selected':'' }}>Verified</option>
            <option value="2" {{d.status==2 ? 'selected':'' }}>Invalid</option>
        </select>
    </div>
</script>
<script type="text/html" id="action">
    <a href="<?php echo url('edit'); ?>?id={{d.id}}" class="layui-btn layui-btn-xs">view</a>
    <!-- <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a> -->
</script>
<script src="__STATIC__/common/js/angular.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        $scope.group = [
            {'id' : 0, 'title' : 'Unverified', 'color' : 'blue'},
            {'id' : 1, 'title' : 'Verified', 'color' : 'green'},
            {'id' : 2, 'title' : 'Invalid', 'color' : 'red'},
        ]
        layui.use(['table','form'], function() {
            
            var table = layui.table,form = layui.form,$ = layui.jquery;
            var tableIn = table.render({
                id: 'product',
                elem: '#list',
                url: '<?php echo url("index"); ?>',
                method: 'post',
                page:true,
                cols: [[
                    //{checkbox: true},
                    //{field: 'id', title: '<?php echo lang("id"); ?>', width: 80, align: 'center'},
                    {field: 'addtime', title: 'Date', width: '25%', align: 'center'},
                    {field: 'email', title: 'User', width: '25%', align: 'center'},
                    {field: 'status', title: 'Status', width: '25%', align: 'center', toolbar:'#status-tab'},
                    //{field: 'open', align: 'center', title: '上下架', width: 100, toolbar: '#open'},
                    {width: '25%', title: 'Information', align: 'center', toolbar: '#action'}
                ]],
                limit:20
            });
            form.on('select(status-tab)', function(obj){
                loading =layer.load(1, {shade: [0.1,'#fff']});
                var id = $(obj.elem).parents('.spid').attr('data-id');
                var status = obj.value;
                $.post('<?php echo url("editState"); ?>',{'id':id,'status':status},function (res) {
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
                var status = $('#status').val();
                if ($.trim(key) === '') {
                    layer.msg('<?php echo lang("pleaseEnter"); ?>关键字！', {icon: 0});
                    return;
                }
                tableIn.reload({
                    where: {key: key,status: status}
                });
            });
            
            form.on('select(status)', function(data) {
                // console.log(data.value);
                var key = $('#key').val();
                var status = $('#status').val();
                tableIn.reload({
                    where: {status: status,key:key}
                });
            });
            table.on('tool(list)', function(obj) {
                var data = obj.data;
                if (obj.event === 'del'){
                    layer.confirm('您确定要删除该歌曲吗？', function(index){
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
            $('body').on('blur','.list_order',function() {
                var id = $(this).attr('data-id');
                var sort = $(this).val();
                var loading = layer.load(1, {shade: [0.1, '#fff']});
                $.post('<?php echo url("proOrder"); ?>',{id:id,sort:sort},function(res){
                    layer.close(loading);
                    if(res.code === 1){
                        layer.msg(res.msg, {time: 1000, icon: 1});
                        tableIn.reload();
                    }else{
                        layer.msg(res.msg,{time:1000,icon:2});
                    }
                })
            });
            $('#delAll').click(function(){
                layer.confirm('确认要删除选中的order吗？', {icon: 3}, function(index) {
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