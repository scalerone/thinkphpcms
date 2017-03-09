<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<script type="text/javascript" src="/./Application/Admin/Public/js/jquery-1.11.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
</head>
<body id="body-right">
    <!-- 标题栏 -->
    <div class="main-title">
        <h1>数据备份</h1>
        <hr>
    </div>
    <!-- /标题栏 -->

    <div class="cf">
        <a id="export" class="btn" href="javascript:;" autocomplete="off">立即备份</a>
        <a id="optimize" class="btn" href="<?php echo U('Database/optimize');?>">优化表</a>
        <a id="repair" class="btn" href="<?php echo U('Database/repair');?>">修复表</a>
    </div>

    <!-- 应用列表 -->
    <div class="data-table table-striped mt20">
        <form id="export-form" method="post" action="<?php echo U('export');?>">
            <table class="table2">
                <thead>
                    <tr>
                        <th width="48"><input class="check-all" checked="chedked" type="checkbox" value=""></th>
                        <th>表名</th>
                        <th width="120">数据量</th>
                        <th width="120">数据大小</th>
                        <th width="160">创建时间</th>
                        <th width="160">备份状态</th>
                        <th width="120">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
                            <td class="num">
                                <input class="ids" checked="chedked" type="checkbox" name="tables[]" value="<?php echo ($table["name"]); ?>">
                            </td>
                            <td><?php echo ($table["name"]); ?></td>
                            <td><?php echo ($table["rows"]); ?></td>
                            <td><?php echo (format_bytes($table["data_length"])); ?></td>
                            <td><?php echo ($table["create_time"]); ?></td>
                            <td class="info">未备份</td>
                            <td class="action">
                                <a class="ajax-get no-refresh" href="<?php echo U('Database/optimize?tables='.$table['name']);?>">优化表</a>&nbsp;
                                <a class="ajax-get no-refresh" href="<?php echo U('Database/repair?tables='.$table['name']);?>">修复表</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </form>
    </div>
    <!-- /应用列表 -->

  <script type="text/javascript">
    (function($){
        var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");

        $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if(data.status){
                    alert(data.info,'alert-success');
                } else {
                	alert(data.info,'alert-error');
                }
                setTimeout(function(){
	                $('#top-alert').find('button').click();
	                $(that).removeClass('disabled').prop('disabled',false);
	            },1500);
            }, "json");
            return false;
        });

        $export.click(function(){
            $export.parent().children().addClass("disabled");
            $export.html("正在发送备份请求...");
            $.post(
                $form.attr("action"),
                $form.serialize(),
                function(data){
                    if(data.status){
                        tables = data.tables;
                        $export.html(data.info + "开始备份，请不要关闭本页面！");
                        backup(data.tab);
                        window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                    } else {
                    	alert(data.info,'alert-error');
                        $export.parent().children().removeClass("disabled");
                        $export.html("立即备份");
                        setTimeout(function(){
        	                $('#top-alert').find('button').click();
        	                $(that).removeClass('disabled').prop('disabled',false);
        	            },1500);
                    }
                },
                "json"
            );
            return false;
        });

        function backup(tab, status){
            status && showmsg(tab.id, "开始备份...(0%)");
            $.get($form.attr("action"), tab, function(data){
                if(data.status){
                    showmsg(tab.id, data.info);

                    if(!$.isPlainObject(data.tab)){
                        $export.parent().children().removeClass("disabled");
                        $export.html("备份完成，点击重新备份");
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                    backup(data.tab, tab.id != data.tab.id);
                } else {
                    alert(data.info,'alert-error');
                    $export.parent().children().removeClass("disabled");
                    $export.html("立即备份");
                    setTimeout(function(){
    	                $('#top-alert').find('button').click();
    	                $(that).removeClass('disabled').prop('disabled',false);
    	            },1500);
                }
            }, "json");

        }

        function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
    })(jQuery);
    </script>
    <script>
            ;$(function(){
                //全选的实现
                $(".check-all").click(function(){
                    $(".ids").prop("checked", this.checked);
                });
                $(".ids").click(function(){
                    var option = $(".ids");
                    option.each(function(i){
                        if(!this.checked){
                            $(".check-all").prop("checked", false);
                            return false;
                        }else{
                            $(".check-all").prop("checked", true);
                        }
                    });
                });
            
            });
         </script>
</body>
</html>