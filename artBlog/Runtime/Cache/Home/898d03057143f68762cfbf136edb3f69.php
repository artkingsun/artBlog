<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ArtBlog - 我的博客</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Public/css/artBlog.css" />
    <link rel="icon" href="Public/images/icon.png" />
</head>
<body>
<!-- 导航 开始-->
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?s=Home/Index/home">ArtBlog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php?s=Home/Index/home">首页</a></li>
                <li class="active"><a href="index.php?s=Home/Index/myBlog">我的博客</a></li>
                <li><a href="index.php?s=Home/Index/workHelp">办公助手</a></li>
                <li><a href="index.php?s=Home/Index/demoShow">案例展示</a></li>
                <li><a href="index.php?s=Home/Index/about">关于我们</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right" id="login">
                <li><a href="index.php?s=Home/Index/login">登录</a></li>
                <li><a href="index.php?s=Home/Index/register">注册</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="user">
                <li class="active" class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="name">昵称 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?s=Home/Index/myBlog">我的主页</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?s=Home/Index/personSet">个人设置</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?s=Home/Index/messageCenter">消息中心</a></li>
                        <li class="divider"></li>
                        <li><a href="#" id="exit">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--导航 结束-->

<!--内容 开始-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 myBlog-left">
            <div class="col-md-12" id="userInfo">
                <!--<img src="Public/images/fly.png" alt="..." class="img-circle img-responsive" id="userpic">-->
                <!--<h3 class="direction-center" id="username">艺术家艺术家艺术家</h3>-->
                <!--<a class="btn btn-danger btn-block"><span class="glyphicon glyphicon-heart"></span> 访问（1620）</a>-->
                <!--<br/>-->
                <!--<a class="btn btn-danger btn-block"><span class="glyphicon glyphicon-share-alt"></span> 分享（166600）</a>-->
                <!--<br/>-->
            </div>
            <div class="col-md-12">
                <a class="btn btn-success btn-block btn-lg"  href="index.php?s=Home/Index/publishBlog" id="addEssay">
                    <span class="glyphicon glyphicon-edit"></span> 撰写博客
                </a>
                <br/>
                <div class="list-group" id="essayType">
                    <!--<a href="javascript:;" class="list-group-item active">全部博文<span class="badge">4</span></a>-->
                    <!--<a href="javascript:;" class="list-group-item">Web前端<span class="badge">4</span></a>-->
                    <!--<a href="javascript:;" class="list-group-item">Web后台<span class="badge">4</span></a>-->
                    <!--<a href="javascript:;" class="list-group-item">数据库<span class="badge">4</span></a>-->
                    <!--<a href="javascript:;" class="list-group-item">服务器<span class="badge">4</span></a>-->
                </div>
                <!--<div class="input-group">-->
                <!--<input type="text" class="form-control" placeholder="Search...">-->
                <!--<span class="input-group-btn">-->
                <!--<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> </button>-->
                <!--</span>-->
                <!--</div>-->
            </div>

        </div>

        <div class="col-md-10">
            <div class="col-md-12 row-sliver myBlog-right">
                <!--博文列表-->
                <div class="row" id="essayList">
                    <!--<div class="col-md-4">-->
                    <!--<div class="thumbnail">-->
                    <!--<a  href="index.php?s=Home/Index/blogDetail">-->
                    <!--<img src="Public/images/after.png" alt="...">-->
                    <!--<div >-->
                    <!--<p class="btn">基础基础基础基础基础基础基础基础基础基础(20)</p>-->
                    <!--</div>-->
                    <!--</a>-->
                    <!--<p class="btn">2015-07-07 00:00:00</p>-->
                    <!--<a class="btn"><span class="glyphicon glyphicon-heart"></span> 评价</a>-->
                    <!--<a class="btn"><span class="glyphicon glyphicon-share-alt"></span> 分享</a>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!---->
                </div>
                <div class="row">
                    <div class="col-md-2 last-page"  style="display: none">
                        <button class="btn btn-default btn-block btn-lg" id="lastPage"><span class="glyphicon glyphicon-chevron-left"></span> 上一页</button>
                    </div>
                    <div class="col-md-2 next-page"  style="display: none">
                        <button class="btn btn-default btn-block btn-lg" id="nextPage">下一页 <span class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!--内容 结束-->

<!--结尾 开始-->
<div class="footer" id="footer">

</div>
<!--结尾 结束-->
<script type="text/javascript" src="Public/js/jquery.min.js" ></script>
<script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="Public/js/artBlog.js" ></script>
<script type="text/javascript" src="Public/js/myBlog.js" ></script>
</body>
</html>