<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model {
	protected $_validate = array(
     array('name','require','类别名称不能为空！'), //默认情况下用正则进行验证
    array('name','','类别名称已经存在！',0,'unique',3), // 在新增的时候验证name字段是否唯一
   );

	public function cateTree(){
		$data = $this->select();
		return $this->resort($data);
	}

	public function resort($data,$parentid=0,$level=0){
		static $ret=array();
		foreach ($data as $k => $v) {
			if($v['parentid']==$parentid){
				$v['level']=$level;
				$ret[]=$v;
				$this->resort($data,$v['cateid'],$level+1);
				// var_dump($ret);
			}
		}
		return $ret;
	}

	public function childid($cateid){
		$data = $this -> select();
		return $this -> getchildid($data,$cateid);
	}

	public function getchildid($data,$parentid){
		static $ret = array();
		foreach ($data as $k => $v) {
			if($v['parentid']==$parentid){
				$ret[] = $v['cateid'];
				$this->getchildid($data,$v['cateid']);
			}
		}
		return $ret;
	}

	public function _before_delete($options){
		if(is_array($options['where']['cateid'])){
			$arr = explode(',',$options['where']['cateid'][1]);
			$soncates = array();
			foreach ($arr as $k => $v) {
				$soncates = $this -> childid($v);
			}
			$soncates =  array_unique($soncates);
			$childids = implode(',', $soncates);
		}else{
			$childids = $this -> childid($options['where']['cateid']);
			$childids = implode(',', $childids);
		}

		if($childids){
			$this->execute("delete from bg_cate where cateid in($childids)");
		}
	}
}