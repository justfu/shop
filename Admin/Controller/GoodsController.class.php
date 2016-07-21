<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function show(){
        $goods =  new \Model\GoodsModel();
        $goods -> order('g_id desc');
        $goods -> where();
        $info  = $goods -> select();
        $this->assign('info',$info);
        $this->display();
    }

    public function add(){
        $goods=new \Model\GoodsModel();
        //展示表單  收集表單
        if(!empty($_POST)){
            $z = $goods -> add($_POST);
            if($z){
                $this->redirect('show',array('name'=>'dsa'),5,'添加商品成功');
            }else{
                $this->redirect('add',array('dsa'=>'das'),5,'添加失敗,請重新添加');
            }

        }else {
            $this->display();
        }
    }

    public function update($id){
            $goods=new \Model\GoodsModel();
            if(!empty($_POST)){
                $z=$goods->save($_POST);
                if($z){
                    $this->redirect('show',array('name'=>'dsa'),5,'修改商品成功!!');
                }else{
                    $this->redirect('update',array('g_id'=>$id),5,'修改商品成功!!');
                }
            }
            $res = $goods->find($id);
            $this->assign('info',$res);
            $this->display();
    }
}