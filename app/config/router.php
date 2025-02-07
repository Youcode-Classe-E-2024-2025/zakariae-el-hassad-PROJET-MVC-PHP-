<?php


return [
    'GET' => [
        '/' => ['Front\HomeController', 'index'],
        // '/article/{id}' => ['ArticleController', 'show'],
        '/userarticles' => ['Front\ArticleController', 'show'],
        '/login' => ['Front\HomeController', 'showlogin'],
        '/signup' => ['Front\HomeController', 'showsinup'],
        '/admin' => ['Back\DashboardController', 'index'],
        '/logout' => ['Back\UserController', 'logout'],
        '/users' => ['Back\UserController', 'index'],
        '/admin/users/edit/:id' => ['Back\UserController', 'edit'],
        '/admin/users/delete/:id' => ['Back\UserController', 'delete'],
    ],
    'POST' => [
        '/create-user' => ['Back\UserController', 'create'],
        '/admin/users/edit/:id' => ['Back\UserController', 'edit'],
        '/login' => ['Back\UserController', 'login'],
    ]
];

