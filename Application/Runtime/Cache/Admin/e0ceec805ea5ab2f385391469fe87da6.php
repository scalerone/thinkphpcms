<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="/./Application/Admin/Public/css/login_v2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bg_wrap">
    <!-- <div><img src="images/bg01.jpg"></div> -->
    <div><img src="/./Application/Admin/Public/images/bg02.jpg"></div>
    <div><img src="/./Application/Admin/Public/images/bg03.jpg"></div>
</div>
<div id="login_wrap">
    <h3 class="move">Admin login</h3>
    <form action="<?php echo U('index');?>" method="post" class="loginForm">
        <p class="move">
            <input type="text" name="username" id="username" class="input" placeholder="Username">
        </p>
        <p class="move">
            <input type="password" name="password" id="pwd" class="input" placeholder="Password">
        </p>
        <p class="move">
            <input type="text" name="code" id="code" class="code input" placeholder="verify" maxlength="4">
            <img title="点击图片更换验证码" class="verify" src="<?php echo U('verify');?>" width="138px">
        </p>
        <p class="move">
            <input type="submit" value="Login in" class="input login">
        </p>
    </form>
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

    window.onload = function(){
        (function(){
            var oImg = document.querySelectorAll('#bg_wrap img');
            var len = oImg.length;
            var timer = null;
            var index = 0;
            timer = setInterval(function(){
                oImg[index].style.opacity = 0;
                index++;
                index %= len;
                oImg[index].style.opacity = 1;
            },5000);
        })();

        (function(){
            var oInput = document.querySelectorAll('#login_wrap .move');
            var len = oInput.length;
            var timer = null;
            var speed = 3;
            var end = 260;
            var i = null;
            var time = null;

            for (i = len; i>=-1; i--) {
                (function(x){
                    time = setTimeout(function(){
                        if(timer != null){
                            clearInterval(timer);
                        }
                        var _end = (55*x) + 40;
                        
                        move(speed,x,_end);

                    },600*(len-1-x));
                })(i);
            }

            function move(speed,index,_end){
                if(index < 0){
                    window.clearInterval(timer);
                    window.clearTimeout(time);
                    return;
                }
                timer = setInterval(function(){
                    speed += 3;
                    var m = oInput[index].offsetTop + speed;
                    //移动到了指定位置
                    if(m>_end){
                        m = _end;
                        speed *= -1;    //取反，反方向移动
                        speed *= 0.4; //模拟摩擦力
                    }
                    oInput[index].style.top = m + 'px';
                },20);
            }
        })();
    };
</script>
</body>
</html>