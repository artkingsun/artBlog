<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/4 0004
 * Time: 21:09
 */

namespace Home\Model;
use Think\Model;

class EssayModel extends Model{
    //读取博文类型
    function readType(){
        $rc = $this->distinct(true)->field('essaytype')->select();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //读取博文列表
    function readEssayList($essaytype){
        $data['essaytype'] = $essaytype;
        $data['essaystatus'] = 1;
        $rc = $this->where($data)->field('essayid,essaytitle,essaytype,createtime,essaypic')->order('essayid desc')->select();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //分页读取博文列表
    function readEssayListByPage($essaytype,$page,$row){
        if($essaytype == "全部博文"){
            $data['essaystatus'] = 1;
        }else{
            $data['essaytype'] = $essaytype;
            $data['essaystatus'] = 1;
        }
        $rc = $this->where($data)->field('essayid,essaytitle,essaytype,createtime,essaypic')->order('essayid desc')->page("$page,$row")->select();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //按类型计算博文数目
    function allCount($essaytype){
        if($essaytype == "全部博文"){
            $rc = $this->count();
        }else{
            $data['essaytype'] = $essaytype;
            $rc = $this->where($data)->count();
        }
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //读取博文详情
    function readEssayDetail($essayid){
        $data['essayid'] = $essayid;
        $data['essaystatus'] = 1;
        $rc = $this->where($data)->field('essayid,userid,essaytitle,essaycontent,essaytype,createtime,essaypic')->find();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //发布博文
    function addEssay($userid,$title,$content,$type,$essaypic){
        $data['userid'] = $userid;
        $data['essaytitle'] = $title;
        $data['essaycontent'] = $content;
        $data['essaytype'] = $type;
        $data['createtime'] = time();
        $data['essaypic'] = $essaypic;
        $rc = $this->add($data);
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //删除博文
    function delEssay($userid,$essayid){
        $data['essayid'] = $essayid;
        $data['userid'] = $userid;
        $rc = $this->where($data)->delete();
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //修改博文
    function updateEssay($essayid,$userid,$title,$content,$type,$essaypic){
        $data['userid'] = $userid;
        $data['essaytitle'] = $title;
        $data['essaycontent'] = $content;
        $data['essaytype'] = $type;
        $data['createtime'] = time();
        $data['essaypic'] = $essaypic;
        $map['essayid'] = $essayid;
        $rc = $this->where($map)->save($data);
        if($rc){
            return true;
        }else{
            return false;
        }
    }
}