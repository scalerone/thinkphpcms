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
      'id'      : '#_thumb',
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
        $(_defaulf.id).nextAll('.upload-btn')
        .html('<i class="layui-icon">&#xe608;</i>正在上传...')
        .attr('disabled','disabled');
      },
      success : function(msg) {
        var $thumb_img = $(_defaulf.id).prevAll('.thumb-img');
        var $thumb_input = $(_defaulf.id).prevAll('.thumb-input');
        var $upload_btn = $(_defaulf.id).nextAll('.upload-btn');
        var $del_thumb = $(_defaulf.id).nextAll('.del-thumb');
        if(!$thumb_img || !$thumb_input || !$upload_btn || !$del_thumb) return false;
        
        if(msg.status == '1'){
          $thumb_img.attr('src',msg.src).removeClass('hide').show();
          $thumb_input.val(msg.src);
          $(_defaulf.id).val('');
          $upload_btn.html('<i class="layui-icon">&#xe608;</i>上传').addClass('layui-btn-disabled').attr('disabled','disabled');
          $del_thumb.removeClass('hide').show();
        }else{
          $upload_btn.html('<i class="layui-icon">&#xe608;</i>上传' + msg.info);
        }

      }, 
      error : function(responseStr) { 
        console.log("error");
        } 
    });
}
    //删除缩略图
    $('.del-thumb').on('click',function(){
      $(this).prevAll('.thumb-img').attr('src','').hide();
      $(this).prevAll('.thumb-input').val('');
      $(this).prevAll('input[type=file]').val('');
      $(this).hide();
      $(this).prevAll('.upload-btn').removeClass('layui-btn-disabled').removeClass('hide').show();
      return false;
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
      /**
       * [deleteLinks description]
       * @param  {[array|int]} id  [需要删除的ID数组或者单个ID]
       * @param  {[str]} url [提交删除的地址]
       * @param  {[str]} default get[请求方式]
       * @param  {[array]} elem[成功后需要移除的节点数组]
       * @param  {[dom]} elem2[成功后需要移除的节点单个]
       * @return {[null]}     []
       */
      function ajaxDeleteElems(ids,url,method,elem,elem2) {
           $.ajax({
              type: method,
              url: url,
              data: {'id':ids},
              dataType: 'json',
              success: function(res){
                  layer.msg(res.msg);
                  if(res.status == 1){
                      //移除已经删除的TR节点
                      try{
                        if(elem && elem.length>0) elem.remove().hide('slow');
                      }catch(err){
                        $(elem).remove();
                      }finally{
                        if(elem2) elem2.remove();
                      }
                  }
              },
              error: function(res){
                  layer.msg('出现错误!');
              }
          });
      }
      /**
       * [ajaxUpdateSort 更新排序]
       * @param  {[type]} ids    [需要更新的ID]
       * @param  {[type]} url    [更新的URL地址]
       * @param  {[type]} method [方法get|post]
       * @return {[null]}        [无返回值]
       */
      function ajaxUpdateSort(ids,url,method) {
           $.ajax({
              type: method,
              url: url,
              data: {'id':ids},
              dataType: 'json',
              success: function(res){
                  layer.msg(res.msg);
                  if(res.status == 1){
                      //移除已经删除的TR节点
                      elem.remove().hide('slow');
                  }
              },
              error: function(res){
                  layer.msg('出现错误!');
              }
          });
      }

      //鼠标移动显示文章缩略图
    $(function(){
        $('.icon-thumb').hover(function(e) {
            var src = $(this).data('src');
            var xx = e.originalEvent.x || e.originalEvent.layerX || 0; 
            var yy = e.originalEvent.y || e.originalEvent.layerY || 0; 
            yy = yy - 50;
            xx = xx + 30;
            var html = '<img class="_img" src="'+src+'" style="display:none; max-height:100px;width:auto;position: fixed;z-index: 999;left:'+xx+'px;top:'+yy+'px;">';
            $('body').append(html);
            $('._img').fadeIn('slow');

        }, function(e) {
            $('._img').fadeOut('slow').remove();
        });
    });