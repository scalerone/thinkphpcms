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
	<div class="position sub_nav">
		<div class="container">
			<p>
			<?php $cates= M("category")->where("status=1")->order("sort ASC")->select();$cates=cateSort2Child($cates,57);foreach($cates as $key=>$cate_val): extract($cate_val);$index=$key+1;if($type==1) $url=U("/list/".$id);if($type==2) $url=U("/page/".$id);?><a class="<?php echo ($cate['id']==$id?'active':''); ?>" href="<?php echo ($url); ?>"><?php echo ($catname); ?></a><?php endforeach;?>
			</p>
		</div>
	</div>
	<div class="content mb50">
		<div class="container">
			<?php echo ($cate["content"]); ?>
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
</body>
</html>