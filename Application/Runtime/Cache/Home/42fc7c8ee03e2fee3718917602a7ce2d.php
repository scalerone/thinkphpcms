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
							<?php $cates= M("category")->where("status=1")->order("sort ASC")->select();$cates=cateSort2Child($cates,0);$cates=array_slice($cates,0,20);if(count($cates)==0) : echo "" ;else: foreach($cates as $key=>$cate_val): extract($cate_val);$index=$key+1;if($type==1) $url=U("/list/".$id);if($type==2) $url=U("/page/".$id);?><li class="<?php echo ($cate['id']==$id?'active':''); ?>"><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a></li><?php endforeach;endif; ?>
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
							<?php echo ($cate['catname']); ?>
						</span>
						<span class="h4"><?php echo ($cate['alias']); ?></span>
					</p>
				</div>
				<div class="right float_r">
					<p>
						<i class="icon-home"></i>
						<a href="/">首页</a>>
						
					</p>
				</div>
			</div>
		</div>
		<div class="content list service">
			<div class="container">
				<ul>
					<li class="clear">
						<div class="img float_l">
							<a href="">
								<img src="images/服务于支持_03.jpg" alt="" height="230px" width="345px">
							</a>
						</div>
						<div class="text float_l">
							<h2><a href="">新宁物流举行安徽睿德智造智能系统有限公司成立暨签约仪式</a></h2>
							<p>2016年9月18日，由新宁物流、明匠智能、张晖团队合资的安徽睿德智能系统有限公司成立暨签约仪式在新宁物
							流总部举行。新宁物流董事长王雅军、明匠智能董事长陈俊、张晖团队、德国弗劳恩霍夫物流研究院宋伟等近20
							人参加了本次签约仪式。
							</p>
							<span class="date">2016-12-16</span>
						</div>
					</li>
					<li class="clear">
						<div class="img float_l">
							<a href="">
								<img src="images/服务于支持_06.jpg" alt="" height="230px" width="345px">
							</a>
						</div>
						<div class="text float_l">
							<h2><a href="">新宁物流举行安徽睿德智造智能系统有限公司成立暨签约仪式</a></h2>
							<p>2016年9月18日，由新宁物流、明匠智能、张晖团队合资的安徽睿德智能系统有限公司成立暨签约仪式在新宁物
							流总部举行。新宁物流董事长王雅军、明匠智能董事长陈俊、张晖团队、德国弗劳恩霍夫物流研究院宋伟等近20
							人参加了本次签约仪式。
							</p>
							<span class="date">2016-12-16</span>
						</div>
					</li>
					<li class="clear">
						<div class="img float_l">
							<a href="">
								<img src="images/服务于支持_08.jpg" alt="" height="230px" width="345px">
							</a>
						</div>
						<div class="text float_l">
							<h2><a href="">新宁物流举行安徽睿德智造智能系统有限公司成立暨签约仪式</a></h2>
							<p>2016年9月18日，由新宁物流、明匠智能、张晖团队合资的安徽睿德智能系统有限公司成立暨签约仪式在新宁物
							流总部举行。新宁物流董事长王雅军、明匠智能董事长陈俊、张晖团队、德国弗劳恩霍夫物流研究院宋伟等近20
							人参加了本次签约仪式。
							</p>
							<span class="date">2016-12-16</span>
						</div>
					</li>
					<li class="clear">
						<div class="img float_l">
							<a href="">
								<img src="images/服务于支持_10.jpg" alt="" height="230px" width="345px">
							</a>
						</div>
						<div class="text float_l">
							<h2><a href="">新宁物流举行安徽睿德智造智能系统有限公司成立暨签约仪式</a></h2>
							<p>2016年9月18日，由新宁物流、明匠智能、张晖团队合资的安徽睿德智能系统有限公司成立暨签约仪式在新宁物
							流总部举行。新宁物流董事长王雅军、明匠智能董事长陈俊、张晖团队、德国弗劳恩霍夫物流研究院宋伟等近20
							人参加了本次签约仪式。
							</p>
							<span class="date">2016-12-16</span>
						</div>
					</li>
					<li class="clear">
						<div class="img float_l">
							<a href="">
								<img src="images/服务于支持_12.jpg" alt="" height="230px" width="345px">
							</a>
						</div>
						<div class="text float_l">
							<h2><a href="">新宁物流举行安徽睿德智造智能系统有限公司成立暨签约仪式</a></h2>
							<p>2016年9月18日，由新宁物流、明匠智能、张晖团队合资的安徽睿德智能系统有限公司成立暨签约仪式在新宁物
							流总部举行。新宁物流董事长王雅军、明匠智能董事长陈俊、张晖团队、德国弗劳恩霍夫物流研究院宋伟等近20
							人参加了本次签约仪式。
							</p>
							<span class="date">2016-12-16</span>
						</div>
					</li>
				</ul>
				<div class="pages">
					<p>
						<a href=""><</a>
						<span>1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<a href="">></a>
					</p>
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