<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController {

	public function lst(){
		if(IS_POST){
			$_POST = array_change_key_case($_POST,CASE_UPPER);
			$file = './Application/Common/Conf/config.php';
			$config = array_merge(include $file,$_POST);
			$str = "<?php\r\n return ".var_export($config,true)."; ?>";
			if(file_put_contents($file, $str)){
				$this -> success('修改信息成功！',U('lst'));
			}else{
				$this -> error('修改信息失败！');
			}
		}else{
			$this->display();
		}
		
	}

}