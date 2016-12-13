<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {
	protected $_validate = array(
     array('username','require','用户名不能为空！'), 
     array('username','','用户名已经存在！',0,'unique',1), 
     array('username','','用户名已经存在！',0,'unique',2), 
     array('password','require','密码不能为空！'), 
     array('verify','verify','验证码不正确',0,'callback',4),
   );

	public function getpri($roleid){
		$role = D('role');
		$role ->field('rolename,pri_id_list')->find($roleid);
		session('rolename',$role->rolename);
		if($role->pri_id_list=='*'){
			session('privilege','*');
			$pri = D('privilege');
			$menu = $pri -> where("parentid=0")->select();
			foreach ($menu as $k => $v) {
				$menu[$k]['sub'] = $pri->where("parentid=".$v['id'])->select();
			}
			session('menu',$menu);

		}else{
			$pri = D('privilege');
			$pris = $pri->field("id,parentid,pri_name,mname,cname,aname,concat(mname,'/',cname,'/',aname) url")->where("id in({$role->pri_id_list})") ->select();
			$_pris = array();
			$menu = array();
			foreach ($pris as $k => $v) {
				$_pris[] = $v['url'];
				if($v['parentid']==0){
					$menu[] = $v;
				}
			}
			session('privilege',$_pris);
			foreach ($menu as $k => $v) {
				foreach ($pris as $k1 => $v1) {
					if($v1['parentid']==$v['id']){
						$menu[$k]['sub'][] = $v1;
					}
				}
			}
			session('menu',$menu);
		}
	}

	public function login(){
		$password = $this->password;
		$info = $this->where("username = '$this->username'") -> find();
		if($info){
			if($info['password']==md5($password)){
				$id = $info['id'];
				// $roles = $this->field("b.rolename")->alias('a')->join("left join bg_role b on a.roleid=b.id")->where("a.id='$id'")->find();
				// $rolename = $roles['rolename'];
				session('id',$id);
				session('username',$info['username']);
				$this->getpri($info['roleid']);
				// session('rolename',$roles['rolename']);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function verify($code){
		$verify = new \Think\Verify();
    	return $verify->check($code, '');
	}

}