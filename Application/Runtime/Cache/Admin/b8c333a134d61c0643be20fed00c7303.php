<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ThinkphpCms</title>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/fonts/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/layui/css/layui.css" media="all" />
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="javascript:;">OkServer</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="javascript:;" class="clearCache"><i class="iconfont">&#xe6fa;</i>更新缓存</a></li>
                <li><a href="<?php echo U('Admin/edit',array('id' => $_SESSION['uid']));?>"><i class="iconfont">&#xe691;</i>修改密码</a></li>
                <li><a href="javascript:;" class="logout"><i class="iconfont">&#xe67d;</i>退出</a></li>
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
            <ul class="layui-nav layui-nav-tree wid_auto" lay-filter="demo">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="iconfont">&#xe685;</i>内容管理</a>
                    <dl class="layui-nav-child pdleft">
                        <dd><a href="<?php echo U('Article/index');?>"><i class="iconfont">&#xe66a;</i>文章管理</a></dd>
                        <dd><a href="<?php echo U('Category/index');?>"><i class="iconfont">&#xe60d;</i>栏目管理</a></dd>
                        <dd><a href="<?php echo U('Contact/index');?>"><i class="iconfont">&#xe61b;</i>留言管理</a></dd>
                        <dd><a href="<?php echo U('Comment/index');?>"><i class="iconfont">&#xe621;</i>评论管理</a></dd>
                        <dd><a href="<?php echo U('Links/index');?>"><i class="iconfont">&#xe636;</i>友情链接</a></dd>
                        <dd><a href="<?php echo U('Banner/index');?>"><i class="iconfont">&#xe622;</i>广告管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont">&#xe601;</i>用户管理</a>
                    <dl class="layui-nav-child pdleft">
                        <dd><a href="<?php echo U('Member/index');?>"><i class="iconfont">&#xe64b;</i>网站会员</a></dd>
                        <dd><a href="<?php echo U('Admin/index');?>"><i class="iconfont">&#xe7e1;</i>管理员</a></dd>
                        <dd><a href="<?php echo U('Admin/group');?>"><i class="iconfont">&#xe605;</i>管理员组</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont">&#xe691;</i>权限管理</a>
                    <dl class="layui-nav-child pdleft">
                        <dd><a href="<?php echo U('Rule/index');?>"><i class="iconfont">&#xe644;</i>权限列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont">&#xe646;</i>系统管理</a>
                    <dl class="layui-nav-child pdleft">
                        <dd><a href="<?php echo U('System/index');?>"><i class="iconfont">&#xe78a;</i>系统设置</a></dd>
                        <dd><a href="javascript:;" class="clearCache"><i class="iconfont">&#xe6fa;</i>清空缓存</a></dd>
                        <dd><a href="<?php echo U('System/backup');?>"><i class="iconfont">&#xe634;</i>数据备份</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont">&#xe60e;</i>扩展功能</a>
                    <dl class="layui-nav-child pdleft">
                        <dd><a href="system.html"><i class="iconfont">&#xe641;</i>静态页面</a></dd>
                        <dd><a href="system.html"><i class="iconfont">&#xe64f;</i>语言设置</a></dd>
                    </dl>
                </li>
            </ul>


            
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="iconfont">&#xe607;</i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name">链接管理</a><span class="crumb-step">&gt;</span><a class="crumb-name">添加链接</a></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
               <form class="layui-form" action="<?php echo U('Links/add');?>" method="post" enctype="multipart/form-data" id="addForm">
                  
                  <div class="layui-form-item">
                    <label class="layui-form-label ">链接名称：</label>
                    <div class="layui-input-block w500">
                      <input type="text" name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="">
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label ">链接地址：</label>
                    <div class="layui-input-block w500">
                      <input type="text" name="url" required  lay-verify="required|url" placeholder="http://www.baidu.com" autocomplete="off" class="layui-input" value="">
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label ">排序：</label>
                    <div class="layui-input-block w200">
                      <input type="text" name="sort" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="20">
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">缩略图：</label>
                    <div class="layui-input-block">
                        <img src="" class="hide thumb-img" height="100px" width="auto">
                        <input type="hidden" name="thumb" class="thumb-input" value="">
                        <input type="file" name="_thumb" id="_thumb" class="hide">
                        <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                          <i class="layui-icon">&#xe608;</i> 链接缩略图
                        </button>
                        <button class="del-thumb layui-btn layui-btn-primary hide">删除</button>
                    </div>
                  </div>
                  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述：</label>
                    <div class="layui-input-block w500">
                      <textarea name="desc" placeholder="链接描述..." class="layui-textarea"></textarea>
                    </div>
                  </div>
                  
                   <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button type="submit" class="layui-btn submit" lay-submit="" >添加</button>
                      <a href="javascript:window.history.go(-1);" class="layui-btn layui-btn-warm" >返回</a>
                      <a href="<?php echo U('Links/index');?>" class="layui-btn" >查看链接</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
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

	$('.clearCache').on('click',function(){
		layer.confirm('您确定要清除所有缓存文件?', {icon: 3, title:'提示'}, function(index){
	        $.ajax({
             	url: '<?php echo U("Cache/index");?>',
             	dataType: 'json',
             	data: {time: Math.random()},
             	beforeSend: function () {
			        layer.msg('正在清理...', {
					  icon: 16
					  ,shade: 0.01
					});
			    },
			    success: function (res) {
			        if (res.status == "1") {
			            layer.alert(res.msg,{icon:1});
			            window.setTimeout(function(){
			            	window.location.reload();
			            },1500);
			        }else{
			        	layer.alert(res.msg,{icon:3});
			        }
			    }
             });
	      layer.close(index);
	    }); 
		
	});
</script>
<script>
layui.use('element', function(){
  var element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块
});
</script>
<script type="text/javascript">
    layui.use(['form'], function(){
      var form = layui.form();

        //文章缩略图上传
        $('#_thumb').bind('change',function(){
          //限制文件类型与大小
          var options = {
            'filePath': $(this).val()
          };
          //调用上传方法
          fileUpload(options,'#_thumb','<?php echo U("Article/upload");?>');
        });
    });
    //ajax添加友情链接
    $(function(){
      $('.submit').on('click',function(){
        var url = '<?php echo U("Links/add");?>';
        ajaxAddLinks(url);
        function ajaxAddLinks(url){
          $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: $('#addForm').serialize(),
            success:function(res){
              if(res.status == 1){
                layer.msg(res.msg,{icon:1});
              }else{
                layer.msg(res.msg,{icon:2});
              }
            },
            error:function(res){
              layer.msg('出现错误！',{icon:2});
            }
          })
        }
        return false;
      });
    });
</script>
</body>
</html>