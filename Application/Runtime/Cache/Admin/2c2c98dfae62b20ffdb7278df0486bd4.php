<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ThinkphpCms</title>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/layui/css/layui.css" media="all" />
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
                <li><a href="<?php echo U('Admin/edit',array('id' => $_SESSION['uid']));?>">修改密码</a></li>
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
                    <a href="javascript:;"><i class="icon-font">&#xe003;</i>内容管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Article/index');?>"><i class="icon-font">&#xe008;</i>文章管理</a></li>
                        <li><a href="<?php echo U('Category/index');?>"><i class="icon-font">&#xe005;</i>栏目管理</a></li>
                        <li><a href="<?php echo U('Contact/index');?>"><i class="icon-font">&#xe006;</i>留言管理</a></li>
                        <li><a href="<?php echo U('Comment/index');?>"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="<?php echo U('Links/index');?>"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="<?php echo U('Banner/index');?>"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Member/index');?>"><i class="icon-font">&#xe008;</i>网站会员</a></li>
                        <li><a href="<?php echo U('Admin/index');?>"><i class="icon-font">&#xe005;</i>管理员</a></li>
                        <li><a href="<?php echo U('Admin/group');?>"><i class="icon-font">&#xe033;</i>管理员组</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>权限管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Rule/index');?>"><i class="icon-font">&#xe008;</i>权限列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('System/index');?>"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="<?php echo U('Cache/index');?>"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="<?php echo U('Data/backup');?>"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="<?php echo U('Data/reduct');?>"><i class="icon-font">&#xe045;</i>数据还原</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">权限管理</span></div>
        </div>

        <div class="result-wrap">
            <form method="post" action="" class="layui-form sortForm">
                <div class="result-content" style="max-height: 600px;overflow: auto;">
                    <fieldset class="layui-elem-field layui-field-title">
                    <legend>系统设置</legend>
                  </fieldset>
                   
                  <div class="layui-tab layui-tab-card">
                    <ul class="layui-tab-title">
                      <li class="layui-this">网站信息</li>
                      <li>SEO设置</li>
                      <li>附件上传</li>
                      <li>水印设置</li>
                    </ul>
                    <div class="layui-tab-content" style="min-height: 360px;">
                      <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                          <label class="layui-form-label">站点标题</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">站点地址</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="http://www.baidu.com">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">ico图标</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">电话</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">手机</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">传真</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">Email</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="layui-tab-item">2</div>
                      <div class="layui-tab-item">3</div>
                      <div class="layui-tab-item">4</div>
                    </div>
                  </div>
                </div>
                <div class="site-demo-button" style="margin-left: 50px;">
                  <button class="layui-btn site-demo-active submit">保存设置</button>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
<script type="text/javascript" src="/./Application/Admin/Public/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/js/jquery-1.11.min.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/js/layer/layer.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/layui/layui.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/js/common.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/js/function.js"></script>
<script type="text/javascript">
	$('.logout').on('click',function(){
	    //询问框
	    layer.confirm('您确定要退出?', {icon: 3, title:'提示'}, function(index){
	        $.get('<?php echo U("Index/logout");?>',function(){
	            window.location.href = "<?php echo U('Login/index');?>";
	        });              
	      layer.close(index);
	    });   
	});
</script>
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['layer','element'], function(){
        var layer = layui.layer
        ,element = layui.element();
});
      $(function(){
        $('.submit').on('click',function(){
          var url = "<?php echo U('System/set');?>";

          return false;
        });
      });
</script>
</body>
</html>