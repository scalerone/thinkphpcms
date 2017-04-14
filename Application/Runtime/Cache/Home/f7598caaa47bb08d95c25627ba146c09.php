<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo (C("SITE_TITLE")); ?></title>
		<meta name="keywords" content="<?php echo (C("SITE_KEYWORDS")); ?>">
		<meta name="description" content="<?php echo (C("SITE_DESCRIPTION")); ?>">
		<link rel="stylesheet" href="/Public/css/common.css" />
		<link rel="stylesheet" href="/Public/css/header.css" />
		<link rel="stylesheet" href="/Public/css/page.css" />
		<link rel="stylesheet" href="/Public/css/footer.css">
		<!--[if lt IE 9]>
        	<script src="/Public/js/html5shiv.min.js"></script>
			<script src="/Public/js/respond.min.js"></script>
        <![endif]-->
	</head>
	<body>
		<header>
			<div class="container clear">
				<div class="logo float_l">
					<a href="/">
						<img alt="<?php echo (C("SITE_TITLE")); ?>" src="<?php echo (C("SITE_LOGO")); ?>" width="150px" height="115px" />
					</a>
				</div>	
				<div class="nav float_l">
					<nav>
						<ul>
							<li class="<?php echo ($cate['id']==''?'active':''); ?>"><a href="/">首页</a></li>
							<?php $cates= M("category")->where("status=1")->order("sort ASC")->select();$cates=cateSort2Child($cates,0);$cates=array_slice($cates,0,20);foreach($cates as $key=>$cate_val): extract($cate_val);$index=$key+1;if($type==1) $url=U("/list/".$id);if($type==2) $url=U("/page/".$id);?><li class="<?php echo ($cate['id']==$id?'active':''); ?>"><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a></li><?php endforeach;?>
						</ul>
					</nav>
				</div>
				<div class="user float_r">
					<a href="javascript:;">
						<i class="icon-user"></i>
					</a>
					<a href="javascript:;" id="user-dowm">
						<i class="icon-dowm"></i>
					</a>
					<div class="user-box">
						<ul>
							<li><a href="">登录</a></li>
							<li><a href="">注册</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<section class="flexslider">
			<ul class="slides">
				<?php $list =M('ads_plate_list')->where(array('plate_id'=>1))->order('createtime ASC')->limit(3)->select();foreach($list as $val): extract($val); ?><li alt="<?php echo ($alt); ?>" style="background:url(<?php echo ($thumb); ?>) 50% 0 no-repeat;"></li><?php endforeach; ?>
			</ul>
		</section>
	<div class="content mb50">
		<div class="container">
		<style type="text/css">
			.form ul li{
				margin-top: 10px;
			}
			.form ul li textarea,
			.form ul li input{
				border: 1px solid #eee;
			}
		</style>
			<form method="post" class="message_form">
				<div class="form">
					<ul>
						<li>
							<label>
								标题:<input type="text" name="title" value="" >
							</label>
						</li>
						<li>
							<label>
								邮箱:<input type="text" name="email" value="" >
							</label>
						</li>
						<li>
							<label>
								留言内容:<textarea style="width:300px;height:80px;" name="content"></textarea>
							</label>
						</li>
						<li>
							<input type="submit" value="提交" id="message">
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
<footer>
	<div class="container clear">
		<div class="stu float_l">
			<h2 class="h2">
				<?php
 $cate = M('category')->where("status=1")->find(intval(57)); extract($cate); $url = U('/cate/'.$id); ?><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a>
			</h2>
			<?php $cates= M("category")->where("status=1")->order("sort ASC")->select();$cates=cateSort2Child($cates,57);$cates=array_slice($cates,0,3);foreach($cates as $key=>$cate_val): extract($cate_val);$index=$key+1;if($type==1) $url=U("/list/".$id);if($type==2) $url=U("/page/".$id);?><p><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a></p><?php endforeach;?>
		</div>
		<div class="contact float_l">
			<h2 class="h2">
				<?php
 $cate = M('category')->where("status=1")->find(intval(62)); extract($cate); $url = U('/cate/'.$id); ?><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a>
			</h2>
			<p>热线：<?php echo (C("SITE_TELPHONE")); ?></p>
			<p>邮箱：<?php echo (C("SITE_EMAIL")); ?></p>
			<p>地址: <?php echo (C("SITE_ADDRESS")); ?></p>
		</div>
		<div class="about float_l">
			<h2 class="h2">
				<?php
 $cate = M('category')->where("status=1")->find(intval(55)); extract($cate); $url = U('/cate/'.$id); echo ($catname); ?>
			</h2>
			<p class="i">
				<a href="">
					<i class="icon-botton icon-qq"></i>
				</a>
				<a href="">
					<i class="icon-botton icon-weixin"></i>
				</a>
				<a href="">
					<i class="icon-botton icon-sina"></i>
				</a>
				<a href="">
					<i class="icon-botton icon-face"></i>
				</a>
			</p>
			<p><?php echo (C("SITE_CR")); ?></p>
		</div>
		<div class="qcode float_r">
			<img src="/Public/images/code.jpg">
			<p>扫一扫，关注我们！</p>
		</div>
	</div>
</footer>
<script type="text/javascript" src="/Public/js/jquery-1.11.min.js" ></script>
<script type="text/javascript" src="/Public/js/jquery.flexslider-min.js" ></script>
<script type="text/javascript" src="/Public/js/index.js" ></script>
<script type="text/javascript" src="/Public/js/layer/layer.js" ></script>
<script type="text/javascript">
	//提交留言
	$('#message').on('click',function(){
		//var $form = $('.form');
		$.ajax({
			url: '<?php echo U("Contact/cont");?>',
			type: 'post',
			dataType: 'json',
			data: $('.message_form').serialize(),
			success:function(res){
				console.log(res);
				if(res.status == 1){
					layer.msg(res.msg,{icon:1});
				}else{
					layer.msg(res.msg,{icon:0});
				}
			},
			error: function(res){
				layer.msg(res.msg,{icon:1});
			}
		});
		return false;
	});
</script>
</body>
</html>