<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ArtBlog - demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Public/css/artBlog.css" />
    <link rel="stylesheet" href="Public/css/demoShow.css" />
    <link rel="icon" href="Public/images/icon.png" />
</head>
<body>
<!-- 导航 开始-->
<nav class="navbar navbar-default  navbar-inverse navbar-fixed-top">
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
                <li><a href="index.php?s=Home/Index/myBlog">我的博客</a></li>
                <li><a href="index.php?s=Home/Index/workHelp">办公助手</a></li>
                <li class="active"><a href="index.php?s=Home/Index/demoShow">案例展示</a></li>
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
    <div id="container">
        <!--<div class="wrapper">-->
            <!--<div class="item">-->
                <!--<a href="Public/demoShow/caidan.html" target="_blank">-->
                    <!--<img src="Public/images/css3.png" />-->
            	    <!--<span class="information">-->
            	        <!--<strong>标题</strong>内容-->
            	    <!--</span>-->
                <!--</a>-->
            <!--</div>-->
        <!--</div>-->

    </div>
    <div>
        <button id="addDemoBtn"  class="addDemo" data-toggle="modal" data-target="#addDemoModal"><p>addDemo</p></button>
    </div>
</div>
<!--内容 结束-->

<!--结尾 开始-->
<div class="footer" id="footer">

</div>

</div>
<!--结尾 结束-->

<!-- addDemoModal -->
<div class="modal fade" id="addDemoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">addDemo</h4>
            </div>
            <div class="panel-body">
                <input type="text" class="form-control" placeholder="DemoTitle" id="demoTitle">
                <br/>
                <textarea class="form-control" rows="4" placeholder="DemoDescription" id="demoDesc"></textarea>
                <br/>
                <select class="form-control clo-md-2" id="demoType">
                    <option value="HTML/HTML5">HTML/HTML5</option>
                    <option value="CSS/CSS3">CSS/CSS3</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="jQuery">jQuery</option>
                </select>
                <br/>
                <input type="text" class="form-control" placeholder="DemoURL" id="demoURL">
                <br/>
                <button type="button" class="btn btn-warning btn-block btn-lg"  data-dismiss="modal" id="addDemo" data-dismiss="modal">addDemo</button>
            </div>
            <!--<div class="modal-footer">-->
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <!--<button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>-->
            <!--</div>-->
        </div>
    </div>
</div>
<script type="text/javascript" src="Public/js/jquery.min.js" ></script>
<script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="Public/js/artBlog.js" ></script>
<script type="text/javascript" src="Public/js/demoShow.js" ></script>
</body>
</html>