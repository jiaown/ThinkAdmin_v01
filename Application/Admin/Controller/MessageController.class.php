<?php
namespace Admin\Controller;
use Think\Controller;
class MessageController extends CommonController {

    public function lst(){
        $message = D('Message');
        $mes = $message->field("mid,nickname,email,actived")->select();
        $this->assign('mes',$mes);
        $this->display();
    }

    public function reply(){
        $mid = I('id');
        if(IS_POST){
            $message = D('Message');
            if($message->create()){
                if($message->save()){
                    $this->success('回复成功！',U('lst'));
                }else{
                    $this->error($message-getError());
                }

            }else{
                $this->error('回复失败！');
            }


        }else{
            $message = D('Message');
            $info = $message->find($mid);
            $this->assign('info',$info);
            $this->display();
        }
    }

    public function delete(){
       $message = D('Message');
        $mid = I('id');
        if($message->delete($mid)){
            $this->success('删除栏目成功',U('lst'));
        }else{
            $this->error('删除栏目失败');
        }
    }

    // 批量删除
    public function bdel(){
        $message = D('Message');
        $ids = I('ids');
        $ids = implode(',',$ids);
        if($message->delete($ids)){
            $this->success('删除栏目成功',U('lst'));
        }else{
            $this->error('删除栏目失败');
        }
    }

}