<?php
namespace Model;
use Think\Model;
class UserModel extends Model{

     protected $patchValidate    =   true;
     protected $_validate = array(
         //array(字段,验证规则,错误提示,[验证条件，附加规则,验证时间]);
         array('u_username','require','用户名不能为空!'),
         array('u_password','require','密码不能为空!'),
         array('u_password2','require','确认密码不能为空!'),
         array('u_password2','password','两次密码必须一致',0,'confirm')
     );
}