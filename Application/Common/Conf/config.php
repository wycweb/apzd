<?php
return array(
    // 'DB_HOST'   => 'sqld-gz.bcehost.com:4050', //服务器地址
    // 'DB_TYPE'   => 'mysql',     //数据库类型
    // 'DB_NAME'   => 'doPZUmHqieNkXqpVvkRD',      //数据库名称
    // 'DB_USER'   => '02d19c83365147f399102555492fbeae',      //数据库用户名
    // 'DB_PWD'    => '79c2fa3a98544c2b813e651b7bdd79a0',          //数据库密码
    // 'DB_PREFIX' => 'apzd_',     //数据表前缀

   'DB_HOST'   => 'localhost', //服务器地址
   'DB_TYPE'   => 'mysql',     //数据库类型
   'DB_NAME'   => 'apzd',      //数据库名称
   'DB_USER'   => 'root',      //数据库用户名
   'DB_PWD'    => '',          //数据库密码
   'DB_PREFIX' => 'apzd_',     //数据表前缀

    'URL_ROUTER_ON'   => true,    //开启路由
    'URL_HTML_SUFFIX' => '',    //设置伪静态
    'URL_ROUTE_RULES'=>array(
        'employ$' => 'Home/Index/employ',
        'service$' => 'Home/Index/advice',
    ),

    'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    1296000,   // 全局静态缓存有效期（秒）    // 60*60*24*15 = 15天
    'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
        '*' => array('{$_SERVER.REQUEST_URI|md5}'),
    )
);