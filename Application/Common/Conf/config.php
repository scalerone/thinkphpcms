<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'thinkphpcms',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'cms_',    // 数据库表前缀

    'SHOW_PAGE_TRACE'       =>  true, 

    'LOAD_EXT_CONFIG'		=>	'system.config',//加载外部配置文件

    'AUTH_CONFIG'=>array(
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'cms_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'cms_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'cms_auth_rule', //权限规则表
        'AUTH_USER' => 'cms_admin'//用户信息表
    ),

    //不需要认证的方法
    'AUTH_NOT_ACTION' => array(
        'Index/index',
        'Index/logout',
        'Admin/edit',
        'Cache/index',
        'Public/uploadLogo',
        'Public/uploadIco',
        'Public/uploadWateThumb',
        'Public/uploadWateContent',
        'Article/upload',
        'Article/editImgUpload',
    )

);