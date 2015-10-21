/**
 * Created by zhangke on 2015/8/5 0005.
 */
var essaytype = "全部博文";
var lastPage = 0;
var page = 1;
var row = 9;
var login = false;
$(document).ready(function(){
    readUserInfo();                     //获取登录信息
    getEssayType();                     //获取博文类型
    getEssayList(essaytype,page,row);   //获取博文列表
    chooseEssayType();                  //选择博文类型
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
                $("#addEssay").css("display","block");
            }else{
                addContent = '<img src="Public/images/fly.png" alt="..." class="img-circle img-responsive">'
                + '<h3 class="direction-center">ArtBlog</h3><br/>';
                $("#userInfo").html(addContent);
                $("#addEssay").attr("disabled","disabled");
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//获得博文类型
function getEssayType(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/Essay/readType",
        dataType:"json",
        success: function (data) {
            if(data != false){
                var addContent = '<a href="#" class="list-group-item active">全部博文</a>';
                var j = data.length;
                for(var i = 0;i < j;i++ ){
                    addContent += '<a href="#" class="list-group-item">' + data[i].essaytype + '</a>';
                }
                $("#essayType").html(addContent);
                essaytype = "全部博文";
                getEssayList(essaytype,page,row);
                chooseEssayType();
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//获取博文列表
function getEssayList(essaytype,page,row){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/Essay/readEssayListByPage",
        dataType:"json",
        data:{
            essaytype:essaytype,
            page:page,
            row:row
        },
        success: function (data) {
            if(data != false){
               lastPage = data[data.length-1].pageall;
                if(lastPage < 2){
                    $(".last-page").css("display","none");
                    $(".next-page").css("display","none");
                }else{
                    if(page == lastPage){
                        $(".last-page").css("display","block");
                        $(".next-page").css("display","none");
                    }else if(page == 1){
                        $(".last-page").css("display","none");
                        $(".next-page").css("display","block");
                    }else{
                        $(".last-page").css("display","block");
                        $(".next-page").css("display","block");
                    }
                }
                var addContent = '';//不能值为null，会直接在网页上显示null
                var j = data.length - 1;
                for(var i = 0;i < j;i++ ){
                    addContent += '<div class="col-md-4"><div class="thumbnail"><a  href="index.php?s=Home/Index/blogDetail#essayid='
                    + data[i].essayid
                    + '"><img src="'
                    + data[i].essaypic
                    + '" alt="..."> <div ><p class="btn">'
                    + data[i].essaytitle
                    + '</p></div></a> <p class="btn">'
                    + data[i].createtime
                    + '</p><a class="btn"><span class="glyphicon glyphicon-heart"></span> 评价</a>'
                    + '<a class="btn"><span class="glyphicon glyphicon-share-alt"></span> 分享</a></div></div>';
                }
                $("#essayList").html(addContent);
            }else{
                $("#essayList").html("这家伙真懒，什么都没留下！");
                $(".last-page").css("display","none");
                $(".next-page").css("display","none");
            }
            //上一页
            $("#lastPage").click(function(){
                if(page > 1){
                    page -= 1;
                    getEssayList(essaytype,page,row);
                }
            });
            //下一页
            $("#nextPage").click(function(){
                if(page < lastPage){
                    page += 1;
                    getEssayList(essaytype,page,row);
                }
            });
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//选择博文类型
function chooseEssayType(){
    $('#essayType a').click(function(){
        $(this).parent().each(function () {//移除其余非点中状态
            $('#essayType a').removeClass("active");
        });
        $(this).addClass("active");//给所点中的增加样式
        essaytype = $(this).text();
        getEssayList(essaytype,page,row);
    })
}
//跳转到详细页面
function toEssayDetail(){
    $('.examDetail').click(function(){
        var eid =  $(this).prev('.eid').html();
        //alert(eid);
        location.href = 'index.php?s=Home/Index/blogDetail#essayid='+eid;  //如何在跳转过后的页面获得这个eid
    });
}