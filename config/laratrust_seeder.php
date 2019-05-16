<?php

return [
    'role_structure' => [
        // somebody with access to the site network administrations features and all other features
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        // somebody who has access to all the administration features within a single site
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        // somebody who can publish and manage posts including the posts of other users
        'editor' => [
            'profile' => 'r,u'
        ],
        // somebody who can publish and manage thier own posts.
        'author' => [
            'profile' => 'r,u'
        ],
        // somebody who can write and manage their own posts but cannot publish them.
        'contributor' => [
            'profile' => 'r,u'
        ],
        // somebody who can only manage their profile
        'subscriber' => [
            'profile' => 'r,u'
        ],
        // somebody who support the blog
        'supporter' => [
            'profile' => 'r,u'
        ],
    ],
    // this is for user with specific permission
    'permission_structure' => [
        // 'cru_user' => [
        //     'profile' => 'c,r,u'
        // ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
