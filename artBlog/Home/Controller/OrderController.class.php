<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/10/7 0007
 * Time: 21:44
 */

namespace Home\Controller;
use Think\Controller;

class OrderController extends Controller{
    //添加预约
    function addOrder($content,$place,$time,$name,$contact){
//        $content = '嗨嗨嗨';
//        $place = '东3';
//        $time = '周一';
//        $contact = 'qq';
        $Order = D('Order');
        $data = $Order->addOrder($content,$place,$time,$name,$contact);
        if($data){
            $this->ajaxReturn(true,'jsonp');
        }else{
            $this->ajaxReturn(false,'jsonp');
        }
    }
    //删除预约
    //修改预约
    //查询预约
    function readOrder($status){
        $Order = D('Order');
        $data = $Order->readOrder($status);
        if($data){
            $this->ajaxReturn($data,'jsonp');
        }else{
            $this->ajaxReturn(false,'jsonp');
        }
    }
    //分页读取预约列表
    function readOrderListByPage($status,$page,$row){
        $Order = D('Order');
        $pageAll = $Order->allCount($status);
        $pageAll = ceil($pageAll/$row);
        $data = $Order->readOrderListByPage($status,$page,$row);
        if($data){
            foreach ($data as $k=>$v)
            {
                $data[$k]['createtime'] = date('Y-m-d H:i:s',$v['createtime']);
            }
            $data[]['pageall'] = $pageAll;
            $this->ajaxReturn($data,'jsonp');
        }else{
            $this->ajaxReturn(false,'jsonp');
        }
    }
    //获得预约数量
    function getCountByStatus($status){
        $Order = D('Order');
        $data = $Order->allCount($status);
        if($data){
            $this->ajaxReturn($data,'jsonp');
        }else{
            $this->ajaxReturn(false,'jsonp');
        }
    }
}