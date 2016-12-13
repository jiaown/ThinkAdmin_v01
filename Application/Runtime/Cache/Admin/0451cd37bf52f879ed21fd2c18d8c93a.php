<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/ad/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/ad/css/main.css"/>
    <script type="text/javascript" src="/Public/ad/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/Public/ad/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/Admin/Index/index">首页</a></li>
                <li><a href="/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">欢迎您：<?php echo session('rolename').session('username');?></a></li>
                <li><a href="/Admin/Admin/edit/id/<?php echo session('id');?>">修改密码</a></li>
                <li><a href="/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
            <?php  $menu = session('menu'); foreach($menu as $k => $v): ?>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i><?php echo $v['pri_name'];?></a>
                    <ul class="sub-menu">
                        <?php foreach($v['sub'] as $k1 => $v1):?>
                        <li><a href="<?php echo U($v1['cname'].'/'.$v1['aname']);?>"><i class="icon-font">&#xe008;</i><?php echo $v1['pri_name'];?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php  endforeach; ?>
                <!-- <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Cate/lst');?>"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                        <li><a href="<?php echo U('Artice/lst');?>"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="<?php echo U('Message/lst');?>"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="<?php echo U('Link/lst');?>"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('System/lst');?>"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="<?php echo U('Admin/lst');?>"><i class="icon-font">&#xe017;</i>管理员管理</a></li>
                        <li><a href="<?php echo U('Privilege/lst');?>"><i class="icon-font">&#xe017;</i>权限管理</a></li>
                        <li><a href="<?php echo U('Role/lst');?>"><i class="icon-font">&#xe017;</i>角色管理</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">留言管理</span></div>
        </div>

        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>
                            <input type="submit" class="btn btn-primary btn2" value="批量删除" form="myform" formaction="/Admin/Message/bdel">
                        </a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" id='check' type="checkbox"></th>
                            <th>ID</th>
                            <th>昵称</th>
                            <th>Email</th>
                            <th>审核状态</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($mes)): $i = 0; $__LIST__ = $mes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="ids[]" value="<?php echo ($vo["mid"]); ?>" class="check" type="checkbox"></td>
                            <td><?php echo ($vo["mid"]); ?></td>
                            <td><?php echo ($vo["nickname"]); ?></td>
                            <td><?php echo ($vo["email"]); ?></td>
                            <td>
                             <?php if($vo['actived'] == '1'): ?>通过
                            <?php else: ?>
                            不通过<?php endif; ?>
                            </td>
                            <td>
                                <a class="link-update" href="/Admin/Message/reply/id/<?php echo ($vo["mid"]); ?>">审核回复</a>
                                <a class="link-del" onclick="return confirm('删除该留言?');" href="/Admin/Message/delete/id/<?php echo ($vo["mid"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
<script type="text/javascript">
    $(function(){
        $('#check').click(function(){
            if($(this).attr('checked')){
                $('.check').attr('checked','checked');
            }else{
                $('.check').removeAttr('checked');
            }
        })
    })
</script>