<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/10/7 0007
 * Time: 21:51
 */

namespace Home\Model;
use Think\Model;

class OrderModel extends Model{
    //添加预约
    function addOrder($content,$place,$time,$name,$contact){
        $data['ordercontent'] = $content;
        $data['orderplace'] = $place;
        $data['ordertime'] = $time;
        $data['name'] = $name;
        $data['ordercontact'] = $contact;
        $data['createtime'] = time();
        $rc = $this->add($data);
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //删除预约
    //修改预约
    //查询预约
    function readOrder($status){
        $data['status'] = $status;
        $rc = $this->where($data)->field(orderid,ordercontent)->order('orderid desc')->select();
       echo $this->getLastSql();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //按类型计算预约数目
    function allCount($status){
        $data['status'] = $status;
        $rc = $this->where($data)->count();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //分页读取预约列表
    function readOrderListByPage($status,$page,$row){
        $data['status'] = $status;
        $rc = $this->where($data)->field(orderid,ordercontent)->order('orderid desc')->page("$page,$row")->select();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
}