<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($pname["name"]); ?>--<?php echo (C("TITLE")); ?></title>
<meta name="description" content="<?php echo ($pname["des"]); ?>" />
<meta name="keywords" content="<?php echo ($pname["keywords"]); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="/Public/pc/css/style.css" />
<script src="/Public/pc/js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="/Public/pc/js/jquery.error.js" type="text/javascript"></script>
<script src="/Public/pc/js/jtemplates.js" type="text/javascript"></script>
<script src="/Public/pc/js/jquery.form.js" type="text/javascript"></script>
<script src="/Public/pc/js/lazy.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/pc/js/wp-sns-share.js"></script>
<script type="text/javascript" src="/Public/pc/js/voterajax.js"></script>
<script type="text/javascript" src="/Public/pc/js/userregister.js"></script>
<link rel="stylesheet" href="/Public/pc/css/votestyles.css" type="text/css" />
<link rel="stylesheet" href="/Public/pc/css/voteitup.css" type="text/css" />
<!-- <link rel="stylesheet" href="/Public/pc/css/list.css" type="text/css" /> -->
<link rel="shortcut icon" href="/Public/pc/images/favicon.ico" type="image/x-icon" />
</head>
<body id="list_style_2" class="list_style_2">
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
<div id="wrapper">
    <div id="xh_container">
        <div class="xh_265x265x00">
                    <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "暂无案例" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="float: left; width: 343px; height: 293px; background-color: #ffffff;
                            border: solid 1px #ccc; margin-left: 15px;margin-top: 15px;">
                            <div style="background-color: #cccccc; width: 313px; height: 188px; margin-top: 16px;
                                margin-left: 14px;">
                                <a href="javascript:;"><img src="<?php echo ($vo["pic"]); ?>" alt="<?php echo ($vo["title"]); ?>" height="188" width="313"></a>
                            </div>
                            <div style="margin-left: 14px; line-height: 25px; margin-top: 10px;">
                                <div style="font-size: 12px;color:#cccccc;"><?php echo (date("y年m月d日 h:i:s",$vo["time"])); ?></div>
                                <div style="font-size: 14px;height:45px;">
                                   <a href="javascript:;"><?php echo ($vo["title"]); ?></a></div>
                            </div>
                        </div><?php endforeach; endif; else: echo "暂无案例" ;endif; ?>
                
            <div style="clear: both;">
            </div>
            <div class="list-page"><?php echo ($page); ?></div>   
        </div>
    </div>
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
        location.href = "http://www.jiaown.com/Wap/Case/caselist";
        break; 
        } 
    } 
</script>