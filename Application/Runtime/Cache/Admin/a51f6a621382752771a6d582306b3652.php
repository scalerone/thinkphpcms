<?php if (!defined('THINK_PATH')) exit();?><!--添加板块 S-->
<link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/main.css" />
<link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/css/common.css" />
<link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/layui/css/layui.css" media="all" />
<div id="addPlate" style="padding-top:10px;padding-right:10px;padding-bottom: 10px;">
    <form class="layui-form" action="">
      <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-block">
          <input type="text" name="title" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input name" value="<?php echo ($ads["title"]); ?>">
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">链接地址</label>
        <div class="layui-input-block">
          <input type="text" name="url"  placeholder="" autocomplete="off" class="layui-input name" value="<?php echo ($ads["url"]); ?>">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">广告图：</label>
        <div class="layui-input-block">
            <img src="" class="hide thumb-img" height="80px" width="auto">
            <input type="hidden" name="thumb" class="thumb-input" value="">
            <input type="file" id="_thumb" class="hide">
            <button class="layui-btn upload-btn" onclick="_thumb.click();return false;">
              <i class="layui-icon">&#xe608;</i> 上传
            </button>
            <button class="del-thumb layui-btn layui-btn-primary hide">删除</button>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">图片Alt属性</label>
        <div class="layui-input-block">
          <input type="text" name="alt" placeholder="" autocomplete="off" class="layui-input name" value="<?php echo ($ads["alt"]); ?>">
        </div>
      </div>

      <div class="layui-form-item">
        <div class="layui-input-block">
          <input type="hidden" name="plate_id" value="<?php echo ($plate_id); ?>">
          <button class="layui-btn" lay-submit lay-filter="add">添加广告</button>
        </div>
      </div>
    </form>
</div>
<script type="text/javascript" src="/./Application/Admin/Public/js/jquery-1.11.min.js"></script>
<script type="text/javascript" src="/./Application/Admin/Public/js/function.js"></script>
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
layui.use(['form','layer'], function(){
  var layer = layui.layer
  ,form = layui.form();

  //文章缩略图上传
  $('#_thumb').bind('change',function(){
    //限制文件类型与大小
    var options = {
      'id'      : '#_thumb',
      'filePath': $(this).val(),
      'fileSize': <?php echo (C("FILE_SIZE")); ?>,
    };
    //调用上传方法
    fileUpload(options,'#_thumb','<?php echo U("Public/uploadThumb");?>');
  });
  //监听添加板块提交事件
  form.on('submit(add)', function(data){
    $.ajax({
      url: '<?php echo U("Ads/addAds");?>',
      type: 'post',
      dataType: 'json',
      data: $(data.form).serialize(),
      success: function(res){
        if(res.status == 1){
          layer.msg(res.msg,{icon:1}); 
          var index = parent.layer.getFrameIndex(window.name);
          window.setTimeout(function(){
            parent.layer.close(index);
            window.top.location.href = "/Admin/Ads/adsList/plate_id/" + <?php echo ($plate_id); ?>;
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
</script>