<?php
namespace Admin\Controller;
use Think\Controller;
class PrivilegeController extends CommonController {

    public function lst(){
        $pri = D('privilege');
        $pris = $pri->priTree();
        $this -> assign('pris',$pris);
        $this->display();
    }

    public function add(){
        if(IS_POST){
            $pri = D('privilege');
            if($pri -> create()){
                if($pri -> add()){
                    $this -> success('权限新增成功！',U('lst'));
                }else{
                    $this -> error('权限新增失败！');
                }
            }else{
                $this ->error($pri->getError());
            }
        }else{
            $pri = D('privilege');
            $pris = $pri -> priTree();
            $this -> assign('pris',$pris);
            $this->display();
        }
        
    }

    public function edit(){
        if(IS_POST){
            $pri = D('privilege');
            if($pri -> create()){
                if($pri -> save()){
                    $this -> success('权限修改成功！',U('lst'));
                }else{
                    $this -> error('权限修改失败！');
                }
            }else{
                $this ->error($pri->getError());
            }
        }else{
            $pri = D('privilege');
            $pris = $pri -> priTree();
            $this -> assign('pris',$pris);
            $id = I('id');
            $prires = $pri->find($id);
            $this -> assign('prires',$prires);
            $this->display();
        }
    }

    public function delete(){
        $cate = D('cate');
        $cateid = I('id');
        if($cate->delete($cateid)){
            $this->success('删除栏目成功',U('lst'));
        }else{
            $this->error('删除栏目失败');
        }
    }

    // 批量删除
    public function bdel(){
        $cate = D('cate');
        $ids = I('ids');
        $ids = implode(',',$ids);
        if($cate->delete($ids)){
            $this->success('删除栏目成功',U('lst'));
        }else{
            $this->error('删除栏目失败');
        }
    }

    // 更新排序
    public function besort(){
        $cate = D('cate');
        foreach ($_POST as $id => $sort) {
            $cate -> where("cateid=$id") -> setField('sort',$sort);
        }
        $this -> success('更新排序成功！',U('lst'));
    }
}