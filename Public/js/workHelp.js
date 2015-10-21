/**
 * Created by zhangke on 2015/8/10 0010.
 */
var workType = "全部任务";
var login = false;
$(document).ready(function(){
    readUserInfo();         //获取登录信息
    getWorkType();          //获取任务类型
    addWork();              //添加任务
});
//获取登录信息
function readUserInfo(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/User/getUserInfo",
        dataType:"json",
        success: function (data) {
            var addContent = '';
            if(data != false){
                login = true;
                addContent = '<img src="' + data.headurl + '" alt="..." class="img-circle img-responsive"><h3 class="direction-center">'
                + data.username + '</h3><br/>';
                $("#userInfo").html(addContent);
                $("#addWorkHelp").css("display","block");
            }else{
                addContent = '<img src="Public/images/fly.png" alt="..." class="img-circle img-responsive">'
                + '<h3 class="direction-center">ArtBlog</h3><br/>';
                $("#userInfo").html(addContent);
                $("#addWorkHelp").attr("disabled","disabled");
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//获得任务类型
function getWorkType(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/Work/getWorkFinishInfo",
        dataType:"json",
        success: function (data) {
            if(data != false){
                var addContent = '<a href="#" class="list-group-item active">全部任务</a>'
                    + '<a href="#" class="list-group-item">未完成任务</a>'
                    + '<a href="#" class="list-group-item">已完成任务</a>';
                $("#workType").html(addContent);
                getWorkList(workType);
                chooseWorkType();
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//获取任务列表
function getWorkList(workType){
    if(workType == "全部任务")
    {
        workType = 3;
    }
    if(workType == "未完成任务")
    {
        workType = 2;
    }
    if(workType == "已完成任务")
    {
        workType = 1;
    }
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/Work/readDetailWork",
        dataType:"json",
        data:{
            type:workType
        },
        success: function (data) {
            if(data != false){
                var addContent = '<div class="input-group input-group-lg"><input type="text" class="form-control" placeholder="Search..." id="keywords">'
                    + '<span class="input-group-btn"> <button class="btn btn-default searchWork" type="button">'
                    + '<span class="glyphicon glyphicon-search"></span> 搜索任务 </button> </span></div><br>';//不能值为null，会直接在网页上显示null
                var j = data.length;
                for(var i = 0;i < j;i++ ){
                    if(login == true){
                        if(data[i].workfinish == 0){
                            addContent += '<div class="panel panel-default panel-success"><div class="panel-heading">'
                            + data[i].worktitle + '<div class="btn-r">开始时间：'
                            + data[i].workstart + '</div><div class="btn-l">未完成</div></div><div class="panel-body"><p>'
                            + data[i].workcontent + '</p><button class="btn btn-danger btn-l signFinish">标记完成</button>'
                            + '<span style="display: none" class="wid">' + data[i].workid+ '</span>'
                            + '<button class="btn btn-warning btn-l delWork" data-toggle="modal" data-target="#delWorkModal">删除任务</button></div></div>';
                        }else{
                            addContent += '<div class="panel panel-default panel-success"><div class="panel-heading">'
                            + data[i].worktitle + '<div class="btn-r">开始时间：'
                            + data[i].workstart + '</div><div class="btn-l">已完成</div></div><div class="panel-body"><p>'
                            + data[i].workcontent + '</p><div class="col-md-32">完成时间：'+ data[i].workfinish + '</div></div></div>';
                        }
                    }
                }
                $("#workList").html(addContent);
                delWork();
                signFinish();
                searchWork();
            }else{
                $("#workList").html("还没有数据");
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//选择任务类型
function chooseWorkType(){
    $('#workType a').click(function(){
        $(this).parent().each(function () {//移除其余非点中状态
            $('#workType a').removeClass("active");
        });
        $(this).addClass("active");//给所点中的增加样式
        workType = $(this).text();
        getWorkList(workType);
    })
}
//添加任务
function addWork(){
    //$("#workTitle").blur(function(){
    //    if(title.length >= 25 || title.length == 0){
    //        $("#alertTitle").attr("display","block");
    //    }
    //});
    //$("#workContent").blur(function(){
    //    if(title.length >= 500 || title.length == 0){
    //        $("#alertContent").attr("display","block");
    //    }
    //});
    $("#addWork").click(function(){
        var title = $("#workTitle").val();
        var content = $("#workContent").val();
        if(title.length > 0 && title.length < 25 && content.length > 0 && content.length <500){
            $.ajax({
                type:"GET",
                url:"index.php?s=Home/Work/addWork",
                dataType:"json",
                data:{
                    worktitle:title,
                    workcontent:content
                },
                success: function (data) {
                    if(data != false){
                        getWorkList(workType);
                    }
                },
                error:function (){
                    //alert('服务器错误！');
                }
            });
        }
    });
}
//删除任务
function delWork(){
    $(".delWork").click(function(){
        var workId = $(this).prev(".wid").html();
        $.ajax({
            type:"POST",
            url:"index.php?s=Home/Work/delWork",
            dataType:"json",
            data:{
                workid:workId
            },
            success: function (data) {
                if(data != false){
                    getWorkList(workType);
                }
            },
            error:function (){
                //alert('服务器错误！');
            }
        });
    });
}
//标记完成
function signFinish(){
    $(".signFinish").click(function(){
        var workId = $(this).next(".wid").html();
        $.ajax({
            type:"POST",
            url:"index.php?s=Home/Work/updateWork",
            dataType:"json",
            data:{
                workid:workId
            },
            success: function (data) {
                if(data != false){
                    getWorkList(workType);
                }
            },
            error:function (){
                //alert('服务器错误！');
            }
        });
    });
}
//搜索任务
function searchWork(){
    $(".searchWork").click(function(){
        var keywords = $("#keywords").val();
        if(keywords != ''){
            $.ajax({
                type:"POST",
                url:"index.php?s=Home/Work/searchWork",
                dataType:"json",
                data:{
                    keywords:keywords
                },
                success: function (data) {
                    if(data != false){
                        var addContent = '<div class="input-group input-group-lg"><input type="text" class="form-control" placeholder="Search..." id="keywords">'
                            + '<span class="input-group-btn"> <button class="btn btn-default searchWork" type="button">'
                            + '<span class="glyphicon glyphicon-search"></span> 搜索任务 </button> </span></div><br>';//不能值为null，会直接在网页上显示null
                        var j = data.length;
                        for(var i = 0;i < j;i++ ){
                            if(login == true){
                                if(data[i].workfinish == 0){
                                    addContent += '<div class="panel panel-default panel-success"><div class="panel-heading">'
                                    + data[i].worktitle + '<div class="btn-r">开始时间：'
                                    + data[i].workstart + '</div><div class="btn-l">未完成</div></div><div class="panel-body"><p>'
                                    + data[i].workcontent + '</p><button class="btn btn-danger btn-l signFinish">标记完成</button>'
                                    + '<span style="display: none" class="wid">' + data[i].workid+ '</span>'
                                    + '<button class="btn btn-warning btn-l delWork" data-toggle="modal" data-target="#delWorkModal">删除任务</button></div></div>';
                                }else{
                                    addContent += '<div class="panel panel-default panel-success"><div class="panel-heading">'
                                    + data[i].worktitle + '<div class="btn-r">开始时间：'
                                    + data[i].workstart + '</div><div class="btn-l">已完成</div></div><div class="panel-body"><p>'
                                    + data[i].workcontent + '</p><div class="col-md-32">完成时间：'+ data[i].workfinish + '</div></div></div>';
                                }
                            }
                        }
                        $("#workList").html(addContent);
                        delWork();
                        signFinish();
                        searchWork();
                    }
                },
                error:function (){
                    //alert('服务器错误！');
                }
            });
        }
    });
}