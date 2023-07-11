<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\phpstudy_pro\WWW\order/app/admin\view\product\index.html";i:1618474873;s:57:"D:\phpstudy_pro\WWW\order/app/admin\view\common\head.html";i:1517565830;s:57:"D:\phpstudy_pro\WWW\order/app/admin\view\common\foot.html";i:1517565830;}*/ ?>
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
        <legend>商品列表</legend>
    </fieldset>
    <div class="demoTable layui-form">
        <div class="layui-inline">
            <select name="type_id" lay-filter="type_id" ng-model="type_id" ng-options="v.id as v.name for v in group" ng-selected="v.type_id==field.type_id" id="type_id">
                <option value="">请选择所属分类</option>
            </select>
        </div>
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>关键字">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="<?php echo url('index'); ?>" class="layui-btn">显示全部</a>
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        <a href="<?php echo url('add'); ?>" class="layui-btn" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i><?php echo lang('add'); ?>商品</a>
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


<script type="text/html" id="img">
   {{# if(d.pic){ }}<img src=__PUBLIC__/{{d.pic}} />{{# } }}
</script>
<script type="text/html" id="order">
    <input name="{{d.id}}" data-id="{{d.id}}" class="list_order layui-input" value=" {{d.sort}}" size="10"/>
</script>
<script type="text/html" id="open">
    <input type="checkbox" name="open" value="{{d.id}}" lay-skin="switch" lay-text="上架|下架" lay-filter="open" {{ d.open == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="action">
    <a href="<?php echo url('edit'); ?>?id={{d.id}}" class="layui-btn layui-btn-xs">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script src="__STATIC__/common/js/angular.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        $scope.group = <?php echo $productTypeList; ?>;
        layui.use(['table','form'], function() {
            var table = layui.table,form = layui.form,$ = layui.jquery;
            var tableIn = table.render({
                id: 'product',
                elem: '#list',
                url: '<?php echo url("index"); ?>',
                method: 'post',
                page:true,
                cols: [[
                    {checkbox: true},
                    {field: 'id', title: '<?php echo lang("id"); ?>', width: 80, align: 'center'},
                    {field: 'typename', title: '分类名称', width: 160, align: 'center'},
                    {field: 'name', title: '商品名称', width: 150, align: 'center'},
                    {field: 'price', title: '原价', width: 160, align: 'center'},
                    {field: 'special', title: '优惠价格', width: 160, align: 'center'},
                    {field: 'open', align: 'center', title: '上下架', width: 100, toolbar: '#open'},
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
                var type_id = $('#type_id').val();
                if ($.trim(key) === '') {
                    layer.msg('<?php echo lang("pleaseEnter"); ?>关键字！', {icon: 0});
                    return;
                }
                tableIn.reload({
                    where: {key: key,type_id: type_id}
                });
            });
            form.on('select(type_id)', function(data) {
                // console.log(data.value);
                $('#key').val('');
                var type_id = $('#type_id').val();
                tableIn.reload({
                    where: {type_id: type_id}
                });
            });
            table.on('tool(list)', function(obj) {
                var data = obj.data;
                if (obj.event === 'del'){
                    layer.confirm('您确定要删除该产品吗？', function(index){
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
                layer.confirm('确认要删除选中的产品吗？', {icon: 3}, function(index) {
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