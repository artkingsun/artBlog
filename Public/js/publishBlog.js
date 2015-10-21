/**
 * Created by zhangke on 2015/8/7 0007.
 */
$(document).ready(function(){
    readUserInfo();                     //获取登录信息
    getTypeInfo();                      //获得博文类型信息
    publishEssay();                     //发布文章
});
//获取登录信息
function readUserInfo(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/User/getUserInfo",
        dataType:"json",
        success: function (data) {
            if(data != false){
                var addContent = '<img src="' + data.headurl + '" alt="..." class="img-circle img-responsive"><h3 class="direction-center">'
                    + data.username + '</h3><br/>';
                $("#userInfo").html(addContent);
            }
        },
        error:function (){
            alert('服务器错误！');
        }
    });
}
//获得博文类型信息 selected = "selected"
function getTypeInfo(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/Type/readType",
        dataType:"json",
        success: function (data) {
            if(data != false){
                var typeInfo = '<option value ="' + data[0].typename + '" selected = "selected">' + data[0].typename + '</option>';
                var j = data.length;
                for(var i = 1; i < j; i++ ){
                    typeInfo += '<option value ="' + data[i].typename + '">' + data[i].typename + '</option>';
                }
                $("#essayType").html(typeInfo);
                //$("#essayPic").attr("src",data[0].typepic);
            }
        },
        error:function (){
            alert('服务器错误！');
        }
    });
}
//发布博文
function publishEssay(){
    $("#publishEssay").click(function(){
        var essayTitle = $("#essayTitle").val();
        //var essayContent = $("#essayContent").val();
        var essayContent = getContent();//通过ueditor的方法获取内容
        var essayType = $("#essayType").val();
        var essayPic = "";
        $.ajax({
            type:"GET",
            url:"index.php?s=Home/Type/getPicByType",
            dataType:"json",
            data:{
                typename:essayType
            },
            success: function (data) {
                if(data != false){
                    essayPic = data.typepic;
                    if(essayTitle.length > 0 && essayTitle.length < 20 && essayContent.length > 0 && essayContent.length < 2000 && essayType != "" && essayPic != ""){
                        $.ajax({
                            type:"POST",
                            url:"index.php?s=Home/Essay/addEssay",
                            dataType:"json",
                            data:{
                                title:essayTitle,
                                content:essayContent,
                                type:essayType,
                                essaypic:essayPic
                            },
                            success: function (data) {
                                if(data != false){
                                    alert("发布成功！");
                                    location.href = 'index.php?s=Home/Index/myBlog';
                                }
                                else{
                                    alert("发布失败！");
                                }
                            },
                            error:function (){
                                alert('服务器错误！');
                            }
                        });
                    }
                }
            },
            error:function (){
                alert('服务器错误！');
            }
        });
    });
}
//使用ueditor获得内容
