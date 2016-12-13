<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        // $this->show('admin index','utf-8');

    	$uname = php_uname('s');  //获取系统类型
    	$host = $_SERVER["HTTP_HOST"];  //获取域名
    	$version =  'PHP:'.PHP_VERSION;  //php版本
    	$sapi = php_sapi_name();  //运行方式
    	$hostname = GetHostByName($_SERVER['SERVER_NAME']);
    	$hostInfo = array('uname'=>$uname,'host'=>$host,'version'=>$version,'sapi'=>$sapi,'hostname'=>$hostname);
    	$this->assign('hostInfo',$hostInfo);
        $this-> display();
    }

}