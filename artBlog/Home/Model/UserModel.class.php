<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/7/19 0019
 * Time: 17:37
 */
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    //判断邮箱是否注册
    function isRegister($email){
        $data['useremail'] = $email;
        $rc = $this->where($data)->find();
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //用户注册
    function userRegister($email,$userName,$password){
        $password = sha1($password);
        $data['username'] = $userName;
        $data['useremail'] = $email;
        $data['userpwd'] = $password;
        $data['createtime'] = time();
        $data['userstatus'] = 0;
        $data['headurl'] = "Public/images/fly.png";
        $data['userrank'] = 1;
        $data = $this->add($data);
        return $data;
    }

    //根据Email获取用户状态
    function getUserStatusByEmail($email){
        $data['useremail'] = $email;
        $rc = $this->where($data)->field('userstatus')->find();
        if($rc['userstatus'] == 0){
            return false;
        }else{
            return true;
        }
    }
    //用户登录
    function userLogin($email,$password,$logintype){
        if($this->getUserStatusByEmail($email)){
            $password = sha1($password);
            $data['useremail'] = $email;
            $data['userpwd'] = $password;
            $rc = $this->where($data)->find();
            $uid = $this->getUserIdByEmail($email);
            $dataSession = $this->setSession($uid);
            $dataCookie = $this->setCookie($uid,$logintype);
            if($rc && $dataSession && $dataCookie){
                return true;
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }
    //获取用户信息
    function getUserInfo(){
        $data['userid'] = $this->getSession();//获取的值是否是数组
        if($data != null){
            $rc = $this->where($data)->field('username,useremail,headurl,blogname,blogdesc,userstatus,createtime,userrank')->find();
            if($rc)
            {
                return $rc;
            }
            else
            {
                return false;
            }
        }else{
            return false;
        }

//        echo $this->getLastSql();

    }
    //获取用户名
    function getUserName(){
        $data['userid'] = $this->getSession();//获取的值是否是数组
        if($data != null){
            $rc = $this->where($data)->field('username')->find();
            if($rc)
            {
                return $rc;
            }else
            {
                return false;
            }
        }else{
            return false;
        }
    }
    //用户退出
    function userExit(){
        $dataCookie = $this->delCookie();
        $dataSession = $this->delSession();
        if($dataCookie && $dataSession){
            return true;
        }else{
            return false;
        }
    }
    //根据邮箱获得UID
    function getUserIdByEmail($email){
        $data['useremail'] = $email;
        $rc = $this->where($data)->field('userid')->find();
        return $rc['userid'];                   //获取的是一维数组
    }
    //设置session  UID
    function setSession($userId)
    {
        session('userId',$userId);
        return true;
    }
    //获取session
    function getSession()
    {
        $data = session('userId');
        return $data;
    }
    //销毁session
    function delSession()
    {
        session('userId',null);
        return true;
    }
    //判断session是否为空
    function isSession()
    {
        if(!session('?userId'))
        {
            //是空
            return true;
        }
    }
    //设置cookie
    function setCookie($userId,$logintype){
        if($logintype == true){
            cookie('userId',$userId,3600*24*10);//有效期1小时
            return ture;
        }else{
            cookie('userId',$userId);//有效期1小时
            return ture;
        }
    }
    //获取cookie
    function getCookie(){
        $data = cookie('userId');
        return $data;
    }
    //销毁cookie
    function delCookie(){
        cookie('userId',null);
        return true;
    }

}