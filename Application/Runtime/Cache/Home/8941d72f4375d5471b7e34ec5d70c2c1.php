<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="baidu-site-verification" content="M5xAYOapFT" />
  <title><?php echo (C("SITE_TITLE")); ?></title>
  <meta name="keywords" content="<?php echo (C("SITE_KEYWORDS")); ?>">
  <meta name="description" content="<?php echo (C("SITE_DESCRIPTION")); ?>">
  <link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
  <link rel="stylesheet" href="/Public/css/lrtk.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="/Public/css/highslide.css" />
  <link rel="stylesheet" type="text/css" href="/Public/css/style.css">
  <style type="text/css">
    .highslide img {
      cursor: url(cn/highslide/graphics/zoomin.cur), pointer !important;
    }
  </style>
</head>

<body>
  <div class="toplines" style="height:35px;color: #c4c4c4;  line-height: 30px;">
    <div style=" width:1003px;margin:0 auto;">
      <table>
        <tbody>
          <tr style="font-family:'微软雅黑', '黑体'">
            <td style="line-height:0px;"><img src="/Public/images/wico03.png" /></td>

            <?php if(empty($_SESSION['member_name'])): ?><td class="login-bar" style="overflow:hidden"> <b>客服电话</b> <b style="font-size:16px;"><?php echo (C("SITE_TELPHONE")); ?> &nbsp;&nbsp;<b style="font-size:12px"><a class="cd-signin" target="_blank">登录</a>&nbsp;|&nbsp;<a target="_blank" class="cd-signup">注册</a> </b></td>
            <?php else: ?>
                <td class="" style="overflow:hidden"> <b>客服电话</b> <b style="font-size:16px;"><?php echo (C("SITE_TELPHONE")); ?>  &nbsp;&nbsp;<b style="font-size:12px"><a class="cd-signin" target="_blank"><?php echo (session('member_name')); ?></a>&nbsp;&nbsp;<a href="<?php echo U('Home/User/logout');?>" target="_blank" class="cd-signup">退出</a> </b></td><?php endif; ?> 
          </tr>
        </tbody>
      </table>
    </div>
    <div id="hidden" onclick="$(this).attr('style','display:none');$('#hiddenimg').attr('style','display:none');" style="display:none; opacity:1; background:#000  position:fixed;width:1440px; height:100%; text-align:center;">
    </div>
    <div id="hiddenimg">
      
      <div id="hiddenimg2" style=" height:100px; background:#ddd; display:none; text-align:center; line-height:36px;">
        打开微信，点击底部的″发现″，使用″扫一扫″
        <br />即可关注xxxx官方微信。
      </div>
    </div>
  </div>
  <div class="toplogonavbg">
    <div class="toplogonav">
      <a href="/"><img src="<?php echo (C("SITE_LOGO")); ?>" width="266" height="79" class="f-left" /></a>
      <div class="toplogoright">
        <a href="/">首页</a>&nbsp; | &nbsp;
        <?php
 $cate = M('category')->where("status=1")->find(intval(85)); extract($cate); ?><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a>&nbsp; | &nbsp;
        <?php
 $cate = M('category')->where("status=1")->find(intval(86)); extract($cate); ?><a href="<?php echo ($url); ?>"><?php echo ($catname); ?></a>
      </div>
      <br clear="all" />
    </div>
  </div>
  <style type="text/css">
    /* banner S */
    
    .banner {
      height: 604px;
    }
    
    .banner .flexslider {
      position: relative;
      height: 100%;
      overflow: hidden;
      background: url(../images/loading.gif) 50% no-repeat;
    }
    
    .banner .slides {
      position: relative;
      height: 100%;
      z-index: 1;
    }
    
    .banner .slides li {
      height: 100%;
    }
    
    .banner .flex-control-nav {
      position: absolute;
      bottom: 10px;
      z-index: 2;
      width: 100%;
      text-align: center;
    }
    
    .banner .flex-control-nav li {
      margin: 0 5px;
      display: inline-block;
      *zoom: 1;
      *display: inline;
      width: 15px;
      height: 15px;
      text-align: center;
      border-radius: 50%;
      background-color: #fff;
      line-height: 13px;
    }
    
    .banner .flex-control-nav a {
      display: inline-block;
      *zoom: 1;
      *display: inline;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      -moz-border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
      text-indent: 100px;
    }
    
    .banner .flex-control-nav .flex-active {
      background-color: #b1120d;
    }
    
    .banner .flex-direction-nav {
      position: absolute;
      z-index: 3;
      width: 100%;
      top: 45%;
    }
    
    .banner .flex-direction-nav li a {
      display: block;
      width: 50px;
      height: 50px;
      overflow: hidden;
      cursor: pointer;
      position: absolute;
    }
    
    .banner .flex-direction-nav li a.flex-prev {
      left: 40px;
      background: url(../images/prev.png) center center no-repeat;
    }
    
    .banner .flex-direction-nav li a.flex-next {
      right: 40px;
      background: url(../images/next.png) center center no-repeat;
    }
    /* banner E */
  </style>
  <div class="banner">
    <div class="flexslider">
      <ul class="slides">
      <?php $list =M('ads_plate_list')->where(array('plate_id'=>1))->order('createtime DESC')->limit(8)->select();foreach($list as $val): extract($val); ?><li style="background:url(<?php echo ($thumb); ?>) 50% 0 no-repeat;"></li><?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div style="background:#ececef; max-width:1920px;
	min-width:1003px;">
    <!-- <div class="inicos">
      <ul class="inicoconent">
        <li><img src="images/ico01.jpg" width="80" height="59" /><br /> 无抵押无担保<br /> 0担保，纯信用 </li>
        <li><img src="images/ico02.jpg" width="80" height="59" /><br /> 门槛低<br /> 月入4000元即可申请</li>
        <li><img src="images/ico03.jpg" width="80" height="59" /><br /> 额度最高50万 </li>
        <li><img src="images/ico04.jpg" width="80" height="59" /><br /> 最长可贷48个月 </li>
        <li><img src="images/ico05.jpg" width="80" height="59" /><br /> 简单、快速<br /> 最快1天放款</li>
        <li><img src="images/ico06.jpg" width="80" height="59" /><br /> 还款压力小、借款10万元<br /> 月供最低仅需三千</li>
      </ul>
    </div> -->
    <div class="incontent">
      <dl class="inconrights01" style="width:983px; padding:25px 0 25px 20px;">
      <?php  $id = I('id'); $articles = get_article($id,'id,title,summary,content,catid,addtime,thumb,is_top,is_rec,is_hot,hits','10','sort ASC',$page=true,$pageSize='10'); ?>
      <?php if(is_array($articles['list'])): foreach($articles['list'] as $key=>$vo): ?><dd>
          <dl class="subproslists">
            <dt>
              <?php echo ($vo["title"]); ?>
            </dt>
            <dd>
              <div style="height:250px; overflow:hidden;">
                <img src="<?php echo ($vo["thumb"]); ?>" width="250" height="260">
              </div>
              <div class="desc">
                <p><?php echo ($vo["summary"]); ?></p>
              </div>
              <div class="time">
                时间：<?php echo (date('Y-m-d',$vo['addtime'])); ?>
              </div>
              <div style="padding:10px 0 0 0;">
                <a id="movie_id" data-id="<?php echo ($vo["id"]); ?>"  href="javascript:;" style="width:150px; text-align:center; display:block; margin:0 auto; height:35px; line-height:35px; color:#FFF; font-size:16px; font-family:微软雅黑; background:#828282;">立即观看</a>
              </div>
            </dd>
          </dl>
        </dd><?php endforeach; endif; ?>
        <?php
 $cate = M('category')->where("status=1")->find(intval(85)); extract($cate); ?><dd class="more">
           <div class="pages">
              <?php echo $articles['page']; ?>
          </div>
        </dd>
      </dl>
      <br clear="all" />
    </div>
  </div>
 <div class="infoots">
    <div class="infoottext">
        <?php echo (htmlspecialchars_decode(C("SITE_CR"))); ?>
    </div>
  </div>

  <div class="cd-user-modal">
    <div class="cd-user-modal-container">
      <ul class="cd-switcher">
        <li><a href="#0">用户登录</a></li>
        <li><a href="#0">注册新用户</a></li>
      </ul>

      <div id="cd-login">
        <!-- 登录表单 -->
        <form class="cd-form login-from">
          <p class="fieldset">
            <label class="image-replace cd-username" for="signin-username">用户名或手机</label>
            <input name="name" class="full-width has-padding has-border" id="signin-username" type="text" placeholder="用户名或手机">
          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="signin-password">密码</label>
            <input name="pass" class="full-width has-padding has-border" id="signin-password" type="password" placeholder="输入密码">
          </p>

          <!-- <p class="fieldset">
            <input type="checkbox" id="remember-me" checked>
            <label for="remember-me">记住登录状态</label>
          </p> -->

          <p class="fieldset">
            <input id="login" class="full-width2" type="submit" value="登 录">
          </p>
        </form>
      </div>

      <div id="cd-signup">
        <!-- 注册表单 -->
        <form class="cd-form register-form">
          <p class="fieldset">
            <label class="image-replace cd-username" for="reg-username">用户名或手机</label>
            <input name="telphone" class="full-width has-padding has-border" id="reg-username" type="text" placeholder="输入邮箱或手机号码">
          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="reg-password">密码</label>
            <input name="pass" class="full-width has-padding has-border" id="reg-password" type="password" placeholder="输入密码">
          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="reg-code">验证码</label>
            <input name="code" style="width:25%;" class="full-width has-padding has-border" id="reg-code" type="text" placeholder="输入验证码">
            <img id="verify" src="<?php echo U('Home/User/Verify');?>" style="border:1px solid #eee; height: 45px;width: 180px;display:inline-block;*zoom:1;*display:inline;vertical-align: middle;">
          </p>

          <!--  <p class="fieldset">
           <input type="checkbox" id="accept-terms">
           <label for="accept-terms">我已阅读并同意 <a href="#0">用户协议</a></label>
         </p> -->

          <p class="fieldset">
            <input id="register" class="full-width2" type="submit" value="注册新用户">
          </p>
        </form>
      </div>

      <a href="javascript:;" class="cd-close-form">关闭</a>
    </div>
  </div>

  <script type="text/javascript" src="/Public/js/jquery-1.11.min.js"></script>
  <script type="text/javascript" src="/Public/js/login.js"></script>
  <script type="text/javascript" src="/Public/js/jquery.flexslider-min.js"></script>
  <script type="text/javascript" src="/Public/js/plugin/layer/layer.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.flexslider').flexslider({
        directionNav: false,
        pauseOnAction: false
      });

      //下载文件
      (function(){
        $('.innewslist table tr td .down').on('click',function(){
          var that = $(this);
          var check_login_url = '<?php echo U("File/check_login");?>';
          //var file_url = '<?php echo U("File/index");?>';
          $.ajax({
            url: check_login_url,
            type: 'post',
            dataType: 'json',
            success: function(response){
              if(response.status == 1){
                //文件下载
                var id = that.data('id');
                console.log(id);
                window.location.href = '/Home/File/index/id/' + id;
              }else{
                  layer.msg(response.msg,{icon:2});
                  setTimeout(function(){
                    $('.cd-signin').trigger('click');
                  },3000);
              }
            },
            error: function(response){
              layer.msg('发生错误!',{icon:2});
            }
          });
          
          return false;
        });
      })();
      //查看视频
      $('.inconrights01 div a').on('click', function () {
        var check_login_url = '<?php echo U("Show/check_login");?>';
        $.ajax({
          url: check_login_url,
          type: 'post',
          dataType: 'json',
          success:function(response){
            if(response.status == 1){
              //查看视频
              var url = '/show/' + $('#movie_id').data('id') + '.html';
              layer.open({
                type: 1,
                title: '观看视频',
                area: ['560px', '360px'],
                shade: 0.8,
                closeBtn: 1,
                maxmin: true,
                shadeClose: true,
                content: "<video width='100%' height='100%' src="+url+" controls autobuffer></video>"
              });
            }else{
              layer.msg(response.msg,{icon:2});
              setTimeout(function(){
                $('.cd-signin').trigger('click');
              },3000);
            }
          },
          error: function(response){
            layer.msg('请先登录后再操作！',{icon:2});
          }
        });
      });
    });
    //更换验证码
    (function(){
      $('#verify').on('click',function(){
        $(this).attr('src',"<?php echo U('Home/User/Verify');?>");
      });
    })();
    //登录
    (function(){
      $('#login').on('click',function(){
        var url = "<?php echo U('Home/User/login');?>";
        var uname = $.trim($('#signin-username').val());
        var password = $.trim($('#signin-password').val());
        if(!(uname.match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/) || uname.match(/^[1][3|5|8|7][0-9]{9}$/))){
          showMsg('用户名格式不正确!');
          $('#signin-username').focus();
          return false;
        }
        if(password.length < 6){
          showMsg('密码格式错误!');
          $('#signin-password').focus();
          return false;
        }
        $.ajax({
          url: url,
          type: 'post',
          dataType: 'json',
          data: $('.login-from').serialize(),
          beforeSend: function(){
            $('#login').removeAttr('disabled','true');
          },
          success: function(response){
            if(response.status == 1){
              layer.msg(response.msg,{icon:1});
              setTimeout(function(){
                document.location.reload();
              },2000);//重新加载当前页面
            }else{
              layer.msg(response.msg,{icon:0})
            }
          },
          error: function(response){
            layer.msg('登录失败!',{icon:2});
            console.log(response);
          },
          complete: function(){
            $('#login').removeAttr('disabled');
          }
        });

        function showMsg(str){
          layer.msg(str,{icon:2});
        }
        
        return false;
      });
    })();
    //注册
    (function(){
      $('#register').on('click',function(){
        var uname = $.trim($('#reg-username').val());
        var pass = $.trim($('#reg-password').val());
        if(!(uname.match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/) || uname.match(/^[1][3|5|8|7][0-9]{9}$/))){
          showMsg('手机号码或者邮箱格式不正确!');
          $('#reg-username').focus();
          return false;
        }
        if(pass.length < 6){
          showMsg('密码长度必须大于6位数!');
          $('#reg-password').focus();
          return false;
        }
        if($('#reg-code').val() == ''){
          showMsg('请输入验证码!');
          $('#reg-code').focus();
          return false;
        }

        function showMsg(str){
          layer.msg(str,{icon:2});
        }
        var url = "<?php echo U('Home/User/register');?>";
        var register_from = $('.register-form');
        $.ajax({
          url: url,
          type: 'post',
          dataType: 'json',
          data: register_from.serialize(),
          beforeSend: function(){
            $('#register').attr('disabled',"true");
          },
          success: function(response){
            if(response.status == 1){
              layer.msg(response.msg,{icon:1});
              setTimeout(function(){
                document.location.reload();
              },2000);//重新加载当前页面
            }else{
              layer.msg(response.msg,{icon:0})
            }
          },
          error: function(response){
            layer.msg('出现错误!',{icon:2});
            console.log(response);
          },
          complete: function(){
            $('#register').removeAttr('disabled');
          }
        });
        return false;
      });
    })();
  </script>
</body>
</html>