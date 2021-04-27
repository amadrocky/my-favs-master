<?php

return [
    'class' => 'yii\rest\UrlRule',
    //user
    'POST register' => 'register/create',
    // contact
    'POST contact' => 'contact/add',
    'GET contacts' => 'contact/all',
    'POST contacts' => 'contact/removeFavorites',
    'POST contacts' => 'contact/addDescription',
    'PUT contacts' => 'contact/editDescription',
    'POST contacts' => 'contact/removeDescription',

    //generic
    '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
    '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
];