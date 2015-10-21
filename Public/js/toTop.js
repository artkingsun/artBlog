/**
 * Created by zhangke on 2015/8/3 0003.
 */
window.onload = function(){
    var obtn = document.getElementById('toTop');
    //浏览器高度兼容问题
    var clientHight = document.documentElement.clientHeight;
    //alert(clientHight);
    var timer = null;
    var isTop = true;
    //滚动条滚动时触发
    window.onscroll = function(){
        var osTop = document.documentElement.scrollTop || document.body.scrollTop;
        if(osTop >= clientHight){
            obtn.style.display = "block";
        }else{
            obtn.style.display = "none";
        }
        if(!isTop){
            clearInterval(timer);
        }
        isTop = false;
    };

    obtn.onclick = function(){
        timer = setInterval(function(){
            var osTop = document.documentElement.scrollTop || document.body.scrollTop;
            var speed = Math.floor(-osTop/7);
            isTop = true;
            document.documentElement.scrollTop = document.body.scrollTop = osTop + speed;
            if( osTop == 0){
                clearInterval(timer);
            }
        },30);
    }
}
