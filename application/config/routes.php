<?php

// Список созданных страниц
return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'rules' => [
        'controller' => 'main',
        'action' => 'index',
        'table' => 'rules',
    ],

    'rules/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
        'table' => 'rules',
    ],

    'rules/{category:.+}' => [
        'controller' => 'main',
        'action' => 'category',
        'table' => 'rules',
    ],



    'post' => [
        'controller' => 'main',
        'action' => 'index',
        'table' => 'post',
    ],

    'post/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
        'table' => 'post',
    ],



    'dictionary' => [
        'controller' => 'main',
        'action' => 'index',
        'table' => 'dictionary',
    ],

    'dictionary/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
        'table' => 'dictionary',
    ],

    'dictionary/{category:.+}' => [
        'controller' => 'main',
        'action' => 'category',
        'table' => 'dictionary',
    ],


    'audio' => [
        'controller' => 'main',
        'action' => 'index',
        'table' => 'audio',
    ],

    'audio/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
        'table' => 'audio',
    ],

    'audio/{category:.+}' => [
        'controller' => 'main',
        'action' => 'category',
        'table' => 'audio',
    ],


    'listening' => [
        'controller' => 'main',
        'action' => 'index',
        'table' => 'listening',
    ],

    'listening/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
        'table' => 'listening',
    ],

    'listening/{category:.+}' => [
        'controller' => 'main',
        'action' => 'category',
        'table' => 'listening',
    ],




    'videos' => [
        'controller' => 'main',
        'action' => 'index',
        'table' => 'videos',
    ],

    'videos/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
        'table' => 'videos',
    ],

    'videos/{category:.+}' => [
        'controller' => 'main',
        'action' => 'category',
        'table' => 'videos',
    ],

    /*********************************
     ***************ADMIN***********
     ******************************/

    // Admin страницы
    'admin' => [
        'controller' => 'admin',
        'action' => 'index',
    ],

    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],

    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],

    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],


    // Rules
    'admin/rules/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
        'table' => 'rules',
    ],

    'admin/rules/add' => [
        'controller' => 'admin',
        'action' => 'add',
        'table' => 'rules',
    ],

    'admin/rules/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
        'table' => 'rules',
    ],

    'admin/rules/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
        'table' => 'rules',
    ],

    'admin/rules/category' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'rules',
    ],

    'admin/rules/category/{category:.+}' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'rules',
    ],



    // Listening
    'admin/listening/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
        'table' => 'listening',
    ],

    'admin/listening/add' => [
        'controller' => 'admin',
        'action' => 'add',
        'table' => 'listening',
    ],

    'admin/listening/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
        'table' => 'listening',
    ],

    'admin/listening/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
        'table' => 'listening',
    ],

    'admin/listening/category' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'listening',
    ],

    'admin/listening/category/{category:.+}' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'listening',
    ],



    // Dictionary
    'admin/dictionary/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
        'table' => 'dictionary',
    ],

    'admin/dictionary/add' => [
        'controller' => 'admin',
        'action' => 'add',
        'table' => 'dictionary',
    ],

    'admin/dictionary/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
        'table' => 'dictionary',
    ],

    'admin/dictionary/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
        'table' => 'dictionary',
    ],

    'admin/dictionary/category' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'dictionary',
    ],

    'admin/dictionary/category/{category:.+}' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'dictionary',
    ],

    // Videos

    'admin/videos/add' => [
        'controller' => 'admin',
        'action' => 'add',
        'table' => 'videos',
    ],

    'admin/videos/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
        'table' => 'videos',
    ],

    'admin/videos/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
        'table' => 'videos',
    ],

    'admin/videos/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
        'table' => 'videos',
    ],

    'admin/videos/category' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'videos',
    ],

    'admin/videos/category/{category:.+}' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'videos',
    ],


    // Audio

    'admin/audio/add' => [
        'controller' => 'admin',
        'action' => 'add',
        'table' => 'audio',
    ],

    'admin/audio/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
        'table' => 'audio',
    ],

    'admin/audio/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
        'table' => 'audio',
    ],

    'admin/audio/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
        'table' => 'audio',
    ],

    'admin/audio/category' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'audio',
    ],

    'admin/audio/category/{category:.+}' => [
        'controller' => 'admin',
        'action' => 'category',
        'table' => 'audio',
    ],

    // Post

    'admin/post/add' => [
        'controller' => 'admin',
        'action' => 'add',
        'table' => 'post',
    ],

    'admin/post/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
        'table' => 'post',
    ],

    'admin/post/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
        'table' => 'post',
    ],

    'admin/post/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
        'table' => 'post',
    ],


    /*********************************
     ***************ACCOUNT***********
     ******************************/
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/register/{ref:.+}' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/recovery' => [
        'controller' => 'account',
        'action' => 'recovery',
    ],
    'account/profile' => [
        'controller' => 'account',
        'action' => 'profile',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
    'account/confirm' => [
        'controller' => 'account',
        'action' => 'confirm',
    ],
    'account/confirm/{token:.+}' => [
        'controller' => 'account',
        'action' => 'confirm',
    ],
    'account/reset/{token:.+}' => [
        'controller' => 'account',
        'action' => 'reset',
    ],
];