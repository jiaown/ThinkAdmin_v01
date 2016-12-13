<?php
namespace Admin\Model;
use Think\Model;
class ArticeModel extends Model {
	protected $_validate = array(
     array('title','require','类别名称不能为空！'), //默认情况下用正则进行验证
   );

}