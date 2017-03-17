<?php if (!defined('THINK_PATH')) exit();?><!--添加板块 S-->
<link rel="stylesheet" type="text/css" href="/./Application/Admin/Public/layui/css/layui.css" media="all" />
<div id="addPlate" style="padding-top:10px;padding-right:10px;padding-bottom: 10px;">
    <form class="layui-form" action="">
      <div class="layui-form-item">
        <label class="layui-form-label">板块名</label>
        <div class="layui-input-block">
          <input type="text" name="name" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input name" value="<?php echo ($plate["name"]); ?>">
        </div>
      </div>

    <div class="layui-form-item">
        <label class="layui-form-label">板块描述</label>
        <div class="layui-input-block">
          <textarea name="desc" placeholder="请输入内容" class="layui-textarea desc"><?php echo ($plate["desc"]); ?></textarea>
        </div>
    </div>

      <div class="layui-form-item">
        <div class="layui-input-block">
          <input type="hidden" name="id" value="<?php echo ($plate["id"]); ?>">
          <button class="layui-btn" lay-submit lay-filter="save">添加</button>
        </div>
      </div>
    </form>
</div>
<script type="text/javascript" src="/./Application/Admin/Public/js/jquery-1.11.min.js"></script>
<script src="/./Application/Admin/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
layui.use(['form','layer'], function(){
  var layer = layui.layer
  ,form = layui.form();
  //监听添加板块提交事件
  form.on('submit(save)', function(data){
    $.ajax({
      url: '<?php echo U("Ads/editPlate");?>',
      type: 'post',
      dataType: 'json',
      data: $(data.form).serialize(),
      success: function(res){
        if(res.status == 1){
          layer.msg(res.msg,{icon:1}); 
          var index = parent.layer.getFrameIndex(window.name);
          window.setTimeout(function(){
            parent.layer.close(index);
            window.top.location.href = "<?php echo U('Ads/index');?>";
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