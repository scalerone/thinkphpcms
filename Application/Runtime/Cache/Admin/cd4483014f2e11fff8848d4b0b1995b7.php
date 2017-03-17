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
            <div class="crumb-list"><i class="iconfont">&#xe607;</i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">会员管理</span></div>
        </div>

        <div class="result-wrap">
            <form method="post" action="" class="sortForm layui-form">
                <div class="result-title">
                    <div class="result-list">
                        <a class="addMember" href="#"><i class="iconfont">&#xe762;</i>添加会员</a>
                    </div>
                </div>
                <div class="result-content" style="max-height: 850px;overflow: auto;">
                    <table class="layui-table">
                      <thead>
                        <tr>
                            <th width="3%"><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                            <th width="10%">用户名</th>
                            <th>邮箱</th>
                            <th width="14%">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php if(is_array($members)): $i = 0; $__LIST__ = $members;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id=<?php echo ($vo["id"]); ?>>
                            <td><input class="set" type="checkbox" value="<?php echo ($vo["id"]); ?>" lay-skin="primary"></td>
                            <td><?php echo ($vo["name"]); ?>
                                <?php if($vo["avatar"] != '' ): ?><i style="cursor: pointer;vertical-align: middle;" class="layui-icon icon-thumb" data-src="<?php echo ($vo["avatar"]); ?>">&#xe64a;</i>
                                <?php else: endif; ?>
                            </td>
                            <td><?php echo ($vo["email"]); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <a title="修改" class="editLink layui-btn layui-btn-small" href="<?php echo U('Member/edit',array('id'=>$vo['id']));?>">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a title="删除" class="layui-btn layui-btn-small layui-btn-danger delOneLink" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                      </tbody>
                    </table>
                    <div class="result-title">
                        <div class="result-list">
                            <a class="addMember" href="#"><i class="iconfont">&#xe762;</i>添加会员</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="addWrap" style="display: none; padding-top:10px;padding-right:10px;padding-bottom: 10px;">
        <form class="layui-form" action="">
          <div class="layui-form-item">
            <label class="layui-form-label wid_auto">用户名</label>
            <div class="layui-input-block margin-left80">
              <input type="text" name="name" required  lay-verify="required" placeholder="请输入标用户名" autocomplete="off" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label wid_auto">密码</label>
            <div class="layui-input-block margin-left80">
              <input type="text" name="pass" required  lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label wid_auto">邮箱</label>
            <div class="layui-input-block margin-left80">
              <input type="text" name="email" required  lay-verify="" placeholder="" autocomplete="off" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label wid_auto">头像</label>
            <div class="layui-input-block margin-left80">
                <img src="" class="hide thumb-img" height="80px" width="auto">
                <input type="hidden" name="avatar" class="thumb-input" value="">
                <input type="file" id="_thumb" class="hide">
                <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                  <i class="layui-icon">&#xe608;</i> 上传头像
                </button>
                <button class="del-thumb layui-btn layui-btn-primary hide">删除</button>
            </div>
          </div>

          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label wid_auto">简介</label>
            <div class="layui-input-block margin-left80">
              <textarea name="intro" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-input-block">
              <button class="layui-btn" lay-submit lay-filter="formDemo">立即添加</button>
            </div>
          </div>
        </form>
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
    layui.use(['form','layer'], function(){
        var layer = layui.layer
        ,form = layui.form();

        //全选
        form.on('checkbox(allChoose)', function(data){
          var child = $(data.elem).parents('table').find('tbody .set');
          child.each(function(index, item){
            item.checked = data.elem.checked;
          });
          form.render('checkbox');
        });

        //监听提交
        form.on('submit(formDemo)', function(data){
          $.ajax({
            url: '<?php echo U("Member/add");?>',
            type: 'post',
            dataType: 'json',
            data: $(data.form).serialize(),
            success: function(res){
              if(res.status == 1){
                layer.alert(res.msg,{icon:1});   
                window.setTimeout(function(){
                  window.location.href = "<?php echo U('Member/index');?>";
                },1500);
              }else{
                layer.alert(res.msg,{icon:2}); 
              }
            },
            error: function(res){
              console.log(res);
            }
          });
          return false;
        });
});

    //文章缩略图上传
    $('#_thumb').bind('change',function(){
      //限制文件类型与大小
      var options = {
        'filePath': $(this).val()
      };
      //调用上传方法
      fileUpload(options,'#_thumb','<?php echo U("Article/upload");?>');
    });

    //删除单个
    $(function(){
        $('.delOneLink').on('click',function(){
                $trEle = $(this).parents('tr');//当前的tr节点
                var url = "<?php echo U('Member/del');?>";//提交删除的地址
                var eleId = $trEle.data('id');//当前的id
                //提示
                layer.confirm('确定要删除该用户？', {icon: 3, title:'提示'}, function(index){
                ajaxDeleteElems(eleId,url,'post',$trEle);
            });
        });
    });
    //添加会员
    $('.addMember').click(function(){
        layer.open({
          type: 1,
          title: '添加会员',
          closeBtn: 1,
          area: ['460px', 'auto'],
          shadeClose: true,
          content: $('#addWrap'),
        });
    });

</script>
</body>
</html>