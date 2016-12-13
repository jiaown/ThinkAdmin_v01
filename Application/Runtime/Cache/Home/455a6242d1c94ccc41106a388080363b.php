<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线留言--<?php echo (C("TITLE")); ?></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" media="all" href="/Public/pc/css/style.css" />       
<script src="/Public/pc/js/jquery-1.4.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="/Public/pc/css/article.css" type="text/css" />
<link rel="shortcut icon" href="/Public/pc/images/favicon.ico" type="image/x-icon" />
<style>
.message{ width:600px; height:auto;float:left;padding-left:50px;margin-top:80px;}
.message li{ width:500px;height:40px; float:left; margin:0px; padding:0px;margin-bottom:10px;}
.message li input{ height:30px; line-height:30px; width:350px; border:1px solid #ccc;}
.message li p.message_title{ width:100px; height:30px; float:left; text-align:right; line-height:30px;}
.message li p.message_content{ width:400px; height:25px; float:left;}
.message li.contentb{ width:500px;height:160px; float:left;}
.message li.contentb textarea{ width:370px; height:120px; border:1px solid #ccc }
.message li.yzm{ width:500px;height:60px; float:left;}
.message li p.message_yzminput{ width:100px; height:15px; float:left;}
.message li p.message_yzminput input{ width:80px;}
.message li p.message_yzmico{ width:100px; height:40px; float:left;}
.message li p.message_sub{ width:170px; height:40px; float:left; text-align:right;}
.message li .bookbut{ background:#4ab7fe; border:0; font-size:14px; font-weight:bold; color:#fff; line-height:30px;height:30px;}
.c_red{color:#f00;}
</style>
</head>
<body>
<div id="header_wrap">
    <div id="header">
        <div style="float: left; width: 310px;">
            <h1>
                <a href="/" title=""></a>
                <div class="" id="logo-sub-class">
                </div>
            </h1>
        </div>
        <!-- 导航 -->
        <div id="navi">
            <ul id="jsddm">
                <li><a class="navi_home" href="/">主页</a></li>
                <li> <a href="/Home/Article/newslist/cateid/9">最新资讯</a> </li>
                <li>
                    <a href="javascript:;">编程世界</a>
                    <ul>
                    <li><a href="/Home/Article/newslist/cateid/20">前端开发</a></li>
                    <li><a href="/Home/Article/newslist/cateid/24">后端开发</a></li>
                    <li><a href="/Home/Article/newslist/cateid/28">微信开发</a></li>
                    <li><a href="/Home/Article/newslist/cateid/29">数据库</a></li>
                    </ul>
                </li>
                <li><a href="/Home/Case/caselist/cateid/25">案例展示</a></li>
                <li><a href="/Home/Page/index/aid/9">关于jiaown</a></li>
                <li><a href="/Home/Message/index">在线留言</a></li>
            </ul>
            <div style="clear: both;"></div>
        </div>
        
        <!-- 搜索框 -->
        <div class="searchbox">
            <div class="widget" style="height: 30px; padding-top:20px;">
                <div style="float: left;">
                <form name="formsearch" action="/Home/Search/index">                
                    <input name="q" type="text" placeholder="输入搜索.." />
                </div>
                <div style="float:left;" class="pick">
                <input type="text" name="ty" id="ty" readonly="readonly" value="资讯">
                <ul>
                    <li data-type="资讯">资讯</li>
                    <li data-type="案例">案例</li>
                </ul>
                </div>
                <div style="float: left;">
                    <input type="submit" value="">
                </div>
                </form>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.pick').hover(function(){
            $('.pick ul').show();
        },function(){
             $('.pick ul').hide();
        });

        $('.pick ul li').click(function(){
            var vals=$(this).attr('data-type');
            $('#ty').val(vals);
            $('.pick ul').hide();
        })
    });
</script>
<div id="container">
    <div id="content">
        <div class="post" style="border-right: solid 1px #000000;margin-top: 10px;padding-right:40px;">

            <div class="path"><a href='/'>主页</a> > <a href='javascript:;'>在线留言</a> </div>

            <div class="div-content">
                   
                <div class="message">
                  <form method="post" action="">
                    <ul>
                      <li>
                        <p class="message_title"><span class="c_red">* </span>昵称：</p>
                        <p class="message_content">
                          <input type="text" name="nickname" id="nickname" size="30" maxlength="10" valid="required|limit" errmsg="请输入姓名！|姓名长度必须在1-15个字符之间！" max="10" min="1">
                        </p>
                      </li>
                      <li>
                        <p class="message_title"><span class="c_red">* </span>邮箱地址：</p>
                        <p class="message_content">
                        <input name="email" type="text"  size="30" valid="isEmail" >
                        </p>
                      </li>  
                      <li>
                        <p class="message_title">网址：</p>
                        <p class="message_content">
                          <input type="text" name="site" size="30" id="telephone" maxlength="11" valid="required|isMobile|limit"  max="11" min="11">
                        </p>
                      </li>        
                      <li class="contentb">
                        <p class="message_title">留言内容：</p>
                        <p class="message_content">
                          <textarea name="content" id="content1" valid="required" cols="50" rows="7" ></textarea>
                        </p>
                      </li>
                      <li class="yzm">
                        <p class="message_title"><span class="c_red">* </span>验证码：</p>
                        <p class="message_yzminput">
                          <input type="text" name="verify" id="valid" maxlength="4" size="8" valid="required|custom" custom="ckvaild" errmsg="请输入验证码！|验证码不正确！">
                        </p>
                        <p class="message_yzmico">
                            <img id="verify" src="/Home/Message/code" title="看不清？点击一下！" alt="看不清？点击一下！" style="cursor:pointer;" onclick="javascript:this.src='/Home/Message/code'+'?'+Math.random()" align="absmiddle" width="100" height="30">
                        </p>
                        <p class="message_sub">
                            <input type="submit" style="width:160px;">
                        </p>
                      </li>
                    </ul>
                    </form>
                  </div>


            </div>

        </div>
    </div>

