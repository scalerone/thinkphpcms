<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="/./Application/Admin/Public/css/admin_login.css" rel="stylesheet" type="text/css" />
    <link href="/./Application/Admin/Public/layui/css/layui.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="<?php echo U('index');?>" method="post" class="loginForm">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" id="username" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" id="pwd" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">验证码：</label>
                    </li>
                    <li>
                       <div class="codebox"><input type="text" name="code" value="" id="code" size="4" class="admin_input_style" maxlength="4" />
                        <img title="点击图片更换验证码" class="verify" src="<?php echo U('verify');?>" width="138px"></div>
                    </li>
                    <li>
                        <input type="submit" value="登录" class="layui-btn" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/./Application/Admin/Public/js/jquery-1.11.min.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/js/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        $('.verify').on('click',function(){
            var url = "<?php echo U('Login/verify');?>";
            $(this)[0].src= url;
        });
        //登录
        $('input[type=submit]').click(function(){
            if($('#username').val().trim() == ""){
                layer.tips('用户名不能为空哦!', '#username',{tips: [4, '#FF5722']});
                $('#username').focus();
                return false;
            }
            if($('#pwd').val().trim() == ""){
                layer.tips('你还没有输入密码呢!', '#pwd',{tips: [4, '#FF5722']});
                $('#pwd').focus();
                return false;
            }
            if($('#code').val().trim() == ""){
                layer.tips('你还没有输入验证码呢!', '#code',{tips: [4, '#FF5722']});
                $('#code').focus();
                return false;
            }
            if($('#code').val().trim().length != 4){
               layer.tips('验证码长度为4!', '#code',{tips: [4, '#FF5722']}); 
               $('#code').focus();
               return false;
            }
            $.ajax({
                type:'POST',
                url:'<?php echo U("index");?>',
                data:$('.loginForm').serialize(),
                dataType:'json',
                success:function(result){
                    var status = result.status;
                    if(status == 1){
                        layer.msg(result.msg,{icon:2});
                        $('#code').val('').focus();
                        $('.verify').trigger('click');
                    }else if(status == 2){
                        layer.msg(result.msg,{icon:2});
                    }else if(status == 3){
                        layer.msg(result.msg,{icon:2});
                        $('#username').focus();
                        $('.verify').trigger('click');
                    }else if(status == 0){
                        layer.msg(result.msg,{icon:1});
                        setTimeout('window.location.href = "<?php echo U('Index/index');?>";',1000);
                    }
                },
                error:function(result){
                    layer.msg('登入失败,网络错误!');
                }
            });
            return false;
        });
    });
</script>
</body>
</html>