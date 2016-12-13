<?php
 return array (
  'DB_TYPE' => 'mysql',
  'DB_HOST' => '',
  'DB_NAME' => '',
  'DB_USER' => '',
  'DB_PWD' => '',
  'DB_PORT' => 3306,
  'DB_PREFIX' => 'bg_',
  'DB_CHARSET' => 'utf8',
  'DB_DEBUG' => true,

  // 关闭缓存
  TMPL_CACHE_ON'   => false,  // 默认开启模板编译缓存 false 的话每次都重新编译模板
  'ACTION_CACHE_ON'  => false,  // 默认关闭Action 缓存
  'HTML_CACHE_ON'   => false,   // 默认关闭静态缓存

  // 路由模式
  'URL_MODEL' => '2',
  'URL_HTML_SUFFIX' => 'html',

  'DOMIN' => 'www.jiaown.com',
  'TITLE' => 'jiaown个人博客-学习、分享、追寻新技术',
  'KEYWORDS' => '网站建设，微信开发，泰州网站建设，个人博客',
  'DESCRIPTION' => 'jiaown一个专注于WEB开发的技术博客，喜欢编程和各种新技术',
  'EMAIL' => '316231881@qq.com',
  'CONTACT' => 'jiaown',
  'PHONE' => '18360010137',
  'ICP' => '苏ICP备16008253号-1',
  'ADDRESS' => '泰州',
); ?>