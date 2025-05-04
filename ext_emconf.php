<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Webalizer view',
    'description' => 'View web statistics',
    'category' => 'be',
    'state' => 'stable',
    'author' => 'Martin Keller',
    'author_email' => 'martin.keller@taketool.de',
    'author_company' => 'Taketool GmbH',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
