<?php

return [
    'web_webalizer' => [
        'parent' => 'web',
        //'position' => ['after' => 'web_info'],
        //'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/web/statistics',
        'labels' => 'LLL:EXT:webalizer/Resources/Private/Language/Module/locallang_mod.xlf',
        'extensionName' => 'Statistics',
        'iconIdentifier' => 'tx_webalizer-backend-module',
        'controllerActions' => [
            \Taketool\Webalizer\Controller\ViewController::class => [
                'index',
            ],
        ],
    ],
];
