<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ArtBlog - 主页</title>
    <meta name="keywords" content="ArtBlog IT技术 计算机 博客 互联网 Web前端 PHP UI UED" />
    <meta name="description" content="ArtBlog" />
    <meta name="copyright" content="ArtBlog" />
    <meta name="author" content="Art" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--IE兼容-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--将360默认为极速模式打开-->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Public/css/artBlog.css" />
    <link rel="stylesheet" href="Public/css/home.css" />
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
                <li class="active"><a href="index.php?s=Home/Index/home">首页</a></li>
                <li><a href="index.php?s=Home/Index/myBlog">我的博客</a></li>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="name"> 昵称 <span class="caret"></span></a>
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
<div class="container-fluid ">
    <div class="row row-blueviolet">
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-2">
                    <img src="Public/images/fly.png" alt="..." class="img-circle" width="200px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">编程是一门技术，更是一门艺术</p>
                </div>
                <div class="col-md-3">
                    <br/>
                    <a class="btn btn-success btn-block btn-lg" href="?s=Home/Index/myBlog">进入博客</a>
                </div>
                <div class="col-md-12">
                    <br/>
                    <div class="bdsharebuttonbox">
                        <a href="#" class="bds_more" data-cmd="more"></a>
                        <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                        <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--CSS-->
    <div class="row row-blue">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/css3.png" alt="..." class="img-circle" width="200px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">CSS</p>
                    <p class="text-md">
                        CSS即层叠样式表（Cascading StyleSheet）。 在网页制作时采用层叠样式表技术，可以有效地对页面的布局、字体、颜色、背景和其它效果实现更加精确的控制。 只要对相应的代码做一些简单的修改，就可以改变同一页面的不同部分，或者页数不同的网页的外观和格式。CSS3是CSS技术的升级版本，CSS3语言开发是朝着模块化发展的。以前的规范作为一个模块实在是太庞大而且比较复杂，所以，把它分解为一些小的模块，更多新的模块也被加入进来。这些模块包括： 盒子模型、列表模块、超链接方式 、语言模块 、背景和边框 、文字特效 、多栏布局等。
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!--HTML-->
    <div class="row row-sliver">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/h5.png" alt="..." class="img-circle" width="200px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">HTML</p>
                    <p class="text-md">
                        HTML5，万维网的核心语言、标准通用标记语言下的一个应用超文本标记语言（HTML）的第五次重大修改。2014年10月29日，万维网联盟宣布，经过接近8年的艰苦努力，该标准规范终于制定完成。
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--Java-->
    <div class="row row-blue">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/java.png" alt="..." class="img-circle" width="200px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">Java</p>
                    <p class="text-md">
                        Java是一种可以撰写跨平台应用程序的面向对象的程序设计语言。Java 技术具有卓越的通用性、高效性、平台移植性和安全性，广泛应用于PC、数据中心、游戏控制台、科学超级计算机、移动电话和互联网，同时拥有全球最大的开发者专业社群。
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!--Python-->
    <div class="row row-sliver">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/python.png" alt="..." class="img-circle" width="200px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">Python</p>
                    <p class="text-md">
                        Python是一种面向对象、解释型计算机程序设计语言，由Guido van Rossum于1989年底发明，第一个公开发行版发行于1991年，Python 源代码同样遵循 GPL(GNU General Public License)协议。Python语法简洁而清晰，具有丰富和强大的类库。它常被昵称为胶水语言，能够把用其他语言制作的各种模块（尤其是C/C++）很轻松地联结在一起。常见的一种应用情形是，使用Python快速生成程序的原型（有时甚至是程序的最终界面），然后对其中有特别要求的部分，用更合适的语言改写，比如3D游戏中的图形渲染模块，性能要求特别高，就可以用C/C++重写，而后封装为Python可以调用的扩展类库。需要注意的是在您使用扩展类库时可能需要考虑平台问题，某些可能不提供跨平台的实现。
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--PHP-->
    <div class="row row-blue">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/php.png" alt="..." class="img-rounded" width="400px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">PHP</p>
                    <p class="text-md">
                        PHP（Hypertext Preprocessor，超文本预处理器）是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点，利于学习，使用广泛，主要适用于Web开发领域。PHP 独特的语法混合了C、Java、Perl以及PHP自创的语法。它可以比CGI或者Perl更快速地执行动态网页。用PHP做出的动态页面与其他的编程语言相比，PHP是将程序嵌入到HTML文档中去执行，执行效率比完全生成HTML标记的CGI要高许多；PHP还可以执行编译后代码，编译可以达到加密和优化代码运行，使代码运行更快。
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!--MySQL-->
    <div class="row row-sliver">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/mysql.png" alt="..." class="img-rounded" width="400px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">MySQL</p>
                    <p class="text-md">
                        MySQL是一个关系型数据库管理系统，由瑞典 MySQL AB 公司开发，目前属于 Oracle 旗下公司。MySQL 最流行的关系型数据库管理系统，在 WEB 应用方面 MySQL 是最好的 RDBMS (Relational Database Management System，关系数据库管理系统) 应用软件之一。MySQL 是一种关联数据库管理系统，关联数据库将数据保存在不同的表中，而不是将所有数据放在一个大仓库内，这样就增加了速度并提高了灵活性。MySQL 所使用的 SQL 语言是用于访问数据库的最常用标准化语言。MySQL 软件采用了双授权政策，它分为社区版和商业版，由于其体积小、速度快、总体拥有成本低，尤其是开放源码这一特点，一般中小型网站的开发都选择 MySQL 作为网站数据库。由于其社区版的性能卓越，搭配 PHP 和 Apache 可组成良好的开发环境。
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--MongoDB-->
    <div class="row row-blue">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/mongo.png" alt="..." class="img-rounded" width="400px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">MongoDB</p>
                    <p class="text-md">
                        Mongo DB 是目前在IT行业非常流行的一种非关系型数据库(NoSql),其灵活的数据存储方式备受当前IT从业人员的青睐。Mongo DB很好的实现了面向对象的思想,在Mongo DB中 每一条记录都是一个Document对象。Mongo DB最大的优势在于所有的数据持久操作都无需开发人员手动编写SQL语句,直接调用方法就可以轻松的实现CRUD操作。
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!--MariaD-->
    <div class="row row-sliver">
        <div class="col-md-1">

        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/Mariadb.png" alt="..." class="img-rounded" width="400px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">MariaD</p>
                    <p class="text-md">
                        MariaDB数据库管理系统是MySQL的一个分支，主要由开源社区在维护，采用GPL授权许可 MariaDB的目的是完全兼容MySQL，包括API和命令行，使之能轻松成为MySQL的代替品。在存储引擎方面，使用XtraDB来代替MySQL的InnoDB。 MariaDB由MySQL的创始人Michael Widenius主导开发，他早前曾以10亿美元的价格，将自己创建的公司MySQL AB卖给了SUN，此后，随着SUN被甲骨文收购，MySQL的所有权也落入Oracle的手中。MariaDB名称来自Michael Widenius的女儿Maria的名字。

                        MariaDB基于事务的Maria存储引擎，替换了MySQL的MyISAM存储引擎，它使用了Percona的 XtraDB，InnoDB的变体，分支的开发者希望提供访问即将到来的MySQL 5.4 InnoDB性能。这个版本还包括了 PrimeBase XT (PBXT) 和 FederatedX存储引擎。
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--Ubuntu-->
    <div class="row row-blue">
        <div class="col-md-offset-1 col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <img src="Public/images/ubuntu.png" alt="..." class="img-circle" width="200px" height="200px">
                </div>
                <div class="col-md-12">
                    <br/>
                    <p class="text-big">Ubuntu</p>
                    <p class="text-md">
                        Ubuntu（乌班图）是一个以桌面应用为主的Linux操作系统，其名称来自非洲南部祖鲁语或豪萨语的“ubuntu”一词，意思是“人性”、“我的存在是因为大家的存在”，是非洲传统的一种价值观，类似华人社会的“仁爱”思想。Ubuntu基于Debian发行版和GNOME桌面环境，而从11.04版起，Ubuntu发行版放弃了Gnome桌面环境，改为Unity，与Debian的不同在于它每6个月会发布一个新版本。Ubuntu的目标在于为一般用户提供一个最新的、同时又相当稳定的主要由自由软件构建而成的操作系统。Ubuntu具有庞大的社区力量，用户可以方便地从社区获得帮助。2013年1月3日，Ubuntu正式发布面向智能手机的移动操作系统
                    </p>
                </div>
            </div>
        </div>
    </div>

    <a type="button" href="javascript:;" id="toTop" title="回到顶部"></a>

</div>
<!--内容 结束-->

<!--结尾 开始-->
<div class="footer" id="footer">

</div>
<!--结尾 结束-->
<script type="text/javascript" src="Public/js/jquery.min.js" ></script>
<script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="Public/js/artBlog.js" ></script>
<script type="text/javascript" src="Public/js/toTop.js" ></script>
<script>
    window._bd_share_config={
        "common":{
            "bdSnsKey":{},
            "bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"
        },
        "share":{},
        "image":{
            "viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"32"
        },
        "selectShare":{
            "bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]
        }
    };
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>