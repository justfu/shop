<?php
namespace Home\Controller;
use Model\UserModel;
use Think\Controller;
use Think\Verify;

class UserController extends Controller {
    public function login(){

          if(!empty($_POST)){
              $very=new Verify();
              if($very->check($_POST[]));
          }
          $this->display(); //展现视图 不填写参数那么和当前方法名字相同
    }

    public function register(){
        $user=new UserModel();
        if(!empty($_POST)){

            //附件上传

            //表单自动验证
            $notice=$user->create();
            if($notice){
                $user->add($_POST);
                $this->redirect('index',array(),5,'注册成功!');
            }else{
                $this->assign('errorInfo',$user->getError());
            }
        }
        $this->display();
    }

    public function VerifyImg(){
        $cfg=array(
            'imageH'    =>  45,               // 验证码图片高度
            'imageW'    =>  100,
            'fontSize'  =>  12
        );
        $very=new Verify($cfg);
        $very->entry();
    }
}