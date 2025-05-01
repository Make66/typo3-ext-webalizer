<?php

use Taketool\Webalizer\Controller\ViewController;

return [
    'system_webalizer' => [
        'path' => '/module/system/webalizer',
        'referrer' => 'required,refresh-always',
        'target' => Controller\ViewController::class . '::listAction',
    ],
];
