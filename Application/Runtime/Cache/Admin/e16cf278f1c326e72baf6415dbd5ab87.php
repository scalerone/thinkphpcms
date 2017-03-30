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
            <div class="crumb-list"><i class="iconfont">&#xe607;</i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/index');?>">文章管理</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo U('Article/add');?>">添加文章</a></div>
        </div>

        <div class="result-wrap">
            <div class="result-content">
               <form class="layui-form" action="<?php echo U('Article/add');?>" method="post" enctype="multipart/form-data" id="addForm">
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
                  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">摘要：</label>
                    <div class="layui-input-block w500">
                      <textarea name="summary" placeholder="文章摘要..." class="layui-textarea"></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label ">内容：</label>
                    <div class="layui-input-block">
                      <textarea name="content" id="content" style="height: 450px;"></textarea>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">缩略图：</label>
                    <div class="layui-input-block">
                        <img src="" class="hide thumb-img" height="100px" width="auto">
                        <input type="hidden" name="thumb" class="thumb-input" value="">
                        <input type="file" id="_thumb" class="hide">
                        <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
                          <i class="layui-icon">&#xe608;</i> 文章缩略图
                        </button>
                        <button class="del-thumb layui-btn layui-btn-primary hide">删除</button>
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
                    <label class="layui-form-label">附件：</label>

                    <div class="layui-inline files_dom" style="width:auto;">
                        <div class="layui-btn-group">
                          <label class="layui-btn">
                            选择文件<input type="file" multiple class="selectFile" name="article_file" value="附件" style="width:1px;opacity: 0;height: 1;display: none;">
                          </label>
                          <a class="layui-btn layui-btn-primary uploadBtn" style="width:auto;display: none;">开始上传</a>
                        </div>
                    </div>

                    
                  </div>

                   <div class="layui-form-item addfilebox">
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
    layui.use(['form', 'layedit', 'laydate','element'], function(){
      var form = layui.form()
      ,layedit = layui.layedit
      ,element = layui.element
      ,laydate = layui.laydate;

        //文章缩略图上传
        $('#_thumb').bind('change',function(){
          //限制文件类型与大小
          var options = {
            'id'      : '#_thumb',
            'filePath': $(this).val(),
            'fileSize': <?php echo (C("FILE_SIZE")); ?>,
          };
          //调用上传方法
          fileUpload(options,'#_thumb','<?php echo U("Article/upload");?>');
        });

        var flieList = []; //存放文件对象数组
        var sizeObj = [];//文件大小数组
        var $btnupload = $('.uploadBtn');
        var $file_list = $('.fileTable tbody');
        //继续添加附件
        $('.selectFile').on('change',function(){
          ajaxUploadFiles(this.files);

           //删除附件单击事件
          $('.delfilebtn').on('click',function(){
            var oTr = $(this).parents("tr");
            var index = oTr.index();
            oTr.remove();   //删除这一行
            flieList.splice(index,1); //删除数据
            sizeObj.splice(index,1);  //删除文件大小数组中的项

          });
        }); 

        //上传按钮单击事件
        $btnupload.on("click",function(){
            //btnupload.off();
            $file_list = $('.fileTable tbody');
            var tr = $file_list.find("tr");    //获取所有tr列表
            console.log(tr);
            var successNum = 0;         //已上传成功的数目
            $file_list.off();          //取消删除事件
            $file_list.find("a.delfilebtn").text("等待上传");
            
            
            for( var i=0;i<tr.length;i++ ){
              uploadFn(tr.eq(i),i);   //参数为当前项，下标
              console.log(i);
            }
                
            function uploadFn(obj,i){
              
              var formData = new FormData();
              var arrNow = flieList[i];     
             
              // 从当前项中获取上传文件，放到 formData对象里面，formData参数以key name的方式
              var result = arrNow[0];             //数据
              formData.append("articleFiles" , result);
              
              var name = arrNow[1];             //文件名
              formData.append("email" , name);
              
              //var progress = obj.find(".layui-progress");     //上传进度背景元素
              var progressNum = obj.find(".layui-progress-bar");   //上传进度元素文字
              var oOperation = obj.find("a.delfilebtn");   //按钮
              
              oOperation.text("正在上传");              //改变操作按钮
              oOperation.off();
              
              var request = $.ajax({
                type: "POST",
                url: "<?php echo U('Article/uploadFiles');?>",
                data: formData,     //这里上传的数据使用了formData 对象
                dataType: 'json',
                processData : false,  //必须false才会自动加上正确的Content-Type
                contentType : false,
                
                //这里我们先拿到jQuery产生的XMLHttpRequest对象，为其增加 progress 事件绑定，然后再返回交给ajax使用
                xhr: function(){
                  var xhr = $.ajaxSettings.xhr();
                  if(onprogress && xhr.upload) {
                    xhr.upload.addEventListener("progress" , onprogress, false);　
                    return xhr;
                  }
                },
                
                //上传成功后回调
                success: function(res){
                  oOperation.text("成功");
                  var o_paren = oOperation.parents('tr');
                  o_paren.find('input.hid_file').val(res.url);
                  o_paren.find('input.hid_file_size').val(res.size);
                  oOperation.removeClass('layui-btn-danger').addClass('');
                  successNum++;
                  
                  if(successNum == tr.length){
                    console.log('全部上传成功!');
                  }
                },
                
                //上传失败后回调
                error: function(){
                  oOperation.text("重传");
                  //oOperation.removeClass('layui-btn-danger');
                  oOperation.on("click",function(){
                    request.abort();    //终止本次
                    uploadFn(obj,i);
                  });
                }
                
              });
              
              //侦查附件上传情况 ,这个方法大概0.05-0.1秒执行一次
              function onprogress(evt){
                var loaded = evt.loaded;  //已经上传大小情况  
                var tot = evt.total;    //附件总大小  
                var per = Math.floor(100*loaded/tot);  //已经上传的百分比
                progressNum.css('width', per +"%" ); 
              }
            }
        });


        function ajaxUploadFiles(files){
            //添加file数组
            addFileList(files);
            
            //添加文件到数组     
            function addFileList(files){
              if(files.length<1){return false;}
              for( var i=0;i<files.length;i++ ){
                

                var fileObj = files[i];   //单个文件
                var name = fileObj.name;  //文件名
                var size = fileObj.size;  //文件大小
                var type = fileType(name);  //文件类型，获取的是文件的后缀

                /*if(sizeObj.indexOf(size) != -1 ){
                  layer.msg('文件已经存在!',{icon:2});
                  return false;
                }*/

                //给json对象添加内容，得到选择的文件的数据
                var itemArr = [fileObj,name,size,type]; //文件，文件名，文件大小，文件类型
                flieList.push(itemArr);
                //把这个文件的大小放进数组中
                sizeObj.push(size);
                
                //生成表格
                appendTable(flieList);
                //显示上传按钮
                $('.uploadBtn').show();
              }
              
            }

            

            //追加到表格中
            function appendTable(flieList){
              var fileTable = $('.fileTable');
              var fileTablebody = $('.fileTable tbody');

              if(!fileTable.get(0)){
                  var str = '<table class="fileTable layui-table" lay-even="" lay-skin="row">';
                  str += '   <colgroup>';
                  str += '    <col width="300">';
                  str += '    <col width="80">';
                  str += '    <col width="130">';
                  str += '    <col width="360">';
                  str += '    <col width="100">';
                  str += '    <col>';
                  str += '   </colgroup>';
                  str += '   <thead>';
                  str += '<tr>';
                  str += '<th>文件名</th>';
                  str += '<th>类型</th>';
                  str += '<th>大小</th>';
                  str += '<th>进度</th>';
                  str += '<th>操作</th>';
                  str += '</tr>';
                  str += '</thead>';
                  str += '<tbody>';
                }else{
                  str = '';
                } 

              for( var i=0;i<flieList.length;i++ ){
                  var fileData = flieList[i];   //flieList数组中的某一个
                  var objData = fileData[0];    //文件
                  var name = fileData[1];     //文件名
                  var size = fileData[2];     //文件大小
                  var type = fileData[3];     //文件类型
                  var volume = bytesToSize(size); //文件大小格式化
                        
                  str += '<tr>';
                  str += '<td><input type="hidden" name="files_name[]" value="'+name+'"><input type="hidden" class="hid_file" name="article_files[]" value="">'+name+'</td>';
                  str += '<td><input type="hidden" class="hid_file_type" name="files_type[]" value="'+type+'">'+type+'</td>';
                  str += '<td><input type="hidden" class="hid_file_size" name="files_size[]" value="">'+volume+'</td>';
                  str += '<td>';
                  str += '<div class="layui-progress">';
                  str += '<div class="layui-progress-bar" lay-percent="0%"></div>';
                  str += '</div>';
                  str += '</td>';
                  str += '<td><a class="layui-btn layui-btn-danger layui-btn-mini delfilebtn">删除</a></td>';
                  str += '</tr>';
                }
              
                if(!fileTable.get(0)){
                  str += '</tbody>';
                  str += '</table>';
                  $('.files_dom').append(str);
                }else{
                  fileTablebody.html('').append(str);
                }
                
            }

             //字节大小转换，参数为b
            function bytesToSize(bytes) {
                var sizes = ['Bytes', 'KB', 'MB'];
                if (bytes == 0) return 'n/a';
                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
            };

            //通过文件名，返回文件的后缀名
            function fileType(name){
              var nameArr = name.split(".");
              return nameArr[nameArr.length-1].toLowerCase();
            }
        }
    });
</script>
<script type="text/javascript">
  var ue = UE.getEditor('content');
</script>
</body>
</html>