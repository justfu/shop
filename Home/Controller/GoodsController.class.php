<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function showlist(){
        $model= D('goods');
        $goods=$model->select(1);
        $this->assign('list',$goods);
        $this->display();
    }

    public function detail(){
        $this->display();
    }
}