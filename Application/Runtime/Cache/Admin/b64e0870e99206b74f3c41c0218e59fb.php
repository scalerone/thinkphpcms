<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo (C("SITE_TITLE")); ?>-后台管理</title>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/fonts/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/layui/css/layui.css" media="all" />
    <style type="text/css">
        .uname a{color:#fff;}
    </style>
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
                <li class="uname"><a target="_blank">管理员:[<?php echo (session('uname')); ?>]</a></li>
                <li><a href="/" target="_blank"><i class="iconfont">&#xe6fa;</i>前台首页</a></li>
                <li><a href="javascript:;" class="clearCache"><i class="iconfont">&#xe6fa;</i>更新缓存</a></li>
                <li><a href="<?php echo U('Admin/edit',array('id' => $_SESSION['uid']));?>"><i class="iconfont">&#xe691;</i>修改密码</a></li>
                <li><a href="javascript:;" class="logout"><i class="iconfont">&#xe67d;</i>退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <!-- <div class="sidebar-title">
            <h1>菜单</h1>
        </div> -->
        <div class="sidebar-content">
            <ul class="layui-nav layui-nav-tree wid_auto" lay-filter="demo">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="iconfont">&#xe685;</i>内容管理</a>
                    <dl class="layui-nav-child pdleft">
                        <dd><a href="<?php echo U('Article/index');?>"><i class="iconfont">&#xe66a;</i>文章管理</a></dd>
                        <dd><a href="<?php echo U('Category/index');?>"><i class="iconfont">&#xe60d;</i>栏目管理</a></dd>
                        <dd><a href="<?php echo U('Contact/index');?>"><i class="iconfont">&#xe61b;</i>留言管理</a></dd>
                        <dd><a href="#"><i class="iconfont">&#xe621;</i>评论管理</a></dd>
                        <dd><a href="<?php echo U('Links/index');?>"><i class="iconfont">&#xe636;</i>友情链接</a></dd>
                        <dd><a href="<?php echo U('Ads/index');?>"><i class="iconfont">&#xe622;</i>广告管理</a></dd>
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
               
            </ul>


            
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="iconfont">&#xe607;</i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name">管理员</a><span class="crumb-step">&gt;</span><span>修改密码</span></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('Admin/edit');?>" method="post" id="editForm">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th>用户名：</th>
                                <td>
                                    <input disabled="disabled" class="common-text required disabled" id="uname" name="username" size="50" value="<?php echo ($admin["username"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>所属管理员组：</th>
                                <td>
                                    <div class="layui-input-inline">
                                      <select <?php echo ($admin['group_id']!=='1'?'disabled="true" ':''); ?> name="group_id" class="common-text disabled" style="width:390px;height:32px;">
                                        <?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><option class="common-text" <?php echo ($admin['group_id']==$g['id']?'selected="selected"':''); ?> value="<?php echo ($g["id"]); ?>"><?php echo ($g["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                      </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>新密码：</th>
                                <td><input id="pwd" class="common-text" name="password" size="50" value="" type="text"></td>
                            </tr>
                            <tr>
                                <th>确认密码：</th>
                                <td><input id="pwd2" class="common-text" name="password2" size="50" value="" type="text"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo ($admin["id"]); ?>">
                                    <input class="layui-btn mr10" value="提交" type="submit">
                                    <input class="layui-btn layui-btn-primary" value="重置" type="reset">
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
<script type="text/javascript" src="/./Application/Admin/Public/js/upload/ajaxfileupload.js"></script>
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
    $(function(){
        $('#editForm').submit(function(){
            $pwd = $('#pwd').val().trim();
            $pwd2 = $('#pwd2').val().trim();
            if($pwd == ""){
                layer.tips('密码不能为空哦!', '#pwd');
                $('#pwd').val('').focus();
                return false;
            }
            if($pwd.length < 5 || $pwd.length>12){
                layer.tips('密码长度为6-12个字符!', '#pwd');
                $('#pwd').val('').focus();
                return false;
            }
            if($pwd !== $pwd2){
                layer.tips('两次输入的密码不一致', '#pwd');
                $('#pwd2').val('').focus();
                return false;
            }
            $('#uname').removeAttr('disabled');
            $.ajax({
                type:'post',
                url:'<?php echo U("edit");?>',
                data:$('#editForm').serialize(),
                dataType: 'json',
                success:function(result){
                    if(result.status == 1){
                        layer.msg(result.msg,{icon:1});
                    }else{
                        layer.msg(result.msg,{icon:2});
                    }
                    return false;
                },
                error:function(result){
                    layer.msg('网络错误!',{icon:2});
                }
            });
            $('#uname').attr('disabled','disabled');
            return false;
        });
    });
</script>
</body>
</html>