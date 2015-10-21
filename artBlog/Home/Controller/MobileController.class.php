<?php
/**
 * Created by PhpStorm.
 * User: zhangke
 * Date: 2015/10/21 0021
 * Time: 14:44
 */

namespace Home\Controller;
use Think\Controller;

class MobileController extends Controller{
    function index(){
        $this->display('index');
    }
}