<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

	public function index(){

	}

	public function login(){
		if(IS_POST){
			$admin = D('admin');
			if($admin->create($code,4)){
				if($admin->login()){
					$this->success('登录中...',U('Index/index'));
				}else{
					$this->error('用户名或密码错误!');
				}
			}else{
				$this -> error($admin->getError());
			}
		}else{
			$this->display();
		}
		
	}

	public function verify(){
		$Verify = new \Think\Verify();
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->entry();
	}
}