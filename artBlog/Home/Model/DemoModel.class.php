<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/25 0025
 * Time: 16:01
 */

namespace Home\Model;
use Think\Model;

class DemoModel extends Model{
    //添加demo
    function addDemo($userid,$title,$desc,$type,$url){
        $data['userid'] = $userid;
        $data['demoname'] = $title;
        $data['demodesc'] = $desc;
        $data['demotype'] = $type;
        $data['demourl'] = $url;
        $data['demodate'] = time();
        $rc = $this->add($data);
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //删除demo
    function delDemo($userid,$demoid){
        $data['userid'] = $userid;
        $data['demoid'] = $demoid;
        $rc = $this->where($data)->delete();
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //读取demo
    function readDemo(){
        $rc = $this->field('demoid,demoname,demodesc,demotype,demourl')->order('demoid desc')->select();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
}