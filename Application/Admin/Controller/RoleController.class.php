<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends CommonController {

    public function lst(){
        $role = D('role');
        $list = $role->field("a.*,GROUP_CONCAT(b.pri_name) pri_name")->alias('a')->join("left join bg_privilege b on FIND_IN_SET(b.id,a.pri_id_list)")->group('a.id') -> select();
        $this->assign('list',$list);
        
        $this->display();
    }

    public function add(){
        $role = D('role');
        if(IS_POST){
            if($role->create()){
                $role->pri_id_list = implode(',', $role->pri_id_list);
                if($role->add()){
                    $this->success('角色添加成功',U('lst'));
                }else{
                    $this->error('角色添加失败');
                }
            }else{
                $this->error($role->getError());
            }         
        }else{
            $pri = D('privilege'); 
            $prires = $pri -> PriTree();
            $this -> assign('prires',$prires);
            $this->display();
        }
        
    }

    public function edit(){
        $role = D('role');
        if(IS_POST){
            if(!$role->create()){
                $this->error($role->getError());
            }else{
                $role->pri_id_list = implode(',', $role->pri_id_list);
                if($role->save()){
                    $this->success('角色修改成功！',U('lst'));
                }else{
                    $this->error('角色修改失败！');
                }
            }
        }else{
            $id =  I('id');
            $roles = $role->find($id);
            $this->assign('roles',$roles);

            $pri = D('privilege'); 
            $prires = $pri -> PriTree();
            $this -> assign('prires',$prires);
            $this->display();
        }
    }

    public function delete($id){
        $role = D('role');
        if($role->delete($id)){
            $this->success('删除角色成功',U('lst'));
        }else{
            $this->error('删除角色失败');
        }
    }

    // 批量删除
    public function bdel(){
        $role = D('role');
        $ids = I('ids');
        $key = array_search(1, $ids);  //array_search 返回键值
        if($key!==false){
            unset($ids[$key]);   //unset 销毁变量
        }
        $ids = implode(',',$ids);
        if($role->delete($ids)){
            $this->success('批量删除角色成功',U('lst'));
        }else{
            $this->error('批量删除角色失败');
        }
    }

}