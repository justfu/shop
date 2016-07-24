<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Image;
use Think\Upload;
use Think\Page;
class GoodsController extends Controller{
    public function show($p){
        $goods =  new \Model\GoodsModel();
        //使用Tp自带的分页类实现数据的分页
        $config  = array(
            'header' => '<span class="rows">共 %TOTAL_ROW% 条记录</span>',
            'prev'   => '上一页',
            'next'   => '下一页',
            'first'  => '1...',
            'last'   => '...%TOTAL_PAGE%',
            'theme'  => '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%',
        );
        $page=new Page();
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','第一页');
        $page->listRows=2;
        $page->totalRows=$goods->count();
        $page->firstRow=1;

        $page->totalPages=ceil($page->totalRows/$page->listRows);
        $sql="select * from tp_goods limit " .($p-1)*$page->listRows.','.$page->listRows;
        $info=$goods->query($sql);
        $nav=$page->show();
        $this->assign('info',$info);
        $this->assign('nav',$nav);
        $this->display();
    }

    public function add(){
        $goods=new \Model\GoodsModel();
        //展示表單  收集表單
        if(!empty($_POST)){

            if($_FILES['g_img']['error']<4){
                $config=array(
                    'rootPath' => './Public/Uploads/'
                );
                $upload=new Upload($config);
                $z = $upload->uploadOne($_FILES['g_img']);
                $bigpic=$upload->rootPath.$z['savepath'].$z['savename'];
                $smallpic=$upload->rootPath.$z['savepath'].'small_'.$z['savename'];

                $im=new \Think\Image();
                $im->open($bigpic);
                $im->thumb(100,100);
                $im->save($smallpic);
            }
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

    public function delete($id){
          $goods=new \Model\GoodsModel();
          if($goods->delete($id)){
              echo '删除成功';
          }else{
              echo '删除失败';
          }
    }
}