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
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/index');?>">栏目管理</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/add');?>">添加栏目</a></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
               <form class="layui-form" action="<?php echo U('Category/add');?>" method="post" enctype="multipart/form-data" id="addForm">
                  <div class="layui-form-item">
                    <label class="layui-form-label">上级栏目：</label>
                    <div class="layui-input-block w200" >
                      <select name="pid" lay-verify="required">
                        <option value="0">==顶级栏目==</option>
                        <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" <?php echo ($c['id']==$pid?'selected="selected"':''); ?>><?php echo ($c["html"]); echo ($c["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">栏目名称：</label>
                    <div class="layui-input-block w500">
                      <input type="text" name="catname" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">栏目类型：</label>
                    <div class="layui-input-block">
                      <input type="radio" name="type" value="1" title="栏目" checked>
                      <input type="radio" name="type" value="2" title="单篇" >
                      <input type="radio" name="type" value="3" title="链接" >
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">缩略图：</label>
                    <div class="layui-input-block">
                        <img src="" class="hide" id="thumb-img" height="100px" width="auto">
                        <input type="hidden" name="thumb" id="thumb-input" value="">
                        <input type="file" name="_thumb" id="_thumb" class="hide">
                        <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                          <i class="layui-icon">&#xe608;</i> 栏目缩略图
                        </button>
                        <button id="del-thumb" class="layui-btn layui-btn-primary hide">删除</button>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">状态：</label>
                    <div class="layui-input-block">
                      <input type="checkbox" name="status" lay-skin="switch" checked="checked" value="1">
                    </div>
                  </div>
                  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述：</label>
                    <div class="layui-input-block w500">
                      <textarea name="summary" placeholder="栏目描述..." class="layui-textarea"></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
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
      ,layer = layui.layer
      ,layedit = layui.layedit
      ,laydate = layui.laydate;

      //栏目缩略图上传
        $('#_thumb').bind('change',function(){
          fileUpload('#_thumb','<?php echo U("Article/upload");?>');
          
        });
        function fileUpload(id,url){
            var formData = new FormData();
            formData.append("file",$(id)[0].files[0]);
            $.ajax({ 
              url : url, 
              type : 'POST', 
              data : formData, 
              processData : false, 
              contentType : false,
              beforeSend:function(){
                $('.upload-btn').html('<i class="layui-icon">&#xe608;</i>正在上传...');
              },
              success : function(msg) { 
                $('#thumb-img').attr('src',msg.src).removeClass('hide').show();
                $('#thumb-input').val(msg.src);
                $('#_thumb').val('');
                $('.upload-btn').html('<i class="layui-icon">&#xe608;</i>文章缩略图').addClass('layui-btn-disabled');
                $('#del-thumb').removeClass('hide').show();
              }, 
              error : function(responseStr) { 
                console.log("error");
                } 
            });
        }
        //删除缩略图
        $('#del-thumb').click(function(){
            $('#thumb-img').attr('src','').hide();
            $('#thumb-input').val('');
            $('#_thumb').val('');
            $(this).hide();
            $('.upload-btn').removeClass('layui-btn-disabled');
            return false;
        });
        //添加栏目
        $('.submit').on('click',function(){
          $.ajax({
            url: '<?php echo U("Category/add");?>',
            type: 'POST',
            dataType: 'json',
            data: $('#addForm').serialize(),
            success: function(res){
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
</body>
</html>