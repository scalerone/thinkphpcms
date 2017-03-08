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
                <li><a href="javascript:;" class="clearCache">更新缓存</a></li>
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
                        <li><a href="javascript:;" class="clearCache"><i class="icon-font">&#xe037;</i>清空缓存</a></li>
                        <li><a href="<?php echo U('Data/backup');?>"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="<?php echo U('Data/reduct');?>"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>扩展功能</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>静态页面</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>语言设置</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="<?php echo U('Article/search');?>" method="post" class="searchForm">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select style="height:28px;" name="catid" class="common-text">
                                    <option value="0">全部</option>
                                    <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" {($c['id']==$pid || $c['id']==$post['catid'])?'selected="selected"':''}><?php echo ($c["html"]); echo ($c["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="<?php echo ($post["keywords"]); ?>" type="text"></td>
                            <td><input class="layui-btn layui-btn-small btn2" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form method="post" action="<?php echo U('Article/updateSort');?>" class="sortForm ">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('Article/add');?>"><i class="icon-font"></i>新增文章</a>
                        <a id="batchDelArticle" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateSortArticle" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                        <div class="inline-block removebox">
                            <select style="height:28px;" name="catid" class="common-text selectCatid">
                                <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" {($c['id']==$pid || $c['id']==$post['catid'])?'selected="selected"':''}><?php echo ($c["html"]); echo ($c["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <input id="removeArticle" class="ml10 layui-btn layui-btn-small btn2" value="批量移动" type="button">
                        </div>
                    </div>
                </div>
                <div class="result-content">
                    <table class="layui-table layui-form">
                      <thead>
                        <tr>
                            <th width="3%"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                            <th width="5%">排序</th>
                            <th>标题</th>
                            <th width="6%">点击</th>
                            <th width="10%">发布人</th>
                            <th width="15%">添加时间</th>
                            <th width="12%">状态</th>
                            <th width="12%">操作</th>
                        </tr> 
                      </thead>
                      <tbody>
                        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($a["id"]); ?>">
                                <td><input class="set" value="<?php echo ($a["id"]); ?>" type="checkbox" lay-skin="primary"></td>
                                <td><input class="common-text common-text-center" size="3" type="text" value="<?php echo ($a["sort"]); ?>" name="<?php echo ($a["id"]); ?>"></td>
                                <td><?php echo (substr($a["title"],0,27)); ?>
                                <?php if($a["thumb"] != '' ): ?><i style="cursor: pointer;vertical-align: middle;" class="layui-icon icon-thumb" data-src="<?php echo ($a["thumb"]); ?>">&#xe64a;</i>
                                <?php else: endif; ?>
                                </td>
                                <td><?php echo ($a["hits"]); ?></td>
                                <td><?php echo ($a["author"]); ?></td>
                                <td><?php echo (date("Y-m-d h:m:s",$a["addtime"])); ?></td>
                                <td>
                                    <?php echo ($a['is_rec']==1?'<span class="text-info">推荐</span>':''); ?>
                                    <?php echo ($a['is_top']==1?'<span class="text-success">置顶</span>':''); ?>
                                    <?php echo ($a['is_hot']==1?'<span class="text-hot">热门</span>':''); ?>
                                </td>
                                <td>
                                    <div class="layui-btn-group">
                                        <a title="修改" class="layui-btn layui-btn-small" href="<?php echo U('Article/edit',array('id'=>$a['id']));?>">
                                            <i class="layui-icon">&#xe642;</i>
                                        </a>
                                        <a title="删除" class="layui-btn layui-btn-small layui-btn-danger delOneArticle" href="javascript:;">
                                            <i class="layui-icon">&#xe640;</i>
                                        </a>
                                    </div>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                      </tbody>
                    </table>
                    <div id="pages">
                        <?php echo ($page); ?>
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
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['layer','form'], function(){
            var form = layui.form();
          var layer = layui.layer;
          //全选
          form.on('checkbox(allChoose)', function(data){
            var child = $(data.elem).parents('table').find('tbody .set');
            child.each(function(index, item){
              item.checked = data.elem.checked;
            });
            form.render('checkbox');
          });
    });
    //复选框选中后显示移动栏目下拉菜单和按钮
    $('#removeArticle').on('click',function(){
        $trs = $('.result-content table tbody tr input:checked');
        if(!$trs.length){
            layer.alert('请选中需要移动的文章!', {icon: 2});
            return;
        }
        //获取选中的ID
        var ids = [];
        $trs.filter(function(index) {
            return ids.push($($trs[index]).val());
        });
        //ids = ids.join(',');
        //获取移动到的栏目的ID
        var $catid = $('.selectCatid').val();
        var url = '<?php echo U("Article/remove");?>';
        var redirectUrl = '<?php echo U("Article/index");?>';
        removeArticle(ids,url,$catid,redirectUrl);
        //ajax移动文章
        function removeArticle(ids,url,catid,redirectUrl){
            $.ajax({
                url: url,
                dataType: 'json',
                data: {'ids': ids,'catid': catid},
                success: function(res){
                    if(res.status == 1){
                        layer.alert(res.msg, {icon: 1});
                        window.setTimeout(function(){
                            window.location.href = redirectUrl;
                        },1500);
                    }else{
                        layer.alert(res.msg, {icon: 2});
                    }
                },
                error: function(res){
                    layer.alert(res.msg, {icon: 2});
                }
            })
        }
    });
    //删除单个文章
    $(function(){
        $('.delOneArticle').on('click',function(){
                $trEle = $(this).parents('tr');//当前栏目的tr节点
                var url = "<?php echo U('Article/del');?>";//提交删除的地址
                var eleId = $trEle.data('id');//当前文章的id
                var flag = true;
                //提示
                layer.confirm('确定要删除该文章？', {icon: 3, title:'提示'}, function(index){
                delArticleById(eleId,url,'get',$trEle);
            });
        });
    });
    //批量删除文章
    $(function(){
        $('#batchDelArticle').on('click',function(){
            //获取所有选中的文章
            $trs = $('.result-content table tbody tr input:checked');
            if(!$trs.length){
                layer.alert('请选中需要删除的文章!', {icon: 2});
                return;
            }
            //获取选中的ID
            var ids = [];
            $trs.filter(function(index) {
                return ids.push($($trs[index]).val());
            });

            var url = "<?php echo U('Article/del');?>";//提交删除的地址
            ids = ids.join(',');
            $elems = $trs.parents('tr');
            //提示
            layer.confirm('确定要删除选中的文章吗？', {icon: 3, title:'提示'}, function(index){
                delArticleById(ids,url,'get',$elems);
            });
        });
    });
    
    //批量更新栏目排序
    $(function(){
        $('#updateSortArticle').on('click',function(){
          $('.sortForm').submit();return;
        });
    });
</script>
</body>
</html>