<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {

    public function lst(){
        $link = D('link');
        $links = $link->order('id desc')->select();
        $this -> assign('links',$links);
        $this->display();
    }

    public function add(){
        $link = D('link');
        if(IS_POST){
            if(!$link->create()){
                $this->error($link->getError());
            }else{
                if($link->add()){
                    $this->success('链接添加成功！',U('lst'));
                }else{
                    $this->error('栏目添加失败！');
                }
            }
        }else{
            $this->display();
        }
        
    }

    public function edit(){
        $link = D('link');
        if(IS_POST){
            // var_dump($_POST);die;
            if(!$link->create()){
                $this->error($link->getError());
            }else{
                if($link->save()){
                    $this->success('链接修改成功！',U('lst'));
                }else{
                    $this->error('栏目修改失败！');
                }
            }
        }else{
            $id =  I('id');
            $links = $link->find($id);
            $this->assign('links',$links);
            $this->display();
        }
    }

    public function delete($id){
        $link = D('link');
        if($link->delete($id)){
            $this->success('删除链接成功',U('lst'));
        }else{
            $this->error('删除链接失败');
        }
    }

    // 批量删除
    public function bdel(){
        $link = D('link');
        $ids = I('ids');
        $ids = implode(',',$ids);
        if($link->delete($ids)){
            $this->success('删除链接成功',U('lst'));
        }else{
            $this->error('删除链接失败');
        }
    }

    // 更新排序
    public function besort(){
        $link = D('link');
        foreach ($_POST as $id => $sort) {
            $link -> where("id=$id") -> setField('sort',$sort);
        }
        $this -> success('更新排序成功！',U('lst'));
    }
}