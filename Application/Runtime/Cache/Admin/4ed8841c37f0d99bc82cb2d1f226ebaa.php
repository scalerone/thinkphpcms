<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <style type="text/css">
        html,body,div,p,a,b{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 14px; }
        .message{width: 400px;min-height: 150px;margin:auto;border:1px solid #eee;margin-top: 30px;border-radius: 3px;}
        .head{width: 100%;height: 30px;text-align: center;padding-top: 5px;background-color: #5FB878;line-height: 25px;color: #fff;}
        .content{height: 140px;width: 100%;}
        .success ,.error{text-align: center;margin-top: 50px;font-size: 18px;}
        .jump{text-align: center;margin-top: 20px;margin-top: 60px;}
    </style>
</head>
<body>
    <div class="message">
    <div class="head"><span>跳转提示信息:</span></div>
    <div class="content">
    <?php if(isset($message)) {?>
    <p class="success"><?php echo($message); ?></p>
    <?php }else{?>
    <p class="error">:( <?php echo($error); ?></p>
    <?php }?>
    <p class="detail"></p>
    <p class="jump">
    <a id="href" href="<?php echo($jumpUrl); ?>">如果你的浏览器没有自动跳转，请点击这里...</a>
    <br />
    等待时间： <b id="wait"><?php echo($waitSecond); ?></b>秒
    </p>
    </div>
    </div>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
        var time = --wait.innerHTML;
        if(time <= 0) {
            location.href = href;
            clearInterval(interval);
            };
        }, 2000);
    })();
</script>
</body>
</html>