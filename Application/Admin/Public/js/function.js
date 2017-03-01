  /**
 * 文章缩略图上传
 * @param  {[Object]} opt [配置信息]
 * @param  {[int]} id  [input[file]dom的ID]
 * @param  {[string]} url [文件上传的服务器地址]
 * @return {[null]}     [无返回值]
 */
function fileUpload(opt,id,url){
    //默认上传文件类型和大小
    var _defaulf = {
      'fileSize': 2097152,
      'fileType': ['jpg','jpeg','png','gif','bmp'],
      'filePath': ''
    };

    var file = $(id)[0].files[0];
    var formData = new FormData();
    formData.append("file",file);

    $.extend(_defaulf, opt);

    //获取文件的后缀
    var extStart = _defaulf.filePath.lastIndexOf(".") + 1; 
    var ext = _defaulf.filePath.substring(extStart,_defaulf.filePath.length).toLowerCase();
    //过滤 
    ext = _defaulf.fileType.filter(function(index) {
        return ext == index;
    });
    //验证后缀是否合法
    if(ext.length < 1){
      layer.msg('图片格式不正确!');
      return;
    }
    //验证文件大小是否合法
    if(!filterImg()){
      layer.msg("图片大小不能大于2MB");
      return;
    }

    function filterImg(){
      var fileSize = file.size;
      if(fileSize > _defaulf.fileSize){ 
          return false;
       } 
       return true;
    }
    //开始上传
    $.ajax({ 
      url : url, 
      type : 'POST', 
      data : formData, 
      // 告诉jQuery不要去处理发送的数据
      processData : false, 
      // 告诉jQuery不要去设置Content-Type请求头
      contentType : false,
      beforeSend:function(){
        $('.upload-btn').html('<i class="layui-icon">&#xe608;</i>正在上传...');
      },
      success : function(msg) { 
        $('#thumb-img').attr('src',msg.src).removeClass('hide').show();
        $('#thumb-input').val(msg.src);
        $('#_thumb').val('');
        $('.upload-btn').html('<i class="layui-icon">&#xe608;</i>文章缩略图').addClass('layui-btn-disabled');
        $('#del-thumb').removeClass('hide').show();
      }, 
      error : function(responseStr) { 
        console.log("error");
        } 
    });
}
  //删除缩略图
  $(function(){
    $('#del-thumb').click(function(){
      $('#thumb-img').attr('src','').hide();
      $('#thumb-input').val('');
      $('#_thumb').val('');
      $(this).hide();
      $('.upload-btn').removeClass('layui-btn-disabled');
      return false;
  });
  });
    //栏目和文章全选反选
    $(function(){
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
        //全选
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
    });
      /**
       * [delArticleById description]
       * @param  {[array|int]} id  [文章的ID数组或者单个ID]
       * @param  {[str]} url [提交删除的地址]
       * @return {[boolean]}     [是否删除成功]
       */
      function delArticleById(ids,url,method,elem) {
           $.ajax({
              type: method,
              url: url,
              data: {'id':ids},
              dataType: 'json',
              success: function(res){
                  if(res.status == 1){
                    layer.msg('删除成功!');
                    elem.remove().hide('slow');
                  }else{
                    layer.msg('删除失败!');
                  }
              },
              error: function(res){
                 layer.msg('出现错误!');
                 console.log(res);
              }
          });
      }