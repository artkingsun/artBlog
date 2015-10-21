/**
 * Created by zhangke on 2015/8/10 0010.
 */
//获取传过来的参数
var hash = window.location.hash;
var array = hash.split('=');
var essayId = array[array.length-1];
var login = false;
$(document).ready(function(){
    readUserInfo();            //获取登录信息
    getEssayDetail();          //获取博文详细信息
})
//获取登录信息
function readUserInfo(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/User/getUserInfo",
        dataType:"json",
        success: function (data) {
            if(data != false){
                login = true;
                var addContent = '<img src="' + data.headurl + '" alt="..." class="img-circle img-responsive"><h3 class="direction-center">'
                    + data.username + '</h3><br/>';
                $("#userInfo").html(addContent);
            }else{
                var addContent = '<img src="Public/images/fly.png" alt="..." class="img-circle img-responsive"><h3 class="direction-center">'
                    + 'ArtBlog</h3><br/>';
                $("#userInfo").html(addContent);
                $("#addEssay").attr("disabled","disabled");
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//获取详细信息
function getEssayDetail(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/Essay/readEssayDetail",
        dataType:"json",
        data:{
            essayid:essayId
        },
        success: function (data) {
            if(data != false)
            {
                var addContent = '';
                if(login == true){
                    addContent = '<div class="row"><div class="col-md-10"><h3 style="margin-top: 10px"><strong>'
                    + data.essaytitle + '</strong></h3> </div> <div class="col-md-2"> <button class="btn btn-warning btn-block" id="delEssay">'
                    + '<span class="glyphicon glyphicon-trash"></span>  删除博文 </button> </div></div>'
                    + '<div class="row"><div class="col-md-12"><p><span style="display: none"  id="essayId">'
                    + data.essayid + '</span>发布时间：' + data.createtime
                    + '<span> | </span>分类：' + data.essaytype
                    + '</span></p><div class="row"><div class="col-md-12"><p>'
                    + data.essaycontent + '</p></div></div></div>'
                    + '<div class="col-md-6"> <p><a class="btn" href="#">阅读（0）</a><span> | </span>'
                    + '<a class="btn" href="#">评价（0）</a><span> | <a class="btn" href="#">分享（0）</a>'
                    + '<span></p> </div> <div class="col-md-6"> <p ></p> </div> <div class="col-md-12">'
                    + '<textarea class="form-control" rows="3" placeholder="快来尽情的吐槽吧！" id="articleContent">'
                    + '</textarea> </div> <div class="col-md-2"> <br/> '
                    + '<button class="btn btn-block btn-success" id="article">评价</button> </div> </div>';
                }else{
                    addContent = '<div class="row"><div class="col-md-10"><h3 style="margin-top: 10px"><strong>'
                    + data.essaytitle + '</strong></h3> </div> <div class="col-md-2"></div></div>'
                    + '<div class="row"><div class="col-md-12"><p><span style="display: none"  id="essayId">'
                    + data.essayid + '</span>发布时间：' + data.createtime
                    + '<span> | </span>分类：' + data.essaytype
                    + '</span></p></div></div><div class="row"><div class="col-md-12"><p>'
                    + data.essaycontent + '</p></div>'
                    + '<div class="col-md-6"><p><a class="btn" href="#">阅读（0）</a><span> | </span>'
                    + '<a class="btn" href="#">评价（0）</a><span> | <a class="btn" href="#">分享（0）</a>'
                    + '<span></p></div><div class="col-md-6"><p ></p></div><div class="col-md-12">'
                    + '<textarea class="form-control" rows="3" placeholder="快来尽情的吐槽吧！" id="articleContent">'
                    + '</textarea></div><div class="col-md-2"> <br/> '
                    + '<button class="btn btn-block btn-success" id="article" disabled="disabled">评价</button></div></div>';
                }
                $('#essayDetail').html(addContent);
                delEssay();                //删除博文
            }
        },
        error:function (){
            //alert('服务器出问题了！');
        }
    });
}
//删除博文
function delEssay(){
    $("#delEssay").click(function(){
        if(login == true){
            $.ajax({
                type:"GET",
                url:"index.php?s=Home/Essay/delEssay",
                dataType:"json",
                data:{
                    essayid:essayId
                },
                success: function (data) {
                    if(data != false) {
                        location.href = 'index.php?s=Home/Index/myBlog';
                    }else{
                        alert("删除失败！");
                    }
                },
                error:function (){
                    //alert('服务器出问题了！');
                }
            });
        }else{
            alert("对不起您还没有登录！");
        }
    });
}