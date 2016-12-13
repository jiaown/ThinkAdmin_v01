<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	function __construct(){
		parent::__construct();
		if(!session('id')){
			$this -> error('请先登录！',U('Login/login'));
		}

		if(MODULE_NAME=='Admin' && CONTROLLER_NAME=='Index' && ACTION_NAME=='index'){
			return true;
		}

		if(MODULE_NAME=='Admin' && CONTROLLER_NAME=='Admin' && ACTION_NAME=='logout'){
			return true;
		}
		
		if(session('privilege')!='*' && !in_array(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('privilege'))){
			$this -> error('没有权限访问该功能！');
		}
	}

	public function _empty(){
		$this->error("错误空操作");
	}

}
