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
      $(this).prevAll('.upload-btn').removeClass('layui-btn-disabled').removeClass('hide').removeAttr('disabled').show();
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
        debugger;
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
                        try{
                          if(elem2) elem2.remove();
                        }catch(err){
                          $(elem2).remove();
                        }
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

    /**
     * 文章附件上传函数
     * @param  {[type]} url [description]
     * @return {[type]}     [description]
     */
function ajaxUploadArticleFiles(url){
    var _url = url;
    var flieList = []; //存放文件对象数组
    var sizeObj = [];//文件大小数组
    var $btnupload = $('.uploadBtn');
    var $file_list = $('.fileTable tbody');
    //继续添加附件
    $('.selectFile').on('change',function(){
      ajaxUploadFiles(this.files);

       //删除附件单击事件
      $('.delfilebtn').on('click',function(){
        var del = $('.delfilebtn');
        var table = $(this).parents('.fileTable');
        if(del && del.length==1){
          table.remove();
          $('.uploadBtn').hide();
        }

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
            url: _url,
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