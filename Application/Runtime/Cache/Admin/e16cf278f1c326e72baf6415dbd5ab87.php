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
                        <li><a href="<?php echo U('System/index');?>"><i class="icon-font">&#xe017;</i>系统信息</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/index');?>">文章管理</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/add');?>">添加文章</a></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
               <form class="layui-form " action="<?php echo U('Article/add');?>" method="post" enctype="multipart/form-data" id="addForm">
                  <div class="layui-form-item">
                    <label class="layui-form-label">栏目：</label>
                    <div class="layui-input-block w200" >
                      <select name="catid" lay-verify="required">
                        <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" <?php echo ($c['id']==$pid?'selected="selected"':''); ?>><?php echo ($c["html"]); echo ($c["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">标题：</label>
                    <div class="layui-input-block w500">
                      <input type="text" name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">内容：</label>
                    <div class="layui-input-block">
                      <textarea name="content" class="layui-textarea" id="LAY_edit" style="display: none"></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">缩略图：</label>
                    <div class="layui-input-block">
                        <img src="" class="hide" id="thumb-img" height="100px" width="auto">
                        <input type="hidden" name="thumb" id="thumb-input" value="">
                        <input type="file" name="_thumb" id="_thumb" class="hide">
                        <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                          <i class="layui-icon">&#xe608;</i> 文章缩略图
                        </button>
                        <button id="del-thumb" class="layui-btn layui-btn-primary hide">删除</button>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">状态：</label>
                    <div class="layui-input-block">
                      <input type="checkbox" name="is_top" title="置顶" value="1">
                      <input type="checkbox" name="is_rec" title="推荐" checked="" value="1">
                      <input type="checkbox" name="is_hot" title="热门" value="1">
                    </div>
                  </div>
                  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">摘要：</label>
                    <div class="layui-input-block w500">
                      <textarea name="summary" placeholder="文章摘要..." class="layui-textarea"></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <div class="layui-inline">
                      <label class="layui-form-label">添加日期：</label>
                      <div class="layui-input-block">
                        <input type="text" name="addtime" id="date" lay-verify="date" placeholder="yyyy-mm-dd" autocomplete="off" class="layui-input" onclick="layui.laydate({elem: this,format: 'YYYY-MM-DD'})">
                      </div>
                    </div>
                    <div class="layui-inline">
                      <label class="layui-form-label">作者：</label>
                      <div class="layui-input-block">
                        <input type="tel" name="author" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                    <div class="layui-inline">
                      <label class="layui-form-label">别名：</label>
                      <div class="layui-input-block">
                        <input type="tel" name="alias" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                  </div>
                  
                   <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button type="submit" class="layui-btn submit" lay-submit="" >添加</button>
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
</script>

<script type="text/javascript">
    layui.use(['form', 'layedit', 'laydate'], function(){
      var form = layui.form()
      ,layedit = layui.layedit
      ,laydate = layui.laydate;

      //创建一个编辑器
        layedit.set({
          uploadImage: {
            url: '<?php echo U("Article/editImgUpload");?>'
          }
        });

        var editIndex = layedit.build('LAY_edit');

        //文章缩略图上传
        $('#_thumb').bind('change',function(){
          //限制文件类型与大小
          var options = {
            'filePath': $(this).val()
          };
          //调用上传方法
          fileUpload(options,'#_thumb','<?php echo U("Article/upload");?>');
        });

        //添加文章
        /*$('.submit').on('click',function(){
          $.ajax({
            url: '<?php echo U("Article/add");?>',
            type: 'POST',
            dataType: 'json',
            data: $('#addForm').serialize(),
            success: function(data){
              layer.msg(data.msg, {icon: 6});
              window.setTimeout(function(){
                window.location.href = "<?php echo U('Article/index');?>";
              },1200);
            }
          });
          return false;
        });*/
    });
</script>
</body>
</html>