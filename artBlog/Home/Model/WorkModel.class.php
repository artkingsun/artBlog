<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/4 0004
 * Time: 14:34
 */

namespace Home\Model;
use Think\Model;


class WorkModel extends Model{
    //返回操作数据
    function rData($rc){
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //添加任务
    function addWork($userid,$worktitle,$workcontent){
        $data['userid'] = $userid;
        $data['worktitle'] = $worktitle;
        $data['workcontent'] = $workcontent;
        $data['workstart'] = time();
        $data['workfinish'] = 0;
        $rc = $this->add($data);
        //$this->rData($rc);返回值不正常，原因不明
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //删除任务
    function delWork($userid,$workid){
        $data['workid'] = $workid;
        $data['userid'] = $userid;
        $rc = $this->where($data)->delete();
        //$this->rData($rc);返回值不正常，原因不明
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //修改任务
    function updateWork($userid,$workid){
        $data['userid'] = $userid;
        $data['workid'] = $workid;
        $map['workfinish'] = time();
        $rc = $this->where($data)->save($map);
        //$this->rData($rc);返回值不正常，原因不明
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //获取任务详情
    function readDetailWork($type){
        switch($type){
            case 1:
                $data['workfinish'] = array('gt',0);//完成
                $rc = $this->where($data)->field('workid,worktitle,workcontent,workstart,workfinish')->order('workid desc')->select();
                break;
            case 2:
                $data['workfinish'] = array('eq',0);//未完成
                $rc = $this->where($data)->field('workid,worktitle,workcontent,workstart,workfinish')->order('workid desc')->select();
                break;
            case 3:
                $rc = $this->field('workid,worktitle,workcontent,workstart,workfinish')->order('workid desc')->select();
                break;
        }
        if($rc){
            return $rc;
        } else{
            return false;
        }
    }
    //搜索任务
    function searchWork($keywords){
        $data['worktitle'] = array('like',"%$keywords%");
        $rc = $this->where($data)->distinct(false)->field('workid,worktitle,workcontent,workstart,workfinish')->order('workid desc')->select();
        if($rc){
            return $rc;
        } else{
            return false;
        }
    }
    //计算未完成任务数量
    function noFinishWork($userid){
        $data['userid'] = $userid;
        $data['workfinish'] = 0;
        $rc = $this->where($data)->count();
        if($rc !== false){
            return $rc;
        }else{
            return false;
        }
    }
    //计算已完成任务数量
    function finishWork($userid){
        $data['userid'] = $userid;
        $data['workfinish'] = array('gt',0);;
        $rc = $this->where($data)->count();
        if($rc !== false){
            return $rc;
        }else{
            return false;
        }
    }
    //计算所有任务数量
    function allWork($userid){
        $data['userid'] = $userid;
        $rc = $this->where($data)->count();
        if($rc !== false){
            return $rc;
        }else{
            return false;
        }
    }

}