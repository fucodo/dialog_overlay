<?php

$EM_CONF['dialog_overlay'] = [
    'title' => 'Dialog Overlay',
    'description' => 'Container-CE mit HTML5 <dialog> (modal) und Cookie-gesteuerter einmaliger Anzeige.',
    'category' => 'fe',
    'author' => 'Fucodo',
    'author_email' => 'info@fucodo.example',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.99.99',
        ],
    ],
];
