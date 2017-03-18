<?php
return array(
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'thinkphpcms',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'cms_',    // 数据库表前缀

    //数据库备份还原
    'DB_BACKUP_PATH'     => './Public/backup/',     //数据库备份路径必须以 / 结尾；
    
    //显示调试信息
    'SHOW_PAGE_TRACE'       =>  true, 

    //开启静态缓存
    'HTML_CACHE_ON' => true, 
    // 开启静态缓存
    'HTML_CACHE_TIME' => 60, // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX' => '.html', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES' => array(
            'Home:index' => array('index',0),
            'List:index' => array('list/{:action}_{id}',0),
            'Page:index' => array('page/{:action}_{id}',0),
            'Show:index' => array('show/{:action}_{id}',0),
        ),

    //加载其他配置文件
    'LOAD_EXT_CONFIG'		=>	'system.config',//加载站点信息配置文件

    //设置路由相关
    'URL_MODEL'             =>  2,
    'URL_ROUTER_ON'         =>  true,   // 是否开启URL路由
    'URL_ROUTE_RULES'       =>  array(
            'list/:id\d' => 'Home/List/index',
            'page/:id\d' => 'Home/Page/index',
            'show/:id\d' => 'Home/Show/index',

    ), 

    //伪静态
    //'URL_HTML_SUFFIX'       =>  'html',  // URL伪静态后缀设置

    //权限认证
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
    ),


    //自定义标签相关
    'TAGLIB_BUILD_IN' => 'cx,Home\TagLib\TagLibHome',
);