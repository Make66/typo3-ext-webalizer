<?php

declare(strict_types=1);

use Taketool\Webalizer\Controller\ViewController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// Module System > Backend Users
ExtensionUtility::registerModule(
    'Webalizer',
    'web',
    'webalizer',
    'bottom',
    [
        ViewController::class => 'index',
    ],
    [
        'access' => 'admin',
        'iconIdentifier' => 'tx_webalizer-backend-module',
        'labels' => 'LLL:EXT:webalizer/Resources/Private/Language/Module/locallang_mod.xlf',
    ]
);
