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
							<li class="active"><a href="/">首页</a></li>
							<?php $cates= M("category")->where("status=1")->order("sort ASC")->select();$cates=cateSort2Child($cates,0);$cates=array_slice($cates,0,20);if(count($cates)==0) : echo "" ;else: foreach($cates as $key=>$cate_val): extract($cate_val);$index=$key+1;if($type==1) $url=U("/list/".$id);if($type==2) $url=U("/page/".$id);?><li><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a></li><?php endforeach;endif; ?>
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
				<li style="background:url(/Public/images/banner01.jpg) 50% 0 no-repeat;"></li>
				<li style="background:url(/Public/images/banner01.jpg) 50% 0 no-repeat;"></li>
			</ul>
		</section>
		<div class="position">
			<div class="container clear">
				<div class="left float_l">
					<p>
						<span class="h2">
							关于我们
						</span>
						<span class="h4">About Us </span>
					</p>
				</div>
				<div class="right float_r">
					<p>
						<i class="icon-home"></i>
						<a href="">首页</a>>
						<a href="">关于我们</a>
					</p>
				</div>
			</div>
		</div>

		<div class="wrap content mb50">
			<div class="container">
				<h2>启航创客</h2>				
				<p>深圳市启航创客科技有限公司是一家领先的青少年创客教育服务商，为中小学学校提供创客空间设计搭建、创客课程、创客师资培训、创客电子物料等专业服务。</p>
				<img src="/Public/images/about01.jpg" class="auto_img">	
				<h2>启航理念</h2>			
				<p>你微笑，我开心。你成功，我荣誉。</p>
				<img src="/Public/images/about02.jpg" class="auto_img">
				<h2>启航寓意</h2>			
				<p>提早启发孩子的创新思维，在接受创新事物的基础上让学生从小赢在起跑线，早早提高孩子动手能力，创新思维能力。</p>
				<img src="/Public/images/about03.jpg" class="auto_img">

				<h2>启航创客业务</h2>			
				<p>为中小学学校提供创客空间一站式解决方案。 培育青少年的动手能力、观察力、审美力、独立思考能 培养创客教育师资团队，推动创客教育的可持续发展。</p>
				<img src="/Public/images/about04.jpg" class="auto_img">

				<h2>启航创客目标</h2>			
				<p>培养青少年的创新力、执行力、领导力，让青少年赢在起跑线上。</p>
				<img src="/Public/images/about05.jpg" class="auto_img">						
			</div>
		</div>
<footer>
	<div class="container clear">
		<div class="stu float_l">
			<h2 class="h2">
				<?php
 $cate = M('category')->where("status=1")->find(intval(57)); extract($cate); $url = U('/cate/'.$id); ?><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a>
			</h2>
			<?php $cates= M("category")->where("status=1")->order("sort ASC")->select();$cates=cateSort2Child($cates,57);$cates=array_slice($cates,0,3);if(count($cates)==0) : echo "" ;else: foreach($cates as $key=>$cate_val): extract($cate_val);$index=$key+1;if($type==1) $url=U("/list/".$id);if($type==2) $url=U("/page/".$id);?><p><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a></p><?php endforeach;endif; ?>
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