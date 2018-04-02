<?php


return [
    // 自定义用户名
    'username' => 'username',

    //自定义分页数量
    'paginate' => 10,

    // 默认主题
    'theme' => 'default',

    // id加密配置
    'encrypt' => [
        'main' => true,
        'permission' => true,
        'role' => true,
        'user' => true,
        'menu' => true,
    ],
    'cache' => [
        'menuList' => 'menuList'
    ]
];
