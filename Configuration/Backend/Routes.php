<?php

use Taketool\Webalizer\Controller\ViewController;

return [
    'web_webalizer' => [
        'path' => '/module/web/webalizer',
        'referrer' => 'required,refresh-always',
        'target' => Controller\ViewController::class . '::listAction',
    ],
];
