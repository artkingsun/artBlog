<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('home');
    }
    public function about(){
        $this->display('about');
    }

    public function home(){
        $this->display('home');
    }

    public function messageCenter(){
        $this->display('messageCenter');
    }

    public function myBlog(){
        $this->display('myBlog');
    }

    public function personSet(){
        $this->display('personSet');
    }

    public function workHelp(){
        $this->display('workHelp');
    }

    public function publishBlog(){
        $this->display('publishBlog');
    }

    public function login(){
        $this->display('login');
    }
    public function register(){
        $this->display('register');
    }
    public function blogDetail(){
        $this->display('blogDetail');
    }
    public function demoShow(){
        $this->display('demoShow');
    }
}