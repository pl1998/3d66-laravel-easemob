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
        'host'          => env('IM_SUPER_COMMUNITY_HOST'),
        'org_name'      => env('IM_SUPER_COMMUNITY_ORG_NAME'),
        'app_name'      => env('IM_SUPER_COMMUNITY_APP_NAME'),
        'client_id'     => env('IM_SUPER_COMMUNITY_CLIENT_ID'),
        'client_secret' => env('IM_SUPER_COMMUNITY_CLIENT_SECRET'),
        'app_token_ttl' => 36000, // 单位秒
        'app_token_key' => 'im:app:token:key',
    ],
];
