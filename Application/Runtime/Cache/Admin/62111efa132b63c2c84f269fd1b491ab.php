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
            <div class="crumb-list"><i class="iconfont">&#xe607;</i><a>首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统设置</span></div>
        </div>

        <div class="result-wrap">
            <div class="result-content" style="max-height: 600px;overflow: auto;">
              <div class="result-title">
                  <div class="result-list">
                      <div class="layui-btn-group">
                        <a class="layui-btn back" href="javascript:;">立即备份</a>
                      </div>
                  </div>
              </div>
              <fieldset class="layui-elem-field" style="min-height: 100px;">
                <div class="layui-inline">
                  <div class="layui-field-box">
                      <table class="layui-table" lay-even="" lay-skin="row">
                        <thead>
                          <tr>
                            <th width="6%">序号</th>
                            <th>文件名</th>
                            <th width="15%">备份时间</th>
                            <th>文件大小</th>
                            <th width="20%">操作</th>
                          </tr>
                        </head>
                        <tbody>
                            <?php if(!empty($lists)): if(is_array($lists)): foreach($lists as $key=>$row): if($key > 1): ?><tr>
                                            <td><?php echo ($key-1); ?></td>
                                            <td style="text-align: left"><a href="<?php echo U('System/backup',array('action'=>'download','file'=>$row));?>"><?php echo ($row); ?></a></td>
                                            <td><?php echo (getfiletime($row,$datadir)); ?></td>
                                            <td><?php echo (getfilesize($row,$datadir)); ?></td>
                                            <td>
                                              <div class="layui-btn-group">
                                                <a title="下载" href="<?php echo U('System/backup',array('action'=>'download','file'=>$row));?>" class="layui-btn">
                                                  <i class="layui-icon">&#xe601;</i>
                                                </a>
                                                <a title="还原" data-file="<?php echo ($row); ?>" href="javascript:;" class="layui-btn rl">
                                                  <i class="iconfont">&#xe634;</i>
                                                </a>
                                                <a title="删除" data-file="<?php echo ($row); ?>" href="javascript:;" class="layui-btn layui-btn-danger del">
                                                  <i class="layui-icon">&#xe640;</i>
                                                </a>
                                              </div>
                                            </td>
                                        </tr><?php endif; endforeach; endif; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="7">没有找到相关数据。</td>
                                </tr><?php endif; ?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </fieldset>
            </div>
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
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['layer','form'], function(){
        var layer = layui.layer
        ,form = layui.form();

  });
      $('.rl').on('click',function(){
          var url = "<?php echo U('System/backup');?>";
          var file = $(this).data('file');
          layer.confirm('是否还原该数据库文件!', {icon: 3, title:'提示'}, function(index){
            
            $.get(url,{'action':'RL','file':file},function(res){
              if(res.status == 1){
                layer.msg('还原成功!',{icon:1});
                 window.setTimeout(function(){
                  window.location.href = url;
                },1500);
              }else{
                layer.msg('还原出错!',{icon:2});
              }
            },'json');
            layer.close(index);
          });
          
      });
      $('.back').on('click',function(){
          var url = "<?php echo U('System/backup');?>";
          $.get(url,{'action':'backup'},function(res){
            if(res.status == 1){
              layer.msg('备份成功!',{icon:1});
              window.setTimeout(function(){
                window.location.href = url;
              },1500);
            }else{
              layer.msg('备份出错!',{icon:2});
            }
          },'json');
          layer.close(index);
          
      });
      $('.del').on('click',function(){
          var url = "<?php echo U('System/backup');?>";
          var file = $(this).data('file');
          layer.confirm('是否删除该数据库文件!', {icon: 3, title:'提示'}, function(index){
            $.get(url,{'action':'Del','file':file},function(res){
              if(res.status == 1){
                layer.msg('删除成功!',{icon:1});
                 window.setTimeout(function(){
                  window.location.href = url;
                },1500);
              }else{
                layer.msg('删除失败!',{icon:2});
              }
            },'json');
            layer.close(index);
          });
         
      });
</script>
</body>
</html>