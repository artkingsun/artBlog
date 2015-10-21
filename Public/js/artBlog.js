/**
 * Created by zhangke on 2015/6/26 0026.
 */
$(document).ready(function(){
    readUserName();           //获取用户信息
    readFooter();             //获取底部信息
    exitLogin();              //退出登录
});
//获取用户名
function readUserName(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/User/getUserName",
        dataType:"json",
        success: function (data) {
            if(data != false){
            //    $("#user").css("display","block");
            //    //alert(data.username);
            //    $("#name").html(data.username+'<span class="caret"></span>');
            //}else{
            //    $("#login").css("display","block");
            //    $("#user").css("display","none");
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//退出登录
function exitLogin(){
    $("#exit").click(function(){
        $.ajax({
            type:"GET",
            url:"index.php?s=Home/User/userExit",
            dataType:"json",
            success: function (data) {
                if(data == true){
                    readUserName();
                    //$("#user").css("display","none");
                    //$("#login").css("display","block");
                }
            },
            error:function (){
                //alert('服务器错误！');
            }
        });
    })
}
//获取底部信息
function readFooter(){
    var footerContent = ' <ul><li><h4 class="">Copyright © ArtBlog 2015, All Rights Reserved</h4></li><li><h4 class="">艺术家博客版权所有</h4></li></ul>';
    $("#footer").html(footerContent);
}