<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/3 0003
 * Time: 16:05
 */

namespace Home\Controller;
use Think\Controller;


class AboutController  extends Controller{
    //ajaxReturn
    function aReturn($data){
        if($data){
            $this->ajaxReturn(true);
        }
        else{
            $this->ajaxReturn(false);
        }
    }
    //添加介绍(需要先登录)
    function addProduce($title,$content,$type){
        $User = D('User');
        $userid = $User->getSession();
        $About = D('About');
        $data = $About->addProduce($userid,$title,$content,$type);
        $this->aReturn($data);
    }
    //删除介绍（需要先登录）
    function delProduce($id){
        $User = D('User');
        $userid = $User->getSession();
        //dump($userid);
        $About = D('About');
        $data = $About->delProduce($userid,$id);
        $this->aReturn($data);
    }
    //读取介绍分类(不能按照userid来获取，这样访客无法访问数据)
    function readProduceType(){
        $About = D('About');
        $data = $About->readProduceType();
        if($data){
            $this->ajaxReturn($data);
        }
        else{
            $this->ajaxReturn(false);
        }
    }
    //获取详细介绍
    function readDetailProduce($type){
//        $User = D('User');
//        $userid = $User->getSession();
        $About = D('About');
        $data = $About->readDetailProduce($type);
        if($data){
            foreach ($data as $k=>$v)
            {
                $data[$k]['abouttime'] = date('Y-m-d H:i:s',$v['abouttime']);
            }
            $this->ajaxReturn($data);
        }
        else{
            $this->ajaxReturn(false);
        }
    }

}