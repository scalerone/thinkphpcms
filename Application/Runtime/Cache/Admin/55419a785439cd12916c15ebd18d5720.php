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
            <form method="post" action="" class="sortForm">
                <div class="result-title">
                    <div class="result-list">
                        <a class="addRule" href="javascript:;"><i class="icon-font"></i>添加权限</a>
                    </div>
                </div>
                <div class="result-content" style="max-height: 600px;overflow: auto;">
                    <table class="layui-table">
                      <thead>
                        <tr>
                            <!-- <th width="3%"><input type="checkbox"></th> -->
                            <th width="15%">名称</th>
                            <th width="25%">规则</th>
                            <th width="15%">添加时间</th>
                            <th width="10%">状态</th>
                            <th width="10%">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php if(is_array($rules)): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id=<?php echo ($vo["id"]); ?> data-pid="<?php echo ($vo["pid"]); ?>">
                            <!-- <td><input class="set" type="checkbox" value="<?php echo ($vo["id"]); ?>"></td> -->
                            <td><?php echo ($vo["html"]); echo ($vo["title"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["createtime"])); ?></td>
                            <td class="layui-form">
                              <input type="checkbox" value="<?php echo ($vo["status"]); ?>" name="status" lay-filter="status" lay-skin="switch" lay-text="开启|关闭"<?php echo ($vo['status']=='1'?'checked="checked"':''); ?>>
                            </td>
                            <td>
                                <div class="layui-btn-group">
                                    <!-- <a title="添加子权限" class="layui-btn layui-btn-small <?php echo ($vo['pid']==0?'':'layui-btn-disabled'); ?> addSub" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>">
                                        <i class="layui-icon">&#xe654;</i>
                                    </a> -->
                                    <a title="删除" class="layui-btn layui-btn-small layui-btn-danger delOne" href="javascript:;" data-id="<?php echo ($vo["id"]); ?>">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                      </tbody>
                    </table>
                    <div class="result-title">
                        <div class="result-list">
                            <a class="addRule" href="#"><i class="icon-font"></i>添加权限</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="addWrap" style="display: none; padding-top:10px;padding-right:10px;padding-bottom: 10px;">
        <form class="layui-form" action="">

          <div class="layui-form-item">
            <label class="layui-form-label ">上级权限</label>
            <div class="layui-input-inline ">
              <select name="pid" lay-verify="required">
                <option value="0">==顶级权限==</option>
                <?php if(is_array($topRule)): $i = 0; $__LIST__ = $topRule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;?><option value="<?php echo ($top["id"]); ?>"><?php echo ($top["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label ">名称</label>
            <div class="layui-input-inline ">
              <input type="text" name="title" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label ">规则</label>
            <div class="layui-input-inline ">
              <input type="text" name="name" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label ">状态</label>
            <div class="layui-input-inline ">
                <input type="checkbox" value="1" name="status" lay-skin="switch" checked="checked">
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
</script>
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['form','layer'], function(){
        var layer = layui.layer
        ,form = layui.form();

        //监听开关时间
        form.on('switch(status)', function(data){
          var id = $(data.elem).parents('tr').data('id');
          var status = 0;
          var url = "<?php echo U('Rule/updateStatus');?>";
          if(data.elem.checked){
            status = 1;
          }
          $.ajax({
              url: url,
              type: 'post',
              dataType: 'json',
              data: {'id': id,'status':status},
              success: function(res){
                if(res.status == 1){
                  layer.msg(res.msg,{icon:1});
                }else{
                  layer.msg(res.msg,{icon:2});
                }
              },
              error: function(res){
                layer.msg('出现错误!',{icon:2});
              }
            });
        });  

        //监听提交
        form.on('submit(formDemo)', function(data){
          $.ajax({
            url: '<?php echo U("Rule/add");?>',
            type: 'post',
            dataType: 'json',
            data: $(data.form).serialize(),
            success: function(res){
              if(res.status == 1){
                layer.alert(res.msg,{icon:1});   
                window.setTimeout(function(){
                  window.location.href = "<?php echo U('Rule/index');?>";
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


    //删除
    $(function(){
        $('.delOne').on('click',function(){
                var $trEle = $(this).parents('tr');//当前的tr节点
                var url = "<?php echo U('Rule/del');?>";//提交删除的地址
                var eleId = $trEle.data('id');//当前的id

                var $trs = $('.result-content table tbody tr');//获取所有的栏目所在的tr节点
                var $deltrs = getChildsById($trs,eleId);//获取当前栏目的子栏目所在tr节点
                console.log($deltrs);
                debugger;
                //递归获取当前栏目的所有子栏目的节点数组
                /**
                 * [getChildsById description]
                 * @param  {[array]} trs [tr节点数组]
                 * @param  {[int]} pid [tr节点父栏目ID]
                 * @return {[array]}     [重组后的array]
                 */
                function getChildsById(trs,pid) {
                    var arr = [],length = trs.length;

                    for (var i = 0; i < length; i++) {
                        if($(trs[i]).data('pid') == pid){
                            arr.push(trs[i]);
                            arr = arr.concat(getChildsById(trs,$(trs[i]).data('id')));
                        }
                    }
                    return arr;
                }
                //提示
                layer.confirm('确定要删除该权限吗？', {icon: 3, title:'提示'}, function(index){
                ajaxDeleteElems(eleId,url,'post',$deltrs,$trEle);
            });
        });
    });
    //添加权限
    $('.addRule').click(function(){
        layer.open({
          type: 1,
          title: '添加权限',
          closeBtn: 1,
          area: ['380px', 'auto'],
          shadeClose: true,
          content: $('#addWrap'),
        });
    });
</script>
</body>
</html>