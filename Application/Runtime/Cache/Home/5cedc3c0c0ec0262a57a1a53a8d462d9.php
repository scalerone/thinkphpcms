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
				<li style="background:url(/Public/images/banner01.jpg) 50% 0 no-repeat;"></li>
				<li style="background:url(/Public/images/banner01.jpg) 50% 0 no-repeat;"></li>
			</ul>
		</section>
		<div class="row">
			<div class="container clear">
				<div class="img float_l">
					<img alt="" width="300px" height="300px" src="/Public/images/row01.png" />
				</div>
				<div class="text float_r">
					<h2>创客与教育的融合</h2>
					<p>将创客文化和教育结合，基于学生的兴趣，以项目学习的方式、使用数字化的工
						具、倡导造物、鼓励分享，培养跨学科解决问题能力、团队协作能力和创新能力
						的一种素质教育。
					</p>
				</div>
			</div>
		</div>
		<div class="row bg">
			<div class="container clear">
				<div class="text float_l">
					<h2>教育部：鼓励探索STEAM教育创客教育等新教育模式</h2>
					<p>有效利用信息技术推进“众创空间”建设，探索STEAM教育、创客教育等新
						教育模式，使学生具有较强的信息意识与创新意识，使信息化教学真正成为
						教师教学活动的常态。
					</p>
				</div>
				<div class="float_r">
					<img alt="" width="450px" height="410px" src="/Public/images/row02.png" />
				</div>
			</div>
		</div>
		<div class="row map">
			<div class="container">
				<div class="float_l">
					<img alt="" width="500px" height="410px" src="/Public/images/row03.png" />
				</div>
				<div class="text float_r">
					<h2>全世界有1876个知名的创客空间</h2>
					<p>截止12月11号，全世界有1876个知名创客空间，其中国外知名创客空间Noise
bridge Blog、METALAB、Techshop等，国内知名创客空间有新车间、创客空
间、柴火创客空间、启航创客等。
					</p>
				</div>
			</div>
		</div>
		<div class="row-sl">
			<div class="desc">
			<?php
 $cate = M('category')->where("status=1")->find(intval(71)); extract($cate); $url = U('/cate/'.$id); ?><h2><?php echo ($catname); ?></h2>
				<p><?php echo ($summary); ?></p>
			</div>
			<div class="nav">
				<ul>
				<?php $cates= M("category")->where("status=1")->order("sort ASC")->select();$cates=cateSort2Child($cates,71);$cates=array_slice($cates,0,3);foreach($cates as $key=>$cate_val): extract($cate_val);$index=$key+1;if($type==1) $url=U("/list/".$id);if($type==2) $url=U("/page/".$id);?><li class="<?php echo ($index==3?'last':''); ?>">
						<div>
							<div class="img">
								<img src="<?php echo ($thumb); ?>" width="120px" height="120px" alt="">
							</div>
							<h2><?php echo ($catname); ?></h2>
							<p><?php echo ($summary); ?></p>
						</div>
					</li><?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="en clear">
			<div class="text width50 float_l">
				<div class="wrap">
				<?php
 $cate = M('category')->where("status=1")->find(intval(74)); extract($cate); $url = U('/cate/'.$id); ?><h2><?php echo ($catname); ?></h2>
					<p><?php echo ($summary); ?>
					</p>
				</div>
			</div>
			<div class="img width50 float_l">
				<img src="/Public/images/en.jpg">
			</div>
		</div>
		<div class="en cn clear">
			<div class="img width50 float_l">
				<img src="/Public/images/cn.jpg">
			</div>
			<div class="text width50 float_l clear">
				<div class="wrap float_l">
					<?php
 $cate = M('category')->where("status=1")->find(intval(75)); extract($cate); $url = U('/cate/'.$id); ?><h2><?php echo ($catname); ?></h2>
						<p><?php echo ($summary); ?>
						</p>
				</div>
			</div>
		</div>
		<div class="listbar">
			<div class="container">
				<div class="h2">
					<h2><?php
 $cate = M('category')->where("status=1")->find(intval(72)); extract($cate); $url = U('/cate/'.$id); echo ($catname); ?></h2>
				</div>
				<div class="list">
					<ul>
					<?php $list=M("article")->query("select * from cms_article where (catid in(72) and status<>0)");$list=array_slice($list,0,6);if(count($list)==0) : echo "" ;else: foreach($list as $key=>$list_val): extract($list_val);$index=$key+1;$url=U("/show/".$id);?><li class="<?php echo ($index % 3==0?'last':''); ?>">
							<a href="<?php echo ($url); ?>">
								<img src="<?php echo ($thumb); ?>" alt="<?php echo ($title); ?>" width="276px" height="185px">
							</a>
						</li><?php endforeach;endif;?>
					</ul>
				</div>
			</div>
		</div>
		<div class="zuopin">
			<div class="container">
				<div class="h2">
					<h2><?php
 $cate = M('category')->where("status=1")->find(intval(73)); extract($cate); $url = U('/cate/'.$id); echo ($catname); ?></h2>
				</div>
				<div class="list">
					<ul>
					<?php $list=M("article")->query("select * from cms_article where (catid in(73) and status<>0)");$list=array_slice($list,0,6);if(count($list)==0) : echo "" ;else: foreach($list as $key=>$list_val): extract($list_val);$index=$key+1;$url=U("/show/".$id);?><li class="<?php echo ($index % 3==0?'last':''); ?>">
							<div class="img">
								<a href="<?php echo ($url); ?>">
									<img src="<?php echo ($thumb); ?>" width="312px" height="200px">
								</a>
							</div>
							<a href="<?php echo ($url); ?>">
								<?php echo ($title); ?>
							</a>
						</li><?php endforeach;endif;?>
					</ul>
				</div>
			</div>
		</div>
		<div class="case mgb90">
			<div class="container">
				<div class="h2">
					<h2><?php
 $cate = M('category')->where("status=1")->find(intval(61)); extract($cate); $url = U('/cate/'.$id); echo ($catname); ?></h2>
				</div>
				<div class="list">
					<ul>
					<?php $list=M("article")->query("select * from cms_article where (catid in(61) and status<>0)");$list=array_slice($list,0,3);if(count($list)==0) : echo "" ;else: foreach($list as $key=>$list_val): extract($list_val);$index=$key+1;$url=U("/show/".$id);?><li class="<?php echo ($index % 3==0?'last':''); ?>">
							<div class="img">
								<a href="<?php echo ($url); ?>">
									<img src="<?php echo ($thumb); ?>" width="340px" height="240px">
								</a>
							</div>
							<a href="<?php echo ($url); ?>">
								<?php echo ($title); ?>
							</a>
						</li><?php endforeach;endif;?>
					</ul>
				</div>
				<div class="more">
					<?php
 $cate = M('category')->where("status=1")->find(intval(61)); extract($cate); $url = U('/cate/'.$id); ?><a href="<?php echo ($url); ?>">查看更多></a>
				</div>
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