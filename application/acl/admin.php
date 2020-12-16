<?php
// Расположение страниц по ролям пользователей в админ панеле
return [
    'all' => [
        'login',
        'index',
    ],
    'authorize' => [

    ],
    'guest' => [

    ],
    'admin' => [
        'posts',
        'logout',
        'add',
        'delete',
        'edit',
        'category',
    ]

];