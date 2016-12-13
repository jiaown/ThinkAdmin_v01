<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title><?php echo (C("TITLE")); ?></title>
<meta name="keywords" content="<?php echo (C("KEYWORDS")); ?>" />
<meta name="description" content="<?php echo (C("DESCRIPTION")); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="/Public/pc/css/style.css" />
<script type="text/javascript" src="/Public/pc/js/jquery-1.4.1.min.js"></script>
<!-- <script type="text/javascript" src="/Public/pc/js/jquery.js"></script> -->
<script src="/Public/pc/js/jquery.error.js" type="text/javascript"></script>
<script src="/Public/pc/js/jtemplates.js" type="text/javascript"></script>
<script src="/Public/pc/js/jquery.form.js" type="text/javascript"></script>
<script src="/Public/pc/js/lazy.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/pc/js/wp-sns-share.js"></script>
<script type="text/javascript" src="/Public/pc/js/voterajax.js"></script>
<script type="text/javascript" src="/Public/pc/js/userregister.js"></script>
<link rel="stylesheet" href="/Public/pc/css/pagenavi-css.css" type="text/css" media="all" />
<link rel="stylesheet" href="/Public/pc/css/votestyles.css" type="text/css" />
<link rel="stylesheet" href="/Public/pc/css/voteitup.css" type="text/css" />
<link rel="shortcut icon" href="/Public/pc/images/favicon.ico" type="image/x-icon" />
</head>
<body class="xh_body">

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

<div id="xh_wrapper">
    <div id="xh_container">
    <a name="new"></a>
    <div id="xh_content" style="padding-right:10px;">
        <ul class="listArea">
            <?php if(is_array($indexArr)): $i = 0; $__LIST__ = $indexArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="xh_area_h_3">
                    <div class="arrlist ofh">
                    <div class="xh_265x265">
                        <a href="/Home/Article/newsdetail/aid/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>">
                        <img src="<?php echo ($vo["pic"]); ?>" alt="<?php echo ($vo["title"]); ?>" height="240" width="400"></a>
                    </div>
                    <div class="r ofh">
                        <h2 class="arrlist_title ofh">
                            <a href="/Home/Article/newsdetail/aid/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a>
                        </h2>
                        <span class="time"><?php echo (date("y年m月d日 h:i:s",$vo["time"])); ?></span>
                        <div class="arrlist_entry ofh"><?php echo (msubstr($vo["brief"],0,80)); ?></div>
                    </div>
                        <div class="b">
                            <span title="<?php echo ($vo["likes"]); ?>人赞" class="xh_love"><?php echo ($vo["likes"]); ?></span>
                            <span title="<?php echo ($vo["click"]); ?>人浏览" class="xh_views"><?php echo ($vo["click"]); ?></span>
                        </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div id="pagination">
            <a class="loadmore" href="javascript:;" style="">点击加载更多...</a>
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
<html>
<script type="text/javascript">
    var page=1;
    getlist(page);
    $(".loadmore").click(function(){
        getlist(++page);
    });
    
    function getlist(page){
         $.ajax({
            type:"GET",
            url:"/Home/Index/getlist/p/"+page,
            dataType:"json",
            success:function(data){
                if(data==null || data==''){
                    $(".loadmore").html('没有了');
                    $(".loadmore").unbind("click");
                }
                var html="";
                $(data).each(function(k,v){
                    html+='<li class="xh_area_h_3"><div class="arrlist ofh"><div class="xh_265x265"><a href="/Home/Article/newsdetail/aid/'+v.id+'" title="'+v.title+'"><img src="'+v.pic+'" alt="'+v.title+'" height="240" width="400"></a></div><div class="r ofh"><h2 class="arrlist_title ofh"><a href="/Home/Article/newsdetail/aid/'+v.id+'" title="'+v.title+'">'+v.title+'</a></h2><span class="time">'+getLocalTime(v.time)+'</span><div class="arrlist_entry ofh">'+v.brief.substr(0,70)+'...</div></div><div class="b"><span title="<?php echo ($vo["likes"]); ?>人赞" class="xh_love">'+v.likes+'</span><span title="'+v.click+'人浏览" class="xh_views">'+v.click+'</span></div></div></li>';
                });
                $(".listArea").append(html);
            }

         });
    }

    function getLocalTime(nS) {     
       return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");      
    }
    
    // var page=1;
    // function getlist(page){
    //     $.ajax({
    //         type:"GET",
    //         url:"/Home/Index/getlist/p/"+page,
    //         // dataType: "json",
    //         success:function(data){
    //             if(data==null || data==''){
    //                 $(".loadmore").html('没有了');
    //                 $(".loadmore").unbind("click");
    //             }
    //             var html="";
    //             $(data).each(function(k,v){
    //                 html+="<li>1111</li>";
    //             });
    //             $(".listArea").append(html);
    //         }
    //     });
    // }
    // // getlist(1);
    // $(".loadmore").click(function(){
    //     getlist(++page);
    // });

    var mobileAgent = new Array("iphone", "ipod", "ipad", "android", "mobile", "blackberry", "webos", "incognito", "webmate", "bada", "nokia", "lg", "ucweb", "skyfire");
    var browser = navigator.userAgent.toLowerCase(); 
    var isMobile = false; 
    for (var i=0; i<mobileAgent.length; i++){
        if (browser.indexOf(mobileAgent[i])!=-1){
        isMobile = true; 
        location.href = "http://www.jiaown.com/Wap";
        break; 
        } 
    } 
</script>