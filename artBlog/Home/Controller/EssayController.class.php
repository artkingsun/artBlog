<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/4 0004
 * Time: 21:08
 */

namespace Home\Controller;
use Think\Controller;

class EssayController extends Controller{
    //ajaxReturn
    function aReturn($data){
        if($data){
            $this->ajaxReturn(true);
        }
        else{
            $this->ajaxReturn(false);
        }
    }
    //读取博文列表
    function readEssayList($essaytype){
        $Essay = D('Essay');
        $data = $Essay->readEssayList($essaytype);
        if($data){
            foreach ($data as $k=>$v)
            {
                $data[$k]['createtime'] = date('Y-m-d H:i:s',$v['createtime']);
            }
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //分页读取博文列表
    function readEssayListByPage($essaytype,$page,$row){
        $Essay = D('Essay');
        $pageAll = $Essay->allCount($essaytype);
        $pageAll = ceil($pageAll/$row);
        $data = $Essay->readEssayListByPage($essaytype,$page,$row);
        if($data){
            foreach ($data as $k=>$v)
            {
                $data[$k]['createtime'] = date('Y-m-d H:i:s',$v['createtime']);
            }
            $data[]['pageall'] = $pageAll;
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //读取博文类型
    function readType(){
        $Essay = D('Essay');
        $data = $Essay->readType();
        if($data){
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //读取博文详情
    function readEssayDetail($essayid){
        $Essay = D('Essay');
        $data = $Essay->readEssayDetail($essayid);
        if($data){
            $data['createtime'] = date('Y-m-d H:i:s',$data['createtime']);
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //发布博文
    function addEssay($title,$content,$type,$essaypic){
        $User = D('User');
        $userid = $User->getSession();
        $Essay = D('Essay');
        $data = $Essay->addEssay($userid,$title,$content,$type,$essaypic);
        $this->aReturn($data);
    }
    //删除博文
    function delEssay($essayid){
        $User = D('User');
        $userid = $User->getSession();
        $Essay = D('Essay');
        $data = $Essay->delEssay($userid,$essayid);
        $this->aReturn($data);
    }
    //修改博文
    function updateEssay($essayid,$title,$content,$type,$essaypic){
        $User = D('User');
        $userid = $User->getSession();
        $Essay = D('Essay');
        $data = $Essay->updateEssay($essayid,$userid,$title,$content,$type,$essaypic);
        $this->aReturn($data);
    }
}