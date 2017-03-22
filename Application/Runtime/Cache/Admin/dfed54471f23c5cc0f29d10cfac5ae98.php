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
<script type="text/javascript" charset="utf-8" src="/./Application/Admin/Public/plugin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/./Application/Admin/Public/plugin/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/./Application/Admin/Public/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>
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
                        <dd><a href="<?php echo U('Comment/index');?>"><i class="iconfont">&#xe621;</i>评论管理</a></dd>
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
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont">&#xe60e;</i>扩展功能</a>
                    <dl class="layui-nav-child pdleft">
                        <dd><a href="system.html"><i class="iconfont">&#xe64f;</i>语言设置</a></dd>
                    </dl>
                </li>
            </ul>


            
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="iconfont">&#xe607;</i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/index');?>">栏目管理</a><span class="crumb-step">&gt;</span><a class="crumb-name">修改栏目</a></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
               <form class="layui-form" action="<?php echo U('Category/edit');?>" method="post" enctype="multipart/form-data" id="addForm">
                  <div class="layui-form-item">
                    <label class="layui-form-label">上级栏目：</label>
                    <div class="layui-input-block w200" >
                      <select name="pid" lay-verify="required">
                        <option value="0">==顶级栏目==</option>
                        <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" <?php echo ($c['id']==$cate['pid']?'selected="selected"':''); ?>><?php echo ($c["html"]); echo ($c["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">栏目名称：</label>
                    <div class="layui-input-block w500">
                      <input type="text" name="catname" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo ($cate["catname"]); ?>">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">栏目类型：</label>
                    <div class="layui-input-block">
                      <input <?php echo ($cate['type']==1?'checked':''); ?> disabled="" type="radio" name="type" value="1" title="栏目">
                      <input <?php echo ($cate['type']==2?'checked':''); ?> disabled="" type="radio" name="type" value="2" title="单篇" >
                      <input <?php echo ($cate['type']==3?'checked':''); ?> disabled="" type="radio" name="type" value="3" title="链接" >
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">缩略图：</label>
                    <div class="layui-input-block">
                      <img src="<?php echo ($cate['thumb']); ?>" class="<?php echo ($cate['thumb']==''?'hide':''); ?> thumb-img" height="100px" width="auto">
                        <input type="hidden" name="thumb" class="thumb-input" value="<?php echo ($cate['thumb']); ?>">
                        <input type="file" id="_thumb" class="hide">
                        <button class="layui-btn upload-btn <?php echo ($cate['thumb']==''?'':'hide'); ?>" onclick="_thumb.click();return false;">
                          <i class="layui-icon">&#xe608;</i> 栏目缩略图
                        </button>
                        <button class="del-thumb layui-btn layui-btn-primary <?php echo ($cate['thumb']==''?'hide':''); ?>">删除</button>
                    </div>
                  </div>

                  <div class="layui-form-item <?php echo ($cate['type']==2?'':'hide'); ?> content">
                    <label class="layui-form-label ">内容：</label>
                    <div class="layui-input-block">
                      <textarea name="content" id="content" style="height: 450px;"><?php echo ($cate['content']); ?></textarea>
                    </div>
                  </div>

                  <div class="layui-form-item <?php echo ($cate['type']==3?'':'hide'); ?> link">
                    <label class="layui-form-label ">链接地址：</label>
                    <div class="layui-input-block w500">
                      <input type="text" name="url" placeholder="请输入地址" autocomplete="off" class="layui-input" value="<?php echo ($cate["url"]); ?>">
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">状态：</label>
                    <div class="layui-input-inline" style="width:auto;">
                      <input type="checkbox" name="status" lay-skin="switch" <?php echo ($cate['status']=='1'?'checked="checked"':''); ?> value="1" lay-text="开启|关闭">
                    </div>
                    <label class="layui-form-label">模版文件：</label>
                    <div class="layui-input-inline" style="width:auto;">
                      <select name="template" lay-verify="required">
                        <?php if(is_array($templates)): $i = 0; $__LIST__ = $templates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><option value="<?php echo ($t); ?>" <?php echo ($t==$cate['template']?'selected="selected"':''); ?>><?php echo ($t); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="checkbox" value="1" lay-verify="sub" name="app_sub" lay-skin="primary" title="应用到子栏目" <?php echo ($cate['app_sub']='1'?'checked=""':''); ?>>
                    </div>
                  </div>


                  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述：</label>
                    <div class="layui-input-block w500">
                      <textarea name="summary" placeholder="栏目描述..." class="layui-textarea"><?php echo ($cate['summary']); ?></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <div class="layui-inline">
                      <label class="layui-form-label">别名：</label>
                      <div class="layui-input-block">
                        <input type="tel" name="alias" autocomplete="off" class="layui-input" value="<?php echo ($cate['alias']); ?>">
                      </div>
                    </div>
                  </div>
                   <div class="layui-form-item">
                    <div class="layui-input-block">
                      <input type="hidden" name="id" value="<?php echo ($cate["id"]); ?>">
                      <button type="submit" class="layui-btn submit" lay-submit="" >修改</button>
                      <a href="javascript:window.history.go(-1);" class="layui-btn layui-btn-warm">返回</a>
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
    layui.use(['form', 'layedit', 'laydate'], function(){
      var form = layui.form()
      ,layer = layui.layer
      ,layedit = layui.layedit
      ,laydate = layui.laydate;

        //文章缩略图上传
        $('#_thumb').bind('change',function(){
          //限制文件类型与大小
          var options = {
            'filePath': $(this).val()
          };
          //调用上传方法
          fileUpload(options,'#_thumb','<?php echo U("Article/upload");?>');
        });

        form.on('radio(default)', function(data){
          if(data.elem.checked){
            $('.content,.link').hide();
          }
        });

        form.on('radio(singer)', function(data){
          if(data.elem.checked){
            $('.content').removeClass('hide').show();
            $('.link').hide();
          }
        });

        form.on('radio(link)', function(data){
          if(data.elem.checked){
            $('.link').removeClass('hide').show();
            $('.content').hide();
          }
        });

        
        //添加栏目
        $('.submit').on('click',function(){
          $.ajax({
            url: '<?php echo U("Category/edit");?>',
            type: 'POST',
            dataType: 'json',
            data: $('#addForm').serialize(),
            success: function(res){
              console.log(res);
              if(res.status == 0){
                layer.msg(res.msg, {icon: 2});
              }else{
                layer.msg(res.msg, {icon: 1});
                window.setTimeout(function(){
                  window.location.href = "<?php echo U('Category/index');?>";
                },1500);
              }
            }
          });
          return false;
        });
    });
</script>
<script type="text/javascript">
  var ue = UE.getEditor('content');
</script>
</body>
</html>