<?php


return [
    'GET' => [
        '/' => ['Front\HomeController', 'index'],
        '/article/:id' => ['Front\ArticleController', 'show'],
        '/admin' => ['Back\DashboardController', 'index'],
        '/admin/users' => ['Back\UserController', 'index'],
        '/admin/users/edit/:id' => ['Back\UserController', 'edit'],
        '/admin/users/delete/:id' => ['Back\UserController', 'delete'],
    ],
    'POST' => [
        '/admin/users/create' => ['Back\UserController', 'create'],
        '/admin/users/edit/:id' => ['Back\UserController', 'edit'],
    ]
];
