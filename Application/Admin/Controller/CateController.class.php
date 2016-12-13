<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController {

    public function lst(){
        $cate = D('cate');
        $cates = $cate->cateTree();
        $this->assign('cates',$cates);

        $this->display();
    }

    public function add(){
        if(IS_POST){

            $cate = D('cate');

            if($_FILES['pic']['tmp_name']!=''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->saveName = array('time','');
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      './Public/Uploads/'; // 设置附件上传根目录
                $upload->rootPath  =      './';
                // 上传单个文件 
                $info   =   $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                     $_POST['pic'] = substr($info['savepath'].$info['savename'],1);
                }
            }

            if(!$cate->create()){
                $this->error($cate->getError());
            }else{
                if($cate->add()){
                    $this->success('栏目新增成功',U('lst'));
                }else{
                    $this->error('栏目添加失败');
                }
            }
        }else{
            $cate = D('cate');
            $cates = $cate->cateTree();
            $this->assign('cates',$cates);
            $this->display();
        }
        
    }

    public function edit(){
        if(IS_POST){
            $cate = D('cate');

            if($_FILES['pic']['tmp_name']!=''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->saveName = array('time','');
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      './Public/Uploads/'; // 设置附件上传根目录
                $upload->rootPath  =      './';
                // 上传单个文件 
                $info   =   $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    $_POST['pic'] = substr($info['savepath'].$info['savename'],1);
                    // $cateid = I('cateid');
                    // $info = $cate->find($cateid);
                    // unlink(SITE_URL.$info['pic']);   //删除现有图片
                     // var_dump($_POST['pic']);exit;
                }
            }else{
                $cateid = I('cateid');
                $info = $cate->find($cateid);
                $_POST['pic'] = $info['pic'];
                // var_dump($_POST['pic']);exit;
            }

            if($cate->create()){
                if($cate->save()){
                    $this->success('修改类别成功',U('lst'));
                }else{
                    $this->error($cate->getError());
                }

            }else{
                $this->error('类别修改失败');
            }

        }else{
            $cate = D('cate');
            $cateid = I('id');
            $info = $cate->find($cateid);
            $this->assign('info',$info);

            $cates = $cate->cateTree();
            $this->assign('cates',$cates);
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