<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/7/19 0019
 * Time: 17:35
 */

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    //ajaxReturn
    function aReturn($data){
        if($data){
            $this->ajaxReturn(true);
        }
        else{
            $this->ajaxReturn(false);
        }
    }
    //判断邮箱是否注册
    function isRegister($email){
        $User = D('User');
        $data = $User->isRegister($email);
        $this->aReturn($data);
    }
    //用户注册
    function userRegister($email,$userName,$password){
        $User = D('User');
        $data = $User->userRegister($email,$userName,$password);
        $this->aReturn($data);
    }
    //用户登录
    function userLogin($email,$password,$logintype){
        $User = D('User');
        $data = $User->userLogin($email,$password,$logintype);
        $this->aReturn($data);
    }
    //用户退出
    function userExit(){
        $User = D('User');
        $data = $User->userExit();
        $this->aReturn($data);
    }

    //设置session
    function setSession($userId){
        $User = D('User');
        $data = $User->setSession($userId);
        $this->aReturn($data);
    }

    //判断session是否为空
    function isSession(){
        $User = D('User');
        $data = $User->isSession();
        $this->aReturn($data);
    }

    //销毁session
    function delSession(){
        $User = D('User');
        $data = $User->delSession();
        $this->aReturn($data);
    }

    //获取session值
    function getSession(){
        $User = D('User');
        $data = $User->getSession();
        if($data){
            $this->ajaxReturn($data);
        }
        else {
            $this->ajaxReturn(false);
        }
    }
    //获取用户信息
    function getUserInfo(){
        $User = D('User');
        $data = $User->getUserInfo();
        if($data) {
            $data['createtime'] = date('Y-m-d H:i:s',$data['createtime']);
            $this->ajaxReturn($data);
        }
        else {
            $this->ajaxReturn(false);
        }
    }
    //获取用户名
    function getUserName(){
        $User = D('User');
        $data = $User->getUserName();
        if($data) {
            $this->ajaxReturn($data);
        }
        else {
            $this->ajaxReturn(false);
        }
    }

    //设置cookie
    function setCookie($userId,$logintype){
        $User = D('User');
        $data = $User->setCookie($userId,$logintype);
        $this->aReturn($data);
    }
    //获取cookie
    function getCookie(){
        $User = D('User');
        $data = $User->getCookie();
        if($data){
            $this->ajaxReturn($data);
        }
        else{
            $this->ajaxReturn(false);
        }
    }
    //销毁cookie
    function delCookie(){
        $User = D('User');
        $data = $User->delCookie();
        $this->aReturn($data);
    }

}