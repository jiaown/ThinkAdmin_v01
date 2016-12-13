<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {

	public function lst(){
		$admin = D('admin');
		$where = 1;
		$keywords = I('keywords');
		if($keywords){
			$where.= " and username like '%".$keywords."%'";
		}

		$count = $admin->where($where)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数()
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show = $Page->show();// 分页显示输出

		$admins = $admin->field("a.*,b.rolename")->alias('a')->join("left join bg_role b on a.roleid=b.id")->where($where)->limit($Page->firstRow.','.$Page->listRows)->group("a.id")->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this ->assign('admins',$admins);
		$this->display();
	}

	public function add(){
		if(IS_POST){
			$admin = D('admin');
			if($admin->create()){
				$admin->password = md5($admin->password);
				if($admin->add()){
					$this->success('管理员新增成功',U('lst'));
				}else{
					$this -> error('管理员添加失败！');
				}
			}else{
				$this->error($admin->getError());
			}

		}else{
			$role = D('role');
			$roles = $role->select();
			$this->assign('roles',$roles);
			$this -> display();
		}
		
	}

	public function edit(){
		$admin = D('admin');
		if(IS_POST){
			if($admin->create()){
				$admin->password = md5($admin->password);
				if($admin->save()){
					$this->success('管理员修改成功',U('lst'));
				}else{
					$this -> error('管理员修改失败！');
				}
			}else{
				$this->error($admin->getError());
			}

		}else{
			$id = I('id');
			$admins = $admin -> find($id);
			$this -> assign('admins',$admins);

			$role = D('role');
			$roles = $role->select();
			$this->assign('roles',$roles);
			$this -> display();
		}

		
	}

	public function del(){
		$admin = D('admin');
		$id = I('id');
		if($id==1){
			$this -> error('超级管理员不能删除！');
		}
		if($admin->delete($id)){
			$this->error('管理员删除成功！',U('lst'));
		}else{
			$this -> error('管理员删除失败！');
		}

	}

	public function bdel(){
		$admin = D('admin');
		$ids = I('ids');
		$ids = implode(',', $ids);
		if($admin->delete($ids)){
			$this->error('管理员删除成功！',U('lst'));
		}else{
			$this -> error('管理员删除失败！');
		}

	}

	public function logout(){
		session(null);
		$this -> success('退出成功！',U('Index/index'));
	}

}