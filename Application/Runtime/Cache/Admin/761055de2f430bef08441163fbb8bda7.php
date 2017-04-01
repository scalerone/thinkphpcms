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
                <li><a href="/" target="_blank"><i class="iconfont">&#xe6fa;</i>前台首页</a></li>
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
            <div class="crumb-list"><i class="iconfont">&#xe607;</i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/index');?>">文章管理</a><span class="crumb-step">&gt;</span><a class="crumb-name">修改文章</a></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
               <form class="layui-form " action="<?php echo U('Article/edit');?>" method="post" enctype="multipart/form-data" id="addForm">
                  <div class="layui-form-item">
                    <label class="layui-form-label">栏目：</label>
                    <div class="layui-input-block w200" >
                      <select name="catid" lay-verify="required">
                        <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" <?php echo ($c['id']==$article['catid']?'selected="selected"':''); ?>><?php echo ($c["html"]); echo ($c["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">标题：</label>
                    <div class="layui-input-block w500">
                      <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo ($article["title"]); ?>">
                    </div>
                  </div>
                  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">摘要：</label>
                    <div class="layui-input-block w500">
                      <textarea name="summary" placeholder="文章摘要..." class="layui-textarea"><?php echo ($article["summary"]); ?></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">内容：</label>
                    <div class="layui-input-block">
                      <textarea name="content" id="content" style="height: 450px;"><?php echo ($article["content"]); ?></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">缩略图：</label>
                    <div class="layui-input-block">
                        <img src="<?php echo ($article["thumb"]); ?>" <?php echo ($article['thumb']==''?'class="thumb-img hide"':'class="thumb-img"'); ?> height="100px" width="auto">
                        <input type="hidden" name="thumb" class="thumb-input" value="<?php echo ($article["thumb"]); ?>">
                        <input type="file" name="_thumb" id="_thumb" class="hide">
                        <button class="layui-btn upload-btn <?php echo ($article['thumb']==''?'':'hide'); ?>" onclick="_thumb.click();return false;">
                          <i class="layui-icon">&#xe608;</i> 文章缩略图
                        </button>
                        <button class="del-thumb layui-btn layui-btn-primary <?php echo ($article['thumb']==''?'hide':''); ?>">删除</button>
                    </div>
                  </div>
                  <div class="layui-form-item" pane="">
                    <label class="layui-form-label">状态：</label>
                    <div class="layui-input-block">
                      <input type="checkbox" lay-skin="primary" name="is_top" title="置顶" value="1" <?php echo ($article['is_top']=='1'?'checked=""':''); ?>>
                      <input type="checkbox" lay-skin="primary" name="is_rec" title="推荐" <?php echo ($article['is_rec']=='1'?'checked=""':''); ?> value="1">
                      <input type="checkbox" lay-skin="primary" name="is_hot" title="热门" value="1" <?php echo ($article['is_hot']=='1'?'checked=""':''); ?>>
                    </div>
                  </div>
                  
                  <div class="layui-form-item">
                    <div class="layui-inline">
                      <label class="layui-form-label">添加日期：</label>
                      <div class="layui-input-block">
                        <input type="text" name="addtime" value="<?php echo (date('Y-m-d',$article["addtime"])); ?>" id="date" lay-verify="date" placeholder="yyyy-mm-dd" autocomplete="off" class="layui-input" onclick="layui.laydate({elem: this,format: 'YYYY-MM-DD'})">
                      </div>
                    </div>
                    <div class="layui-inline">
                      <label class="layui-form-label">作者：</label>
                      <div class="layui-input-block">
                        <input type="tel" value="<?php echo ($article["author"]); ?>" name="author" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                    <div class="layui-inline">
                      <label class="layui-form-label">别名：</label>
                      <div class="layui-input-block">
                        <input type="tel" name="alias" value="<?php echo ($article["alias"]); ?>" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">附件：</label>

                    <div class="layui-inline files_dom" style="width:auto;">
                        <div class="layui-btn-group">
                          <label class="layui-btn">
                            选择文件<input type="file" multiple class="selectFile" name="article_file" value="附件" style="width:1px;opacity: 0;height: 1;display: none;">
                          </label>
                          <a class="layui-btn layui-btn-primary uploadBtn" style="width:auto;display: none;">开始上传</a>
                        </div>
                      <?php if(!empty($article["files"])): ?><table class="fileTable layui-table" lay-even="" lay-skin="row">   
                            <colgroup>    
                              <col width="300">    
                              <col width="80">    
                              <col width="130">    
                              <col width="360">    
                              <col width="100">    
                              <col>   
                            </colgroup>   
                          <thead>
                            <tr>
                              <th>文件名</th>
                              <th>类型</th>
                              <th>大小</th>
                              <th>进度</th>
                              <th>操作</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(is_array($article["files"])): foreach($article["files"] as $key=>$f): ?><tr>
                              <td>
                                <input type="hidden" name="files_id[]" value="<?php echo ($f["id"]); ?>">
                                <input type="hidden" name="files_name[]" value="<?php echo ($f["filename"]); ?>">
                                <input type="hidden" class="hid_file" name="article_files[]" value="<?php echo ($f["fileurl"]); ?>"><?php echo ($f["filename"]); ?>
                              </td>
                              <td>
                                <input type="hidden" class="hid_file_type" name="files_type[]" value="<?php echo ($f["filetype"]); ?>"><?php echo ($f["filetype"]); ?>
                              </td>
                              <td>
                                <input type="hidden" class="hid_file_size" name="files_size[]" value="<?php echo ($f["filesize"]); ?>"><?php echo ($f["filesize"]); ?>
                              </td>
                              <td>
                                <div class="layui-progress">
                                  <div class="layui-progress-bar" lay-percent="100%"></div>
                                </div>
                              </td>
                              <td>
                                <a class="layui-btn layui-btn-danger layui-btn-mini delfilebtn">删除</a>
                              </td>
                            </tr><?php endforeach; endif; ?>
                          </tbody>
                        </table><?php endif; ?>
                    </div>
                  
                   <div class="layui-form-item">
                    <div class="layui-input-block">
                      <input type="hidden" name="id" value="<?php echo ($article["id"]); ?>">
                      <button type="submit" class="layui-btn submit" lay-submit="" >修改</button>
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
    layui.use(['form', 'layedit', 'laydate'], function(){
      var form = layui.form()
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

        
    });
</script>
<script type="text/javascript">
  var ue = UE.getEditor('content');
  (function(){
    //上传文件附件
    ajaxUploadArticleFiles("<?php echo U('Article/uploadFiles');?>");

    $('.delfilebtn').on('click',function(){
        var del = $('.delfilebtn');
        var oTr = $(this).parents("tr");
        var index = oTr.index();
        var table = $(this).parents('.fileTable');
        
        if(del && del.length==1){
          table.remove();
          $('.uploadBtn').hide();

          if(flieList && sizeObj){
            flieList.empty(); //删除数据
            sizeObj.empty(); //删除文件大小数组中的项
          }
        }else{
          
          oTr.remove();   //删除这一行
          if(flieList && sizeObj){
            flieList.splice(index,1); //删除数据
            sizeObj.splice(index,1);  //删除文件大小数组中的项
          }
         
        }

      });
  })()
</script>
</body>
</html>