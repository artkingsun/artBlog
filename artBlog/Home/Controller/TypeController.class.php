<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/4 0004
 * Time: 20:19
 */

namespace Home\Controller;
use Think\Controller;


class TypeController extends Controller{
    //ajaxReturn
    function aReturn($data){
        if($data){
            $this->ajaxReturn(true);
        }
        else{
            $this->ajaxReturn(false);
        }
    }
    //读取分类列表
    function readType(){
        $Type = D('Type');
        //$User = D('User');
        //$userid = $User->getSession();
        $data = $Type->readType();
        if($data){
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //根据类型获取类型图标
    function getPicByType($typename){
        $Type = D('Type');
        $User = D('User');
        $userid = $User->getSession();
        $data = $Type->getPicByType($userid,$typename);
        if($data){
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //添加分类
    function addType($typename){
        $User = D('User');
        $userid = $User->getSession();
        $Type = D('Type');
        $data = $Type->addType($userid,$typename);
        $this->aReturn($data);
    }
    //删除分类
    function delType($typeid){
        $User = D('User');
        $userid = $User->getSession();
        $Type = D('Type');
        $data = $Type->delType($userid,$typeid);
        $this->aReturn($data);
    }
    //修改分类
    function updateType($typeid,$typename){
        $User = D('User');
        $userid = $User->getSession();
        $Type = D('Type');
        $data = $Type->updateType($userid,$typeid,$typename);
        $this->aReturn($data);
    }


}