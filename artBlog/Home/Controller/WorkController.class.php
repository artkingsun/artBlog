<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/4 0004
 * Time: 14:33
 */

namespace Home\Controller;
use Think\Controller;

class WorkController extends Controller{
    //ajaxReturn
    function aReturn($data){
        if($data){
            $this->ajaxReturn(true);
        }
        else{
            $this->ajaxReturn(false);
        }
    }
    //添加任务
    function addWork($worktitle,$workcontent){
        $User = D('User');
        $userid = $User->getSession();
        $Work = D('Work');
        $data = $Work->addWork($userid,$worktitle,$workcontent);
        $this->aReturn($data);
    }
    //删除任务
    function delWork($workid){
        $User = D('User');
        $userid = $User->getSession();
        $Work = D('Work');
        $data = $Work->delWork($userid,$workid);
        $this->aReturn($data);
    }
    //修改任务
    function updateWork($workid){
        $User = D('User');
        $userid = $User->getSession();
        $Work = D('Work');
        $data = $Work->updateWork($userid,$workid);
        $this->aReturn($data);
    }
    //获取任务详情
    function readDetailWork($type){
        $Work = D('Work');
        $data = $Work->readDetailWork($type);
        if($data){
            foreach ($data as $k=>$v)
            {
                $data[$k]['workstart'] = date('Y-m-d H:i:s',$v['workstart']);
                if($v['workfinish'] != 0){
                    $data[$k]['workfinish'] = date('Y-m-d H:i:s',$v['workfinish']);
                }
            }
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //搜索任务
    function searchWork($keywords){
        $Work = D('Work');
        $data = $Work->searchWork($keywords);
        if($data){
            foreach ($data as $k=>$v)
            {
                $data[$k]['workstart'] = date('Y-m-d H:i:s',$v['workstart']);
                if($v['workfinish'] != 0){
                    $data[$k]['workfinish'] = date('Y-m-d H:i:s',$v['workfinish']);
                }
            }
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }
    //获得任务完成情况
    function getWorkFinishInfo(){
        $User = D('User');
        $userid = $User->getSession();
        $Work = D('Work');
        $data['noFinishWork'] = $Work->noFinishWork($userid);
        $data['finishWork'] = $Work->finishWork($userid);
        $data['allWork'] = $Work->allWork($userid);
        if($data){
            $this->ajaxReturn($data);
        }else{
            $this->ajaxReturn(false);
        }
    }

}