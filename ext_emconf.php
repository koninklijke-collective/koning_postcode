<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Postcode',
    'description' => 'Dutch postcode check with eID',
    'category' => 'misc',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Jesper Paardekooper',
    'author_email' => 'j.paardekooper@grandslam-media.nl',
    'author_company' => 'GrandSlam Media',
    'constraints' => [
        'depends' => [
            'typo3' => '6.2.0-7.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
