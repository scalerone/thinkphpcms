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
            <div class="crumb-list"><i class="icon-font"></i><a>首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统设置</span></div>
        </div>

        <div class="result-wrap">
            <form method="post" action="" class="layui-form sortForm">
                <div class="result-content" style="max-height: 600px;overflow: auto;">
                    <fieldset class="layui-elem-field layui-field-title">
                    <legend>系统设置</legend>
                  </fieldset>
                   
                  <div class="layui-tab layui-tab-card">
                    <ul class="layui-tab-title">
                      <li class="layui-this">网站信息</li>
                      <li>底部信息</li>
                      <li>SEO设置</li>
                      <li>附件上传</li>
                      <li>水印设置</li>
                      <li>第三方代码</li>
                    </ul>
                    <div class="layui-tab-content" style="min-height: 360px;">
                      <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                          <label class="layui-form-label">站点标题</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">站点地址</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="http://www.baidu.com">
                          </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站LOGO</label>
                            <div class="layui-input-inline">
                                <img src="" class="hide" id="thumb-img" height="100px" width="auto">
                                <input type="hidden" name="thumb" id="thumb-input" value="">
                                <input type="file" name="_thumb" id="_thumb" class="hide">
                                <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                                  <i class="layui-icon">&#xe608;</i> 上传
                                </button>
                                <button id="del-thumb" class="layui-btn layui-btn-primary hide">删除</button>
                            </div>
                          </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">ICO图标</label>
                          <div class="layui-input-inline">
                              <img src="" class="hide" id="thumb-img" height="100px" width="auto">
                              <input type="hidden" name="thumb" id="thumb-input" value="">
                              <input type="file" name="_thumb" id="_thumb" class="hide">
                              <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                                <i class="layui-icon">&#xe608;</i> 上传
                              </button>
                              <button id="del-thumb" class="layui-btn layui-btn-primary hide">删除</button>
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">电话</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">手机</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">传真</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">Email</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                      </div>

                      <div class="layui-tab-item">
                        <div class="layui-form-item">
                          <label class="layui-form-label">版权信息</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">地址邮编</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input" placeholder="">
                          </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                          <label class="layui-form-label">其他信息</label>
                          <div class="layui-input-block">
                            <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="layui-tab-item">
                        <div class="layui-form-item">
                          <label class="layui-form-label">Title</label>
                          <div class="layui-input-block">
                            <input type="text" name="title" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">Keywords</label>
                          <div class="layui-input-block">
                            <input type="text" name="keywords" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">Description</label>
                          <div class="layui-input-block">
                            <input type="text" name="description" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                      </div>

                      <div class="layui-tab-item">
                         <div class="layui-form-item">
                            <label class="layui-form-label">上传大小</label>
                            <div class="layui-input-inline">
                              <input type="text" name="description" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">单位MB</div>
                          </div> 
                          <div class="layui-form-item">
                            <label class="layui-form-label">允许类型</label>
                            <div class="layui-input-inline">
                              <input type="text" name="description" autocomplete="off" value="jpg|png|jpeg|rar|zip|doc|docx|gif|ppt|xsl|txt|mp3|mp4|avi" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">请使用|隔开</div>
                          </div>
                      </div>

                      <div class="layui-tab-item">
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">开启水印</label>
                            <div class="layui-input-block">
                              <input type="radio" name="sex" value="0" title="是">
                              <input type="radio" name="sex" value="1" title="否" checked>
                            </div>
                          </div>
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">水印类型</label>
                            <div class="layui-input-block">
                              <input type="radio" name="sex" value="0" title="图片水印">
                              <input type="radio" name="sex" value="1" title="文字水印" checked>
                            </div>
                          </div>
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">添加方式</label>
                            <div class="layui-input-block">
                              <input type="checkbox" name="like1[write]" lay-skin="primary" title="内容页图片添加" checked="">
                              <input type="checkbox" name="like1[read]" lay-skin="primary" title="缩略图片添加">
                            </div>
                          </div>
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">水印位置</label>
                            <div class="layui-input-block">
                              <input type="radio" name="sex" value="0" title="左上">
                              <input type="radio" name="sex" value="1" title="顶中" checked>
                              <input type="radio" name="sex" value="1" title="右上" checked>
                              <br/>
                              <input type="radio" name="sex" value="0" title="左中">
                              <input type="radio" name="sex" value="1" title="中间" checked>
                              <input type="radio" name="sex" value="1" title="右中" checked>
                              <br/>
                              <input type="radio" name="sex" value="0" title="左下">
                              <input type="radio" name="sex" value="1" title="底中" checked>
                              <input type="radio" name="sex" value="1" title="右下" checked>
                            </div>
                          </div>
                          <div class="layui-form-item">
                            <label class="layui-form-label">缩略图水印</label>
                            <div class="layui-input-inline">
                                <img src="" class="hide" id="thumb-img" height="100px" width="auto">
                                <input type="hidden" name="thumb" id="thumb-input" value="">
                                <input type="file" name="_thumb" id="_thumb" class="hide">
                                <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                                  <i class="layui-icon">&#xe608;</i> 上传
                                </button>
                                <button id="del-thumb" class="layui-btn layui-btn-primary hide">删除</button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">仅支持.gif|.png格式</div>
                          </div>
                          <div class="layui-form-item">
                            <label class="layui-form-label">内容图水印</label>
                            <div class="layui-input-inline">
                                <img src="" class="hide" id="thumb-img" height="100px" width="auto">
                                <input type="hidden" name="thumb" id="thumb-input" value="">
                                <input type="file" name="_thumb" id="_thumb" class="hide">
                                <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                                  <i class="layui-icon">&#xe608;</i> 上传
                                </button>
                                <button id="del-thumb" class="layui-btn layui-btn-primary hide">删除</button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">仅支持.gif|.png格式</div>
                          </div>
                      </div>
                      
                      <div class="layui-tab-item">
                        <div class="layui-form-item">
                          <label class="layui-form-label">顶部</label>
                          <div class="layui-input-block">
                            <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
                          </div>
                          <div class="layui-word-aux" align="center">代码会放在 &lt;/head&gt; 标签以上</div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">底部</label>
                          <div class="layui-input-block">
                            <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
                          </div>
                          <div class="layui-word-aux" align="center">代码会放在 &lt;/body&gt; 标签以上</div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="site-demo-button" style="margin-left: 50px;">
                  <button class="layui-btn site-demo-active submit">保存设置</button>
                </div>
            </form>
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
</script>
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['layer','element','form'], function(){
        var layer = layui.layer
        ,form = layui.form()
        ,element = layui.element();
});
      $(function(){
        $('.submit').on('click',function(){
          var url = "<?php echo U('System/set');?>";

          return false;
        });
      });
</script>
</body>
</html>