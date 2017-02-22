<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
<link rel="stylesheet" href="/./Application/Admin/Public/Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
</head>
<body>
	<div id="top">
		<div class="menu">
			<a href="#">前台首页</a>
			<a href="<?php echo U('Article/index');?>">文章列表</a>
			<a href="<?php echo U('Category/index');?>">栏目列表</a>
			<a href="<?php echo U('Site/index');?>">站点设置</a>
			<a href="#">会员管理</a>
		</div>
		<div class="exit">
			<a> 欢迎[<?php echo (session('uname')); ?>],登录！</a>
			<a href="<?php echo U('Index/logout');?>" target="_self">退出</a>
			<a href="http://bbs.houdunwang.com" target="_blank">获得帮助</a>
			<a href="http://www.houdunwang.com" target="_blank">欧科网络</a>
		</div>
	</div>
	<div id="left">
		<dl>
			<dt>文章管理</dt>
			<dd><a href="<?php echo U('Article/add');?>">添加文章</a></dd>
			<dd><a href="<?php echo U('Article/index');?>">文章列表</a></dd>
		</dl>
		<dl>
			<dt>栏目管理</dt>
			<dd><a href="<?php echo U('Category/add');?>">添加栏目</a></dd>
			<dd><a href="<?php echo U('Category/index');?>">栏目列表</a></dd>
		</dl>
		<dl>
			<dt>站点设置</dt>
			<dd><a href="<?php echo U('Site/index');?>">基本信息</a></dd>
			<dd><a href="<?php echo U('Site/upload');?>">附件上传</a></dd>
			<dd><a href="<?php echo U('Site/woter');?>">图片水印</a></dd>
		</dl>
		<dl>
			<dt>会员管理</dt>
			<dd><a href="<?php echo U('Member/index');?>">会员列表</a></dd>
			<dd><a href="<?php echo U('Member/add');?>">添加会员</a></dd>
			<dd><a href="<?php echo U('Member/setting');?>">会员设置</a></dd>
		</dl>
		<dl>
			<dt>管理员</dt>
			<dd><a href="<?php echo U('Admin/index');?>">管理员列表</a></dd>
			<dd><a href="<?php echo U('Admin/add');?>">添加管理员</a></dd>
			<dd><a href="<?php echo U('Admin/group');?>">管理员组</a></dd>
			<dd><a href="<?php echo U('Admin/addGroup');?>">添加组</a></dd>
		</dl>
		<dl>
			<dt>权限管理</dt>
			<dd><a href="<?php echo U('Rule/index');?>">权限列表</a></dd>
			<dd><a href="<?php echo U('Rule/add');?>">添加权限</a></dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src=""></iframe>
	</div>
</body>
</html>