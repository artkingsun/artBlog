/**
 * Created by zhangke on 2015/8/5 0005.
 */

$(document).ready(function(){
    register();       //用户注册
});
//用户注册
function register(){
    $('#userRegister').click(function(){
        var email = $('#email').val();
        var name = $('#username').val();
        var pwd = $('#pwd').val();
        var password = $('#password').val();
        //alert(logintype);
        isRegister(email);
        if(email != '' && name != '' && pwd != '' && password != '' && pwd == password){
            var reg = /[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/;
            if( reg.test(email)){
                $.ajax({
                    type:"POST",
                    url:"index.php?s=Home/User/userRegister",
                    dataType:"json",
                    data:{
                        email:email,
                        userName:name,
                        password:password
                    },
                    success: function (data) {
                        if(data == true){
                            location.href = 'index.php?s=Home/Index/login';
                        }else{
                            alert("注册失败！");
                        }
                    },
                    error:function (){
                        alert('服务器错误！');
                    }
                });
            }else{
                alert("注册失败！");
            }
        }else{
            alert("注册失败！");
        }
    })
}
//判断是否注册
function isRegister(email){
    $.ajax({
        type:"POST",
        url:"index.php?s=Home/User/isRegister",
        dataType:"json",
        data:{
            email:email
        },
        success: function (data) {
            if(data == true){
                alert('邮箱已经注册！');
            }
        },
        error:function (){
            alert('服务器错误！');
        }
    });
}


