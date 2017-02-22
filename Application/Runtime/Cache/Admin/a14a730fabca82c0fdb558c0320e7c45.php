<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改用户组</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('editGroup');?>" method="post">
				<table class="table">
					<thead>
						<tr>
							<th colspan="2">修改用户组</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="35%" align="right">组名称:</td>
							<td><input type="text" name="title" value="<?php echo ($group["title"]); ?>" size="58" /></td>
						</tr>
						<tr>
							<td width="8%" align="right" style="vertical-align: top">分配权限:</td>
							<td>
								<?php if(is_array($rules)): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="group">
										<h2><input type="checkbox" name="rules[]" value="<?php echo ($v["id"]); ?>" <?php echo ($v['checked']=='1'?'checked="checked"':''); ?>><?php echo ($v["title"]); ?></h2>
										<p class="sub">&nbsp;&nbsp;&nbsp;
											<?php if(is_array($v['child'])): $i = 0; $__LIST__ = $v['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><input type="checkbox" name="rules[]" value="<?php echo ($child["id"]); ?>" <?php echo ($v['checked']=='1'?'checked="checked"':''); ?>/><?php echo ($child["title"]); ?>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
										</p>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
							<p><a class="btn" href="javascript:;" id="ruleAll">全选</a><a class="btn" href="javascript:;" id="cannelAll">取消</a></p>
							</td>
						</tr>
						<tr>
							<td colspan="3" align="center">
								<input type="hidden" name="id" value="<?php echo ($group["id"]); ?>">
								<input type="submit" value="添加" id="btn" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
		<script type="text/javascript">
			$(function(){
				//全选
				$('#ruleAll').on('click',function(){
					$('.group input[type=checkbox]').prop('checked',true);
				});
				//取消全选
				$('#cannelAll').on('click',function(){
					$('.group input[type=checkbox]').prop('checked',false);
				});

				$('.group h2>input[type=checkbox]').on('click',function(){
					if($(this).prop('checked')){
						$(this).parents('.group').find('input[type=checkbox]').prop('checked',true);
					}else{
						$(this).parents('.group').find('input[type=checkbox]').prop('checked',false);
					}
				});

			});
		</script>
	</body>
</html>