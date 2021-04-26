<?php

return [
    'class' => 'yii\rest\UrlRule',
    //user
    'POST register' => 'register/create',
    // contact
    'POST contact' => 'contact/add',

    //generic
    '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
    '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
];