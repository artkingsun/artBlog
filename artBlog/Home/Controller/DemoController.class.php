<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/25 0025
 * Time: 16:02
 */

namespace Home\Controller;
use Think\Controller;

class DemoController extends Controller{
    //添加demo
    function addDemo($title,$desc,$type,$url){
        $Demo = D('Demo');
        $User = D('User');
        $userid = $User->getSession();
        if($userid){
            $data = $Demo->addDemo($userid,$title,$desc,$type,$url);
            if($data){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }else{
            $this->ajaxReturn(false);
        }
    }
    //删除demo
    function delDemo($demoid){
        $Demo = D('Demo');
        $User = D('User');
        $userid = $User->getSession();
        if($userid){
            $data = $Demo->delDemo($userid,$demoid);
            if($data){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }else{
            $this->ajaxReturn(false);
        }
    }
    //读取demo
    function readDemo(){
        $Demo = D('Demo');
        $data = $Demo->readDemo();
        if($data){
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
}