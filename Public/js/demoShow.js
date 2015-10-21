/**
 * Created by zhangke on 2015/8/25 0025.
 */
var login = false;
$(function(){
    readUserInfo();           //获取登录信息
    readDemo();               //读取Demo信息
    addDemo();                //添加Demo
})
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
            }else{
                login = false;
                $("#addDemoBtn").attr("disabled","disabled");
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//读取Demo信息
function readDemo(){
    $.ajax({
        type:"GET",
        url:"index.php?s=Home/Demo/readDemo",
        dataType:"json",
        success: function (data) {
            if(data != false){
                var addContent = '<h1>如果体验不好，请使用最新的火狐浏览器！</h1>';//不能值为null，会直接在网页上显示null
                var j = data.length;
                for(var i = 0;i < j;i++ ){
                    addContent += '<div class="wrapper"><div class="item"><a href="'
                    + data[i].demourl + '" target="_blank"><img src="'
                    + data[i].demotype + '"/><span class="information"><strong>'
                    + data[i].demoname + '</strong>'
                    + data[i].demodesc + '</span></a></div></div>';
                }
                $("#container").html(addContent);
            }else{
                var addContent = '<h1>如果体验不好，请使用最新的火狐浏览器！</h1><br/><h1>还没有数据！</h1>';//不能值为null，会直接在网页上显示null
                $("#container").html(addContent);
            }
        },
        error:function (){
            //alert('服务器错误！');
        }
    });
}
//添加Demo
function addDemo(){
    $("#addDemo").click(function(){
        var demoName = $("#demoTitle").val();
        var demoDesc = $("#demoDesc").val();
        var demoType = $("#demoType").val();
        switch (demoType){
            case "HTML/HTML5":
                demoType = "Public/images/h5.png";
                break;
            case "CSS/CSS3":
                demoType = "Public/images/css3.png";
                break;
            case "JavaScript":
                demoType = "Public/images/JavaScript.png";
                break;
            case "jQuery":
                demoType = "Public/images/jquery.png";
                break;
            default:;
                break;
        }
        var demoURL = $("#demoURL").val();
        if(demoDesc != "" && demoName != "" && demoType != "" && demoURL != ""){
            $.ajax({
                type:"POST",
                url:"index.php?s=Home/Demo/addDemo",
                dataType:"json",
                data:{//$title,$desc,$type,$url
                    title:demoName,
                    desc:demoDesc,
                    type:demoType,
                    url:demoURL
                },
                success: function (data) {
                    if(data != false){
                        alert("添加成功！");
                        readDemo();
                    }else{
                        alert("添加失败！");
                    }
                },
                error:function (){
                    alert('服务器错误！');
                }
            });
        }else{
            //alert("添加失败！");
        }

    })

}