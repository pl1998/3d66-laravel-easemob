<?php

return [
    /*
    |--------------------------------------------------------------------------
    | 环信超级社区RESTful API 配置
    |--------------------------------------------------------------------------
    |
    | host 环信即时通讯 IM 分配的用于访问 RESTful API 的域名
    | org_name 环信即时通讯 IM 为每个公司（组织）分配的唯一标识。
    | app_name 你在环信即时通讯云控制台创建应用时填入的应用名称。
    | client_id App 的 client_id，用于生成 app token 调用 REST API。
    | App 的 client_secret，用于生成 app token 调用 REST API。
    |
    */
    'super_community' => [
        'host'          => 'a1.easemob.com',
        'org_name'      => '1126240125169917',
        'app_name'      => 'demo',
        'client_id'     => 'YXA6wtUPq45dR2a2M7qetVFfqA',
        'client_secret' => 'YXA6GnKa6H3b1BeSd7cesU0xHl0PHG8',
    ],
];
