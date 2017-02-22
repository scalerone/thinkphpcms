<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>基本信息</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('index');?>" method="post">
				<table class="table">
					<thead>
						<tr>
							<td colspan="2" align="center"><h2>基本信息</h2></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="30%" align="right">站点标题:</td>
							<td><input type="text" name="SITE_TITLE" value="<?php echo (C("SITE_TITLE")); ?>" size="50"></td>
						</tr>
						<tr>
							<td width="30%" align="right">关键字:</td>
							<td><input type="text" name="SITE_KEYWORDS" value="<?php echo (C("SITE_KEYWORDS")); ?>" size="50"></td>
						</tr>
						<tr>
							<td width="30%" align="right">描述:</td>
							<td><input type="text" name="SITE_DESCRIPTION" value="<?php echo (C("SITE_DESCRIPTION")); ?>" size="50"></td>
						</tr>
						<tr>
							<td width="30%" align="right">电话:</td>
							<td><input type="text" name="SITE_TELPHONE" value="<?php echo (C("SITE_TELPHONE")); ?>" size="50"></td>
						</tr>
						<tr>
							<td width="30%" align="right">手机:</td>
							<td><input type="text" name="SITE_MOBILE" value="<?php echo (C("SITE_MOBILE")); ?>" size="50"></td>
						</tr>
						<tr>
							<td width="30%" align="right">传真:</td>
							<td><input type="text" name="SITE_FAX" value="<?php echo (C("SITE_FAX")); ?>" size="50"></td>
						</tr>
						<tr>
							<td width="30%" align="right">Email:</td>
							<td><input type="text" name="SITE_EMAIL" value="<?php echo (C("SITE_EMAIL")); ?>" size="50"></td>
						</tr>
						<tr>
							<td width="30%" align="right">地址:</td>
							<td><input type="text" name="SITE_ADDRESS" value="<?php echo (C("SITE_ADDRESS")); ?>" size="50"></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" value="确定">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
	<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
	</body>
</html>