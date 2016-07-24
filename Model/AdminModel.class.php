<?php
namespace Model;
use Think\Model;
class AdminModel extends Model{
    public function checkAdmPwd($username,$password){
        $info=$this->where("name='$username'")->find();
        if($info){
            if($info['password']==md5($password)){
                return $info;
                dump($info);
            }
        }
        return null;
    }
}