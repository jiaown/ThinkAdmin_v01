<?php
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model {
	protected $_validate = array(
     array('rolename','require','角色名称不能为空！'), //默认情况下用正则进行验证
     array('rolename','','角色名称已经存在！',0,'unique',3), // 在新增的时候验证name字段是否唯一
   );
}