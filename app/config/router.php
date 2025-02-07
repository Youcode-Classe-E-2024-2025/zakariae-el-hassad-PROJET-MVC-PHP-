<?php


return [
    'GET' => [
        '/' => ['Front\HomeController', 'showlogin'],
        '/userarticles' => ['Front\ArticleController', 'show'],
        '/home' => ['Front\HomeController', 'index'],
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
        '/createarticle' => ['Front\ArticleController', 'create'],
        '/deletearticle' => ['Front\ArticleController', 'deleteArticle'],
        '/deleteadminarticle' => ['Front\ArticleController', 'deleteAdminArticle'],
        '/deleteuser' => ['back\UserController', 'deleteUser'],

    ]
];

