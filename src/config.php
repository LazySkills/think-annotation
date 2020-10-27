<?php

return [
    'inject' => [
        'enable'     => true,
        'namespaces' => [],
    ],
    'route'  => [
        'enable'      => true,
        'controllers' => [],
    ],
    'model'  => [
        'enable' => true,
    ],
    'ignore' => [],
    'store'  => null,//缓存store
    'custom' => [
        'enable'      => true,
        # 格式：注解类 => 注解操作类
        'namespaces' => [],
    ],
];
