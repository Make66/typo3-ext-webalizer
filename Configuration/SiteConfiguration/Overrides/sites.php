<?php

// Prevent script from being called directly
defined('TYPO3') or die();

$newColumns = [
    'webalizerShowPath' => [
        'label' => 'Full web path',
        'config' => [
            'type' => 'input',
            'eval' => 'trim'
        ],
    ],
];

$newPalettes = [
    'webalizer_default' => [
        'showitem' => 'webalizerShowPath',
    ],
];


$GLOBALS['SiteConfiguration']['site']['columns'] = array_merge_recursive(
    $GLOBALS['SiteConfiguration']['site']['columns'],
    $newColumns
);

$GLOBALS['SiteConfiguration']['site']['palettes'] = array_merge_recursive(
    $GLOBALS['SiteConfiguration']['site']['palettes'],
    $newPalettes
);


$GLOBALS['SiteConfiguration']['site']['types']['0']['showitem'] .= ',--div--;Webalizer, --palette--;;webalizer_default';