<div id="xh_sidebar">
    <div class="widget">
        <h3>热门资讯</h3>
        <ul id="ulHot">
            <?php if(is_array($art)): $i = 0; $__LIST__ = $art;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <div class="zuo" style=""><a href="/Home/Article/newsdetail/aid/<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["pic"]); ?>" width="83" title="<?php echo ($vo["title"]); ?>"></a></div>
                    <div class="you" style=""><a href="/Home/Article/newsdetail/aid/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="widget links" id="weixin">
        <h3>微信公众号</h3>
        <div class="textwidget">
            <img src="/Public/pc/images/wechat.jpg">
        </div>
        <div class="clear">
        </div>
    </div> 
    <div class="widget links" style="display:none;">
        <h3>友情链接</h3>
        <ul>
        <li><a href='#' target='_blank'>链接1</a> </li>
        <li><a href='#' target='_blank'>链接2</a> </li>
        <li><a href='#' target='_blank'>链接3</a> </li>
        <li><a href='#' target='_blank'>链接4</a> </li>
        <li><a href='#' target='_blank'>链接5</a> </li>
        </ul>
        <div class="clear">
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(window).scroll(function(){
        var sc= $(window).scrollTop();
        if(sc>640){
            $("#weixin").addClass('weixinfix');
        }else{
            $("#weixin").removeClass('weixinfix');
        }

    })
</script>

<div class="clear"></div>
</div>


<div id="footer_wrap">
    <div id="footer">
        <div class="footer_navi">
            <ul id="" class="menu">
                <li id="menu-item-156" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-156">
                    <a href="tencent://message/?uin=316231881&amp;Site=JooIT.com&amp;Menu=yes" id="qq" target="_blank">联系QQ</a>
                <li id="menu-item-157" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-157">
                    <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&amp;email=316231881@qq.com" class="footer-link" target="_blank">发送Email</i></a>
                <li id="menu-item-158" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-158">
                    <a href="javascript:;" class="linkwe">联系微信<img class="mywe" src="/Public/pc/images/weixin.jpg"></a>
                </li>
            </ul>
        </div>
    <!-- 版权 -->
    <div class="footer_info">
        <span class="legal">Copyright &#169; 2015-2018 qq邮箱：<?php echo (C("email")); ?> 版权所有&#160;&#160;&#160;
        <a href="javascript:;"><?php echo (C("icp")); ?></a>&#160;&#160;&#160;
    </div>
    </div>
    <div class="totop" style="">TOP</div>
</div>

<script type="text/javascript">
    $(function(){
        $('img.mywe').hide();
        $('a.linkwe').hover(function(){
            $('img.mywe').show();
        },function(){
            $('img.mywe').hide();
        });

        
        $(window).scroll(function(){
            var sc= $(window).scrollTop();
            if(sc>500){
                $('.totop').show();
            }else{
                $('.totop').hide();
            }
        });

        $('.totop').click(function(){
            $('body,html').animate({
                scrollTop:0
            },1000);
        })

    });

    // 百度统计
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?ec78288d5b62fe393dda365fe4eb600a";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
</script>


<!-- 菜单向下箭头 -->
<script type="text/javascript" src="/Public/pc/js/z700bike_global.js"></script>
</body>
</html>
<script type="text/javascript">
    var mobileAgent = new Array("iphone", "ipod", "ipad", "android", "mobile", "blackberry", "webos", "incognito", "webmate", "bada", "nokia", "lg", "ucweb", "skyfire");
    var browser = navigator.userAgent.toLowerCase(); 
    var isMobile = false; 
    for (var i=0; i<mobileAgent.length; i++){
        if (browser.indexOf(mobileAgent[i])!=-1){
        isMobile = true; 
        location.href = "http://www.jiaown.com/Wap/Message/index";
        break; 
        } 
    } 
</script>