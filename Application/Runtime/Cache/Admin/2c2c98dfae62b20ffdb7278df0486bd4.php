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
                        <dd><a href="<?php echo U('Banner/index');?>"><i class="iconfont">&#xe622;</i>广告管理</a></dd>
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
            <form method="post" action="<?php echo U('System/set');?>" class="layui-form sortForm">
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
                          <label class="layui-form-label">站点名称</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_NAME" autocomplete="off" class="layui-input" value="<?php echo (C("SITE_NAME")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">站点地址</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_URL" autocomplete="off" class="layui-input" placeholder="http://www.baidu.com" value="<?php echo (C("SITE_URL")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站LOGO</label>
                            <div class="layui-input-block">
                                <?php if(C("SITE_LOGO")!= '' ): ?><img src="<?php echo (C("SITE_LOGO")); ?>" class="thumb-img" height="100px" width="auto">
                                  <input type="hidden" name="SITE_LOGO" class="thumb-input" value="<?php echo (C("SITE_LOGO")); ?>">
                                  <input type="file" id="SITE_LOGO" class="hide">
                                  <button class="layui-btn upload-btn layui-btn-disabled" onclick="document.getElementById('SITE_LOGO').click();return false;" disabled="disabled">
                                    <i class="layui-icon">&#xe608;</i> 上传
                                  </button>
                                  <button class="del-thumb layui-btn layui-btn-primary">删除</button>
                                <?php else: ?>
                                  <img src="<?php echo (C("SITE_LOGO")); ?>" class="hide thumb-img" height="100px" width="auto">
                                  <input type="hidden" name="SITE_LOGO" class="thumb-input" value="<?php echo (C("SITE_LOGO")); ?>">
                                  <input type="file" id="SITE_LOGO" class="hide">
                                  <button class="layui-btn upload-btn" onclick="document.getElementById('SITE_LOGO').click();return false;">
                                    <i class="layui-icon">&#xe608;</i> 上传
                                  </button>
                                  <button class="del-thumb layui-btn layui-btn-primary hide">删除</button><?php endif; ?>
                            </div>
                          </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">ICO图标</label>
                          <div class="layui-input-block">
                              <?php if(C("SITE_ICO")!= '' ): ?><img src="<?php echo (C("SITE_ICO")); ?>" class="thumb-img" height="30px" width="auto">
                                  <input type="hidden" name="SITE_ICO" class="thumb-input" value="">
                                  <input type="file" id="SITE_ICO" class="hide">
                                  <button class="layui-btn upload-btn layui-btn-disabled" onclick="document.getElementById('SITE_ICO').click();return false;" disabled="disabled">
                                    <i class="layui-icon">&#xe608;</i> 上传
                                  </button>
                                  <button class="del-thumb layui-btn layui-btn-primary">删除</button>
                                <?php else: ?>
                                  <img src="<?php echo (C("SITE_ICO")); ?>" class="hide thumb-img" height="30px" width="auto">
                                  <input type="hidden" name="SITE_ICO" class="thumb-input" value="">
                                  <input type="file" id="SITE_ICO" class="hide">
                                  <button class="layui-btn upload-btn" onclick="document.getElementById('SITE_ICO').click();return false;">
                                    <i class="layui-icon">&#xe608;</i> 上传
                                  </button>
                                  <button class="del-thumb layui-btn layui-btn-primary hide">删除</button><?php endif; ?>
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">电话</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_TELPHONE" autocomplete="off" class="layui-input" placeholder="" value="<?php echo (C("SITE_TELPHONE")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">手机</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_PHONE" autocomplete="off" class="layui-input" placeholder="" value="<?php echo (C("SITE_PHONE")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">传真</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_FAX" autocomplete="off" class="layui-input" placeholder="" value="<?php echo (C("SITE_FAX")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">Email</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_EMAIL" autocomplete="off" class="layui-input" placeholder="" value="<?php echo (C("SITE_EMAIL")); ?>">
                          </div>
                        </div>
                      </div>

                      <div class="layui-tab-item">
                        <div class="layui-form-item">
                          <label class="layui-form-label">版权信息</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_CR" autocomplete="off" class="layui-input" placeholder="" value="<?php echo (C("SITE_CR")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">地址邮编</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_ADDRESS" autocomplete="off" class="layui-input" placeholder="" value="<?php echo (C("SITE_ADDRESS")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                          <label class="layui-form-label">其他信息</label>
                          <div class="layui-input-block">
                            <textarea name="SITE_AUTHER" placeholder="请输入内容" class="layui-textarea"><?php echo (C("SITE_AUTHER")); ?></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="layui-tab-item">
                        <div class="layui-form-item">
                          <label class="layui-form-label">Title</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_TITLE" autocomplete="off" class="layui-input" value="<?php echo (C("SITE_TITLE")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">Keywords</label>
                          <div class="layui-input-block">
                            <input type="text" name="SITE_KEYWORDS" autocomplete="off" class="layui-input" value="<?php echo (C("SITE_KEYWORDS")); ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">Description</label>
                          <div class="layui-input-block">
                            <textarea placeholder="请输入内容" name="SITE_DESCRIPTION" class="layui-textarea"><?php echo (C("SITE_DESCRIPTION")); ?></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="layui-tab-item">
                         <div class="layui-form-item">
                            <label class="layui-form-label">上传大小</label>
                            <div class="layui-input-block">
                              <input type="text" name="FILE_SIZE" autocomplete="off" class="layui-input" value="<?php echo (C("FILE_SIZE")); ?>">
                            </div>
                            <div class="layui-word-aux" align="center">单位KB</div>
                          </div> 
                          <div class="layui-form-item">
                            <label class="layui-form-label">允许类型</label>
                            <div class="layui-input-block">
                                <textarea placeholder="请输入内容" name="FILE_TYPE" class="layui-textarea"><?php echo (C("FILE_TYPE")); ?></textarea>
                            </div>
                            <div class="layui-word-aux" align="center">请使用|隔开</div>
                          </div>
                      </div>

                      <div class="layui-tab-item">
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">开启水印</label>
                            <div class="layui-input-block">
                            <?php if(C("WATE_OPEN")== 'true' ): ?><input type="radio" name="WATE_OPEN" value="1" title="是" checked="checked">
                              <input type="radio" name="WATE_OPEN" value="2" title="否">
                            <?php else: ?>
                              <input type="radio" name="WATE_OPEN" value="1" title="是">
                              <input type="radio" name="WATE_OPEN" value="2" title="否" checked="checked"><?php endif; ?>
                            </div>
                          </div>
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">水印类型</label>
                            <div class="layui-input-block">
                              <?php if(C("WATE_TYPE")== '1' ): ?><input type="radio" name="WATE_TYPE" value="1" title="图片水印" checked>
                                <input type="radio" name="WATE_TYPE" value="2" title="文字水印">
                              <?php else: ?>
                                <input type="radio" name="WATE_TYPE" value="1" title="图片水印">
                                <input type="radio" name="WATE_TYPE" value="2" title="文字水印" checked><?php endif; ?>
                            </div>
                          </div>
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">添加方式</label>
                            <div class="layui-input-block">
                              <?php switch(C("WATE_ADD_WAY")): case "1": ?><input type="checkbox" value="1" name="WATE_ADD_WAY_1" lay-skin="primary" title="内容页图片添加" checked="">
                                  <input type="checkbox" value="2" name="WATE_ADD_WAY_2" lay-skin="primary" title="缩略图片添加"><?php break;?>
                                <?php case "2": ?><input type="checkbox" value="1" name="WATE_ADD_WAY_1" lay-skin="primary" title="内容页图片添加" >
                                  <input type="checkbox" value="2" name="WATE_ADD_WAY_2" lay-skin="primary" title="缩略图片添加" checked=""><?php break;?>
                                <?php case "3": ?><input type="checkbox" value="1" name="WATE_ADD_WAY_1" lay-skin="primary" title="内容页图片添加" checked="">
                                  <input type="checkbox" value="2" name="WATE_ADD_WAY_2" lay-skin="primary" title="缩略图片添加" checked=""><?php break;?>
                                <?php default: endswitch;?>
                            </div>
                          </div>
                          <div class="layui-form-item" style="border-bottom: 1px solid #eee;">
                            <label class="layui-form-label">水印位置</label>
                            <div class="layui-input-block">
                              <?php switch(C("WATE_POSITION")): case "1": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" checked>
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中">
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "2": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" checked>
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "3": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" >
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上" checked>
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "4": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" >
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中" checked>
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "5": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" >
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间" checked>
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "6": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" >
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中" checked>
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "7": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" >
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下" checked>
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "8": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" >
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中" checked>
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下"><?php break;?>
                                <?php case "9": ?><input type="radio" name="WATE_POSITION" value="1" title="左上" >
                                  <input type="radio" name="WATE_POSITION" value="2" title="顶中" >
                                  <input type="radio" name="WATE_POSITION" value="3" title="右上">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="4" title="左中">
                                  <input type="radio" name="WATE_POSITION" value="5" title="中间">
                                  <input type="radio" name="WATE_POSITION" value="6" title="右中">
                                  <br/>
                                  <input type="radio" name="WATE_POSITION" value="7" title="左下">
                                  <input type="radio" name="WATE_POSITION" value="8" title="底中">
                                  <input type="radio" name="WATE_POSITION" value="9" title="右下" checked><?php break;?>
                                <?php default: endswitch;?>
                              
                            </div>
                          </div>
                          <div class="layui-form-item">
                            <label class="layui-form-label">缩略图水印</label>
                            <div class="layui-input-block">
                                <img src="" class="hide thumb-img" height="100px" width="auto">
                                <input type="hidden" name="WATE_THUMB" class="thumb-input" value="">
                                <input type="file" id="WATE_THUMB" class="hide">
                                <button class="layui-btn upload-btn" onclick="document.getElementById('WATE_THUMB').click();return false;" >
                                  <i class="layui-icon">&#xe608;</i> 上传
                                </button>
                                <button class="del-thumb layui-btn layui-btn-primary hide">删除</button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">仅支持.gif|.png格式</div>
                          </div>
                          <div class="layui-form-item">
                            <label class="layui-form-label">内容图水印</label>
                            <div class="layui-input-block">
                                <img src="" class="hide thumb-img" height="100px" width="auto">
                                <input type="hidden" name="WATE_CONTENT" class="thumb-input" value="">
                                <input type="file" id="WATE_CONTENT" class="hide">
                                <button class="layui-btn upload-btn" onclick="document.getElementById('WATE_CONTENT').click();return false;">
                                  <i class="layui-icon">&#xe608;</i> 上传
                                </button>
                                <button class="del-thumb layui-btn layui-btn-primary hide">删除</button>
                            </div>
                            <div class="layui-form-mid layui-word-aux">仅支持.gif|.png格式</div>
                          </div>
                      </div>
                      
                      <div class="layui-tab-item">
                        <div class="layui-form-item">
                          <label class="layui-form-label">顶部</label>
                          <div class="layui-input-block">
                            <textarea placeholder="请输入内容" name="CODE_HEAD" class="layui-textarea"><?php echo (C("CODE_HEAD")); ?></textarea>
                          </div>
                          <div class="layui-word-aux" align="center">代码会放在 &lt;/head&gt; 标签以上</div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">底部</label>
                          <div class="layui-input-block">
                            <textarea placeholder="请输入内容" name="CODE_BODY" class="layui-textarea"><?php echo (C("CODE_BODY")); ?></textarea>
                          </div>
                          <div class="layui-word-aux" align="center">代码会放在 &lt;/body&gt; 标签以上</div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="site-demo-button" style="margin-left: 50px;">
                  <input type="submit" value="保存设置" class="layui-btn site-demo-active submit">
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

      //上传logo
      $('#SITE_LOGO').bind('change',function(){
        //限制文件类型与大小
        var options = {
          'id'      : '#SITE_LOGO',
          'filePath': $(this).val(),
          'fileSize': <?php echo (C("FILE_SIZE")); ?>,
          'fileType': ['jpg','jpeg','png','gif']
        };
        //调用上传方法
        fileUpload(options,'#SITE_LOGO','<?php echo U("Public/uploadLogo");?>');
      });
       //上传ico
      $('#SITE_ICO').bind('change',function(){
        //限制文件类型与大小
        var options = {
          'id'      : '#SITE_ICO',
          'filePath': $(this).val(),
          'fileSize': <?php echo (C("FILE_SIZE")); ?>,
          'fileType': ['ico']
        };
        //调用上传方法
        fileUpload(options,'#SITE_ICO','<?php echo U("Public/uploadIco");?>');
      });

      //上传缩略图水印
      $('#WATE_THUMB').bind('change',function(){
        //限制文件类型与大小
        var options = {
          'id'      : '#WATE_THUMB',
          'filePath': $(this).val(),
          'fileSize': <?php echo (C("FILE_SIZE")); ?>,
          'fileType': ['png','gif']
        };
        //调用上传方法
        fileUpload(options,'#WATE_THUMB','<?php echo U("Public/uploadWateThumb");?>');
      });

       //上传内容页面图片水印
      $('#WATE_CONTENT').bind('change',function(){
        //限制文件类型与大小
        var options = {
          'id'      : '#WATE_CONTENT',
          'filePath': $(this).val(),
          'fileSize': <?php echo (C("FILE_SIZE")); ?>,
          'fileType': ['png','gif']
        };
        //调用上传方法
        fileUpload(options,'#WATE_CONTENT','<?php echo U("Public/uploadWateContent");?>');
      });
  });
</script>
</body>
</html>