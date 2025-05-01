<?php

return [
    'system_webalizer' => [
        'parent' => 'system',
        //'position' => ['after' => 'web_info'],
        //'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/system/statistics',
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
