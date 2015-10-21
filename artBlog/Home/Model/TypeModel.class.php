<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/8/4 0004
 * Time: 20:20
 */

namespace Home\Model;
use Think\Model;

class TypeModel extends Model{
    //读取分类列表
    function readType(){
        //$data['userid'] = $userid;
        $rc = $this->field('typeid,typename,typepic')->select();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //根据类型获取类型图标
    function getPicByType($userid,$typename){
        $data['userid'] = $userid;
        $data['typename'] = $typename;
        $rc = $this->where($data)->field('typepic')->find();
        if($rc){
            return $rc;
        }else{
            return false;
        }
    }
    //添加分类
    function addType($userid,$typename){
        $data['typename'] = $typename;
        $data['userid'] = $userid;
        $rc = $this->add($data);
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //删除分类
    function delType($userid,$typeid){
        $data['userid'] = $userid;
        $data['typeid'] = $typeid;
        $rc = $this->where($data)->delete();
        if($rc){
            return true;
        }else{
            return false;
        }
    }
    //修改分类
    function updateType($userid,$typeid,$typename){
        $data['userid'] = $userid;
        $data['typeid'] = $typeid;
        $map['typename'] = $typename;
        $rc = $this->where($data)->save($map);
        if($rc !== false){
            return true;
        }else{
            return false;
        }
    }
}