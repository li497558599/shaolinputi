<?php

return array(
    //'配置项'=>'配置值'
    'URL_MODEL' => '2',
//    'url_html_suffix' => true,
    'URL_PATHINFO_DEPR'     =>  '?',	// PATHINFO模式下，各参数之间的分割符号
    'URL_ROUTER_ON' => true, // 开启路由
    'URL_ROUTE_RULES' => array(// 路由规则

        'question_in/:id' => 'Home/Question/question_in',
        
        'news_in/:id' => 'Home/News/news_in',
        '/^index$/i' => 'Home/Index/index', // 路由
        'info1/:id' => 'Home/Index/info1',
        '/^about$/i' => 'Home/About/about', // 路由
        'student' => 'Home/Student/student', // 路由
        'charge' => 'Home/Charge/charge', // 路由
        'course' => 'Home/Course/course', // 路由
        'environment' => 'Home/Environment/environment', // 路由
        'question' => 'Home/Question/question', // 路由
        'question_route' => 'Home/Question/question_route', // 路由
        'page' => 'Home/Question/question',
        'graduate' => 'Home/Graduate/graduate', // 路由
        'news' => 'Home/News/news', // 路由
        'contact' => 'Home/Contact/contact', // 路由
//        'news' => 'Home/News/news/cates/:武校新闻',
//        'news/:cates' => 'Home/News/news/cates/:媒体关心',
//        'news/:cates' => 'Home/News/news/cates/:少林资讯',
//        'news/:cates' => 'Home/News/news/cates/:学院军训',
//        
        'news_in' => 'Home/News/news_in',
        'sign_up' => 'Home/Charge/sign_up',
        'get' => 'Home/News/get',
        'del' => 'Home/News/del',
        'deletefiles' => 'Home/News/deletefiles',
        'deldb' => 'Home/News/deldb',
        'deldata' => 'Home/News/deldata',
    ),
);
