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
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">栏目管理</span></div>
        </div>

        <div class="result-wrap">
            <form method="post" action="<?php echo U('Category/updateSort');?>" class="catesForm">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('Category/add');?>"><i class="icon-font"></i>新增栏目</a>
                        <a class="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a class="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content" style="max-height: 850px;overflow: auto;">
                    <table class="layui-table">
                      <thead>
                        <tr>
                            <th width="3%"><input type="checkbox"></th>
                            <th width="5%">排序</th>
                            <th>名称</th>
                            <th width="8%" align="center">栏目类型</th>
                            <th width="6%">状态</th>
                            <th width="14%">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id=<?php echo ($vo["id"]); ?> data-pid="<?php echo ($vo["pid"]); ?>">
                            <td><input class="set" type="checkbox"></td>
                            <td><input class="common-text common-text-center" size="3" type="text" value="<?php echo ($vo["sort"]); ?>" name="<?php echo ($vo["id"]); ?>"></td>
                            <td><?php echo ($vo["html"]); echo ($vo["catname"]); ?></td>
                            <td>
                                <?php switch($vo["type"]): case "1": ?>栏目<?php break;?>
                                    <?php case "2": ?>单篇<?php break;?>
                                    <?php case "3": ?>链接<?php break; endswitch;?>
                            </td>
                            <td class="layui-form">
                             
                                <input type="checkbox" <?php echo ($vo["status"]==1?'checked=""':''); ?> name="status" value="1" lay-skin="switch" lay-filter="switchTest" lay-text="显示|隐藏">
                                </td>
                            <td>
                                <div class="layui-btn-group">
                                    <a title="添加子栏目" href="<?php echo U('Category/add',array('pid'=>$vo['id']));?>" class="layui-btn layui-btn-small">
                                        <i class="layui-icon">&#xe654;</i>
                                    </a>
                                    <a title="修改" class="layui-btn layui-btn-small" href="<?php echo U('Category/edit',array('id'=>$vo['id']));?>">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
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
                            <a href="<?php echo U('Article/add');?>"><i class="icon-font"></i>新增栏目</a>
                            <a class="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                            <a class="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                        </div>
                    </div>
                </div>
            </form>
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
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['form','layer'], function(){
      layer = layui.layer,
      form = layui.form();

      //监听指定开关
      form.on('switch(switchTest)', function(data){
        layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
          offset: '6px'
        });
        layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
      });
});
    $(function(){
        //全选
        var $table = $('.result-content table');
        var $setAll = $table.find('thead input[type=checkbox]');
        var $inputs = $table.find('tbody .set');
        if(!$table || !$setAll) return false;
        $setAll.on('click',function(){
            if($(this).prop('checked')){
                $inputs.prop('checked',true);
            }else{
                $inputs.prop('checked',false);
            }
        });
        $inputs.on('click',function(){
            var seles = $inputs.filter(function(index) {
                return !$(this).prop('checked');
            });
            if(seles.length == 0){
                $setAll.prop('checked',true);
            }else{
                $setAll.prop('checked',false);
            }
        });

        //更新排序
        $('.updateOrd').on('click',function(){
            $('.catesForm').submit();
            return false;
        });

        //ajax修改状态
        $('.layui-unselect').on('click',function(){
            alert(1);
        });

        //删除单个栏目
        $('.delOne').on('click',function(){
            var $id = $(this).data('id');//获取当前栏目ID
            var $deltr = $(this).parents('tr');//获取当前栏目所在的tr节点
            var $trs = $('.result-content table tbody tr');//获取所有的栏目所在的tr节点
            var $deltrs = getChildsById($trs,$id);//获取当前栏目的子栏目所在tr节点
            
            //递归获取当前栏目的所有子栏目的节点数组
            function getChildsById(trs,pid) {
                var arr = [],length = trs.length;

                for (var i = 0; i < length; i++) {
                    if($(trs[i]).attr('data-pid') == pid){
                        arr.push(trs[i]);
                        arr = arr.concat(getChildsById(trs,$(trs[i]).attr('data-id')));
                    }
                }
                return arr;
            }

            layer.confirm('确定要删除栏目已经其子栏目？', {icon: 3, title:'提示'}, function(index){
                    //删除并移除已经删除的节点
                    doDel($id);
                    layer.close(index);
            });
            function doDel(id){
                var url = '<?php echo U("Category/del");?>';
                $.ajax({
                    type: 'get',
                    url: url,
                    data: {'id':id},
                    datatype: 'json',
                    success: function(res){
                        if(res.status == 1){
                            layer.alert(res.msg,{icon:1});
                            //移除已经删除的节点
                            $deltr.remove();
                            $($deltrs).remove();
                        }else{
                            layer.alert(res.msg,{icon:2});
                        }
                    },
                    error: function(res){
                        layer.alert(res.msg,{icon:2});
                    }
                }); 
            }
            
        });
    });
</script>
</body>
</html>