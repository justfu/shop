<?php
namespace Admin\Controller;
use Model\AdminModel;
use Think\Controller;
use Think\Verify;
class AdminController extends Controller{
    public function login(){
        if(!empty($_POST)){
              $very=new Verify();
              if($very->check($_POST['captcha'])){
                  //验证码正确 开始验证用户账户信息
                  $admin=new AdminModel();
                  $info=$admin->checkAdmPwd($_POST['username'],$_POST['password']);
                  if($info){
                      //保存session信息
                      session('admin_id',$info['id']);
                      session('admin_name',$info['name']);
                      $this->redirect('Index/index','',3,'登陆成功');
                  }else{
                      $this->assign('userinfoerror','账号密码填写错误!');
                  }
              }else{
                  $this->assign('ve_error','验证码填写错误!!!');
              }
        }
        $this->display();
    }

    public function VerifyImg(){
        $cfg=array(
            'imageH'    =>  45,               // 验证码图片高度
            'imageW'    =>  100,
            'fontSize'  =>  16,
            'length'    =>  1
        );
        $very=new Verify($cfg);
        $very->entry();
    }
}