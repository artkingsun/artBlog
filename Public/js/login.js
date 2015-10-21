/**
 * Created by zhangke on 2015/8/5 0005.
 */

$(document).ready(function(){
    login();     //用户登录
});
//用户登录
function login(){
    $('#userLogin').click(function(){
        var email = $('#email').val();
        var password = $('#password').val();
        var logintype= false;
        if($('#logintype').is(':checked')){
            logintype = true;
        }
        //alert(logintype);
        if(email != '' && password != ''){
            var reg = /[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/;
            if( reg.test(email)){
                $.ajax({
                    type:"POST",
                    url:"index.php?s=Home/User/userLogin",
                    dataType:"json",
                    data:{
                        email:email,
                        password:password,
                        logintype:logintype
                    },
                    success: function (data) {
                        if(data == true){
                            //history.go(-1);
                            location.href = 'index.php?s=Home/Index/myBlog';
                        }else{
                            alert("非常抱歉，现在还没有开放使用！");
                        }
                    },
                    error:function (){
                        alert('服务器错误！');
                    }
                });
            }else{
                alert("登录失败！");
            }
        }else{
            alert("登录失败！");
        }
    })
}


