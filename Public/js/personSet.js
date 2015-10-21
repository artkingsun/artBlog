/**
 * Created by zhangke on 2015/8/17 0017.
 */
var login = false;
$(document).ready(function(){
    readUserInfo();                     //获取登录信息
    choosePersonSetType();              //选择个人设置类型
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
                + data.username + '</h3><a class="btn btn-danger btn-block">'
                + '<span class="glyphicon glyphicon-heart"></span> 访问（0）</a> <br/>'
                + '<a class="btn btn-danger btn-block"><span class="glyphicon glyphicon-share-alt"></span> 分享（0）</a> <br/>';
                $("#userInfo").html(addContent);
            }else{
                addContent = '<img src="Public/images/fly.png" alt="..." class="img-circle img-responsive">'
                + '<h3 class="direction-center">ArtBlog</h3><a class="btn btn-danger btn-block">'
                + '<span class="glyphicon glyphicon-heart"></span> 访问（0）</a> <br/>'
                + '<a class="btn btn-danger btn-block"><span class="glyphicon glyphicon-share-alt"></span> 分享（0）</a> <br/>';
                $("#userInfo").html(addContent);
            }
        },
        error:function (){
            alert('服务器错误！');
        }
    });
}
//选择个人设置类型
function choosePersonSetType(){
    $('#personSetType a').click(function(){
        $(this).parent().each(function () {//移除其余非点中状态
            $('#personSetType a').removeClass("active");
        });
        $(this).addClass("active");//给所点中的增加样式
        var setType = $(this).text();
        getPersonSetType(setType);
    })
}
//获得个人设置列表
function getPersonSetType(setType){
    //document.title = setType;
    if(setType == "个人资料"){
        $("#personInfo").removeClass("personSet");
        $("#headPic").addClass("personSet");
        $("#changePwd").addClass("personSet");
        $("#emailVerify").addClass("personSet");
    }else if(setType == "头像设置"){
        $("#personInfo").addClass("personSet");
        $("#headPic").removeClass("personSet");
        $("#changePwd").addClass("personSet");
        $("#emailVerify").addClass("personSet");
    }else if(setType == "修改密码"){
        $("#personInfo").addClass("personSet");
        $("#headPic").addClass("personSet");
        $("#changePwd").removeClass("personSet");
        $("#emailVerify").addClass("personSet");
    }else{//"邮箱验证"
        $("#personInfo").addClass("personSet");
        $("#headPic").addClass("personSet");
        $("#changePwd").addClass("personSet");
        $("#emailVerify").removeClass("personSet");
    }
}

