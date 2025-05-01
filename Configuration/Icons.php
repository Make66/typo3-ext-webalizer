<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'tx_webalizer-backend-module' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:webalizer/Resources/Public/Icons/module-indexed_search.svg',
    ],
];
