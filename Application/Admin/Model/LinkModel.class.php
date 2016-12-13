<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model {
	protected $_validate = array(
     array('title','require','链接名称不能为空！'), //默认情况下用正则进行验证
    array('title','','链接名称已经存在！',0,'unique',3), // 在新增的时候验证name字段是否唯一
   );
}