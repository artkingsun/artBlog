<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ArtBlog - 办公助手</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Public/css/artBlog.css" />
    <link rel="stylesheet" href="Public/css/toTop.css" />
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
                <li class="active"><a href="index.php?s=Home/Index/workHelp">办公助手</a></li>
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
                <!--<img src="Public/images/firefox.png" alt="..." class="img-circle img-responsive" id="userpic">-->
                <!--<h3 class="direction-center" id="username">艺术家</h3>-->
                <!--<a class="btn btn-danger btn-block"><span class="glyphicon glyphicon-heart"></span> 访问（120）</a>-->
                <!--<br/>-->
                <!--<a class="btn btn-danger btn-block"><span class="glyphicon glyphicon-share-alt"></span> 分享（100）</a>-->
                <!--<br/>-->
            </div>
            <div class="col-md-12">
                <button class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#publishWorkModal" id="addWorkHelp">
                    <span class="glyphicon glyphicon-pencil"></span> 添加任务
                </button>
                <br/>
                <div class="list-group" id="workType">
                    <!--<a href="#" class="list-group-item active">所有任务<span class="badge">4</span></a>-->
                    <!--<a href="#" class="list-group-item">未完成任务<span class="badge">4</span></a>-->
                    <!--<a href="#" class="list-group-item">已完成任务<span class="badge">4</span></a>-->
                </div>

            </div>

        </div>
        <div class="col-md-10">
            <div class="col-md-12 row-sliver myBlog-right" id="workList">
                <!--搜索任务-->
                <!--<div class="input-group input-group-lg">-->
                    <!--<input type="text" class="form-control" placeholder="Search...">-->
                    <!--<span class="input-group-btn">-->
                    <!--<button class="btn btn-default search" type="button"><span class="glyphicon glyphicon-search"></span> 搜索任务 </button>-->
                    <!--</span>-->
                <!--</div>-->
                <!--<br>-->
                <!--<div class="panel panel-default panel-success">-->
                    <!--<div class="panel-heading">-->
                        <!--工作标题-->
                        <!--<div class="btn-r">-->
                            <!--开始时间：2015-01-01-->
                        <!--</div>-->
                        <!--<div class="btn-l">-->
                            <!--未完成-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                        <!--<p>-->
                            <!--工作内容-->
                        <!--</p>-->
                        <!--<button class="btn btn-danger btn-l signFinish">标记完成</button>-->
                        <!--<button class="btn btn-warning btn-l delWork" data-toggle="modal" data-target="#delWorkModal">删除任务</button>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="panel panel-default panel-success">-->
                    <!--<div class="panel-heading">-->
                        <!--工作标题-->
                        <!--<div class="btn-r">-->
                            <!--开始时间：2015-01-01-->
                        <!--</div>-->
                        <!--<div class="btn-l">-->
                            <!--未完成-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                        <!--<p>-->
                            <!--工作内容-->
                        <!--</p>-->
                        <!--<button class="btn btn-danger btn-l signFinish">标记完成</button>-->
                        <!--<button class="btn btn-warning btn-l delWork" data-toggle="modal" data-target="#delWorkModal">删除任务</button>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="panel panel-default panel-success">-->
                    <!--<div class="panel-heading">-->
                        <!--工作标题-->
                        <!--<div class="btn-r">-->
                            <!--开始时间：2015-01-01-->
                        <!--</div>-->
                        <!--<div class="btn-l">-->
                            <!--未完成-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                        <!--<p>-->
                            <!--工作内容-->
                        <!--</p>-->
                        <!--<button class="btn btn-danger btn-l">标记完成</button>-->
                        <!--<button class="btn btn-warning btn -l" data-toggle="modal" data-target="#delWorkModal">删除任务</button>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="panel panel-default panel-success">-->
                    <!--<div class="panel-heading">-->
                        <!--工作标题-->
                        <!--<div class="btn-r">-->
                            <!--开始时间：2015-01-01-->
                        <!--</div>-->
                        <!--<div class="btn-l">-->
                            <!--未完成-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                        <!--<p>-->
                            <!--工作内容-->
                        <!--</p>-->
                        <!--<button class="btn btn-danger btn-l">标记完成</button>-->
                        <!--<button class="btn btn-warning btn -l" data-toggle="modal" data-target="#delWorkModal">删除任务</button>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="panel panel-default panel-success">-->
                    <!--<div class="panel-heading">-->
                        <!--工作标题-->
                        <!--<div class="btn-r">-->
                            <!--开始时间：2015-01-01-->
                        <!--</div>-->
                        <!--<div class="btn-l">-->
                            <!--已完成-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                        <!--<p>-->
                            <!--工作内容-->
                        <!--</p>-->
                        <!--<div class="col-md-32">-->
                            <!--完成时间：2015-01-01-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->

            </div>
        </div>
    </div>
</div>
<!--内容 结束-->

<!--结尾 开始-->
<div class="footer" id="footer">

</div>
<!--结尾 结束-->

<!-- 添加任务 -->
<div class="modal fade bs-example-modal-lg" id="publishWorkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加新的工作任务</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <input type="text" class="form-control" placeholder="工作任务标题" id="workTitle">
                    <span id="alertTitle" style="display: none;color: red">标题不能为空，且不得大于25个字符</span>
                    <br/>
                    <textarea class="form-control" rows="4" placeholder="输入您的工作内容" id="workContent"></textarea>
                    <span id="alertContent" style="display: none;color: red">内容不能为空，且不得大于500个字符</span>
                    <br/>
                    <button type="button" class="btn btn-success btn-block btn-lg"  data-dismiss="modal" id="addWork">添加任务</button>
                </div>
            </div>
            <!--<div class="modal-footer">-->
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>-->
                <!--<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>-->
            <!--</div>-->
        </div>
    </div>
</div>
<!-- 删除任务 -->
<!--<div class="modal fade" id="delWorkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
    <!--<div class="modal-dialog" role="document">-->
        <!--<div class="modal-content">-->
            <!--<div class="modal-header">-->
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <!--<h4 class="modal-title">删除任务</h4>-->
            <!--</div>-->
            <!--<div class="modal-body">-->
                <!--<h3>确定删除该条任务吗？</h3>-->
            <!--</div>-->
            <!--<div class="modal-footer">-->
                <!--<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>-->
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->
<a type="button" href="javascript:;" id="toTop" title="回到顶部"></a>
<script type="text/javascript" src="Public/js/jquery.min.js" ></script>
<script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="Public/js/artBlog.js" ></script>
<script type="text/javascript" src="Public/js/workHelp.js" ></script>
<script type="text/javascript" src="Public/js/toTop.js" ></script>
</body>
</html>