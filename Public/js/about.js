/**
 * Created by zhangke on 2015/8/6 0006.
 */

var aboutType = "关于我们";
var login = false;
$(document).ready(function(){
    readUserInfo();          //获取登录信息
    getAboutType();          //获取介绍类型
    addAbout();              //添加介绍
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
                $("#addAbout").css("display","block");
            }else{
                addContent = '<img src="Public/images/fly.png" alt="..." class="img-circle img-responsive">'
                + '<h3 class="direction-center">ArtBlog</h3><br/>';
                $("#userInfo").html(addContent);

            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//获得介绍类型
function getAboutType(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/About/readProduceType",
        dataType:"json",
        success: function (data) {
            if(data != false){
                var addContent = '<a href="#" class="list-group-item active">' + data[0].abouttype + '</a>';
                var j = data.length;
                for(var i = 1;i < j;i++ ){
                    addContent += '<a href="#" class="list-group-item">' + data[i].abouttype + '</a>';
                }
                $("#aboutType").html(addContent);
                aboutType = data[0].abouttype;
                getAboutList(aboutType);
                chooseAboutType();
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//获取介绍列表
function getAboutList(aboutType){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/About/readDetailProduce",
        dataType:"json",
        data:{
            type:aboutType
        },
        success: function (data) {
            if(data != false){
                var addContent = '';//不能值为null，会直接在网页上显示null
                var j = data.length;
                for(var i = 0;i < j;i++ ){
                    if(login == true){
                        addContent += '<div class="panel panel-default panel-success"><div class="panel-heading">'
                        + data[i].abouttitle
                        + '<span style="display: none" class="aid">'
                        + data[i].aboutid
                        + '</span><button type="button" class="close delAbout" aria-label="Close" data-toggle="modal" data-target="#delProduceModal"><span aria-hidden="true">&times;</span></button></div><div class="panel-body"><p>'
                        + data[i].aboutcontent
                        + '</p></div></div>';
                    }else{
                        addContent += '<div class="panel panel-default panel-success"><div class="panel-heading">'
                        + data[i].abouttitle
                        + '<span style="display: none">'
                        + data[i].aboutid
                        + '</span></div><div class="panel-body"><p>'
                        + data[i].aboutcontent
                        + '</p></div></div>';
                    }

                }
                $("#aboutList").html(addContent);
                delAbout();
            }else{
                $("#aboutList").html("还没有数据");
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//选择介绍类型
function chooseAboutType(){
    $('#aboutType a').click(function(){
        $(this).parent().each(function () {//移除其余非点中状态
            $('#aboutType a').removeClass("active");
        });
        $(this).addClass("active");//给所点中的增加样式
        //alert($(this).text());//输出所点的a的内容
        aboutType = $(this).text();
        getAboutList(aboutType);
    })
}
//删除介绍
function delAbout(){
    $(".delAbout").click(function(){
        var aboutId = $(this).prev(".aid").html();
        $.ajax({
            type:"POST",
            url:"index.php?s=Home/About/delProduce",
            dataType:"json",
            data:{
                id:aboutId
            },
            success: function (data) {
                if(data != false){
                    //getAboutType();
                    getAboutList(aboutType);
                }
            },
            error:function (){
                //alert('服务器错误！');
            }
        });
    });
}
//添加介绍
function addAbout(){
    $("#addProduce").click(function(){
        var title = $("#produceTitle").val();
        var content = $("#produceContent").val();
        var type = $("#produceType").val();
        if(title.length > 0 && title.length < 20 && content.length > 0 && content.length < 500 && type.length > 0 && title.length < 20){
            $.ajax({
                type:"GET",
                url:"index.php?s=Home/About/addProduce",
                dataType:"json",
                data:{
                    title:title,
                    content:content,
                    type:type
                },
                success: function (data) {
                    if(data != false){
                        //getAboutType();
                        getAboutList(aboutType);
                    }
                },
                error:function (){
                    //alert('服务器错误！');
                }
            });
        }

    });
}