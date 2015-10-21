<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/3 0003
 * Time: 16:03
 */

namespace Home\Model;
use Think\Model;

class AboutModel extends Model{
    //添加介绍
    function addProduce($userid,$title,$content,$type){
        $data['userid'] = $userid;
        $data['abouttitle'] = $title;
        $data['aboutcontent'] = $content;
        $data['abouttype'] = $type;
        $data['abouttime'] = time();
        $rc = $this->add($data);
        return $rc;
    }
    //删除介绍
    function delProduce($userid,$id){
        $data['userid'] = $userid;
        $data['aboutid'] = $id;
        $rc = $this->where($data)->delete();
        return $rc;
    }
    //读取介绍分类
    function readProduceType(){
        $rc = $this->distinct(true)->field('abouttype')->select();
        return $rc;
    }
    //获取详细介绍
    function readDetailProduce($type){
        $data['abouttype'] = $type;
        $rc = $this->where($data)->field('aboutid,abouttitle,aboutcontent,abouttime')->order('aboutid desc')->select();
        return $rc;
    }

}