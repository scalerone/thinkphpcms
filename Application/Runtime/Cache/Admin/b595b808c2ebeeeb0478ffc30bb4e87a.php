<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ThinkphpCms</title>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/./Application/Admin/Public/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="#">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">更新缓存</a></li>
                <li><a href="<?php echo U('edit',array('id' => $_SESSION['uid']));?>">修改密码</a></li>
                <li><a href="javascript:;" class="logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>内容管理</a>
                    <ul class="sub-menu">
                        <li><a href="design.html"><i class="icon-font">&#xe008;</i>文章管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe005;</i>栏目管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe006;</i>留言管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                        <li><a href="design.html"><i class="icon-font">&#xe008;</i>网站会员</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe005;</i>管理员</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>管理员组</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统信息</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>扩展功能</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>图片/水印</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>验证码</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>语言</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>欢迎<?php echo (session('uname')); ?>登录，上次登录时间：<?php echo (date('Y年m月d日 H:i:s',session('logintime'))); ?>，登录IP：<?php echo (session('ip')); ?></span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="#"><i class="icon-font">&#xe001;</i>添加内容</a>
                    <a href="#"><i class="icon-font">&#xe005;</i>添加栏目</a>
                    <a href="#"><i class="icon-font">&#xe048;</i>内容管理</a>
                    <a href="#"><i class="icon-font">&#xe041;</i>栏目管理</a>
                    <a href="#"><i class="icon-font">&#xe01e;</i>系统设置</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info"><?php echo ($system["name"]); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info"><?php echo ($system["hj"]); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info "><?php echo ($system["uploadSize"]); ?>M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info" id="time"></span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名</label><span class="res-info"><?php echo ($system["siteUrl"]); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info"><?php echo ($system["host"]); ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">客服QQ：</label><span class="res-info">848464730</span>
                    </li>
                    <li>
                        <label class="res-lab">微信：</label><span class="res-info">848464730</span>
                    </li>
                    <li>
                        <label class="res-lab">E-mail：</label><span class="res-info">848464730@qq.com</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
<script type="text/javascript" src="/./Application/Admin/Public/js/jquery-1.11.min.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/js/layer/layer.js"></script>

<script type="text/javascript">
    $(function(){
        $('.logout').on('click',function(){
            //询问框
            layer.confirm('您确定要退出?', {icon: 3, title:'提示'}, function(index){
                $.get('<?php echo U("logout");?>',function(){
                    window.location.href = "<?php echo U('Login/index');?>";
                });              
              layer.close(index);
            });   
        });
        $('.sidebar-list>li>a').on('click',function(){
            $(this).next('.sub-menu').stop(true).slideDown('slow');
            $(this).parents('li').not(this).find('.sub-menu').stop(true).slideUp('slow');
        });
        //获取当前时间
        var t = null;
        t = setTimeout(time,1000);//开始执行
        function time()
        {
           clearTimeout(t);//清除定时器
           dt = new Date();
           var yy = dt.getYear();   
            if(yy<1900) yy = yy+1900;   
            var MM = dt.getMonth()+1;   
            if(MM<10) MM = '0' + MM;   
            var dd = dt.getDate();   
            if(dd<10) dd = '0' + dd; 
           var h=dt.getHours();
           var m=dt.getMinutes();
           var s=dt.getSeconds();
           document.getElementById("time").innerHTML =  yy+"年"+MM+"月"+dd+"日 "+h+":"+m+":"+s;
           t = setTimeout(time,1000); //设定定时器，循环执行             
        } 
    });
</script>
</body>
</html>