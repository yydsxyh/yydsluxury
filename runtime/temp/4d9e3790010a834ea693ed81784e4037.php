<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"/www/wwwroot/ishop/home/admin/app/admin/view/login/index.html";i:1619344874;}*/ ?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/login.css" />
    <link rel="stylesheet" href="__STATIC__/common/css/font.css" />
</head>
<body class="beg-login-bg">
<div class="container login">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="main-title">
                <div class="beg-login-box">
                    <header>
                        <h1><?php echo config('sys_name'); ?>后台登录</h1>
                    </header>
                    <div class="beg-login-main">
                        <form class="layui-form layui-form-pane" method="post">
                            <div class="layui-form-item">
                                <label class="beg-login-icon fs1">
                                    <span class="icon icon-user"></span>
                                </label>
                                <input type="text" name="username" lay-verify="required" placeholder="这里输入登录名" value="" class="layui-input">
                            </div>
                            <div class="layui-form-item">
                                <label class="beg-login-icon fs1">
                                    <i class="icon icon-key"></i>
                                </label>
                                <input type="password"  name="password" lay-verify="required" placeholder="这里输入密码" value="" class="layui-input">
                            </div>
                            <div class="layui-form-item">
                                <input type="text" name="captcha" id="captcha" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                                <div class="captcha">
                                    <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src=this.src+'?'+'id='+Math.random()"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button type="submit" class="layui-btn btn-submit btn-blog" lay-submit lay-filter="login">登录</button>
                            </div>
                        </form>
                    </div>
                    <footer>
                        <p><?php echo config('sys_name'); ?> © <?php echo config('url_domain_root'); ?></p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="__ADMIN__/js/rAF.js"></script>
<script src="__ADMIN__/js/login.js"></script>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
<script>
    layui.use('form',function(){
        var form = layui.form,$ = layui.jquery;
        //监听提交
        form.on('submit(login)', function(data){
            loading =layer.load(1, {shade: [0.1,'#fff'] });//0.1透明度的白色背景
            $.post('<?php echo url("admin/login/index"); ?>',data.field,function(res){
                layer.close(loading);
                if(res.code == 1){
                    console.log(res.url)
                    layer.msg(res.msg, {icon: 1, time: 1000}, function(){
                        location.href = res.url;
                    });
                }else{
                    $('#captcha').val('');
                    layer.msg(res.msg, {icon: 2, anim: 6, time: 1000});
                    $('.captcha img').attr('src','<?php echo captcha_src(); ?>?id='+Math.random());
                }
            });
            return false;
        });
    });
</script>
</body>
</html>