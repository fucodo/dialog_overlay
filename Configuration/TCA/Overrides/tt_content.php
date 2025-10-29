<?php

defined('TYPO3') || die();


// container
(function () {
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
        new \B13\Container\Tca\ContainerConfiguration(
            'dialog_overlay',                                  // CType
            'Dialog Overlay (einmalig anzeigen)',              // Label
            'HTML5-Dialog (modal), öffnet 1x per Cookie.',     // Beschreibung
            [
                [
                    // Eine Area „Dialog-Inhalt“ mit eindeutiger colPos
                    ['name' => 'Dialog-Inhalt', 'colPos' => 201],
                ],
            ]
        )
        )
    # ->setIcon('EXT:dialog_overlay/Resources/Public/Icons/content-element-overlay.svg')
    # ->setGroup('special')
    # ->setRegisterInNewContentElementWizard(true)
    # ->setDefaultValues(['CType' => 'dialog_overlay'])
    );
})();

// basic tca
(function () {
    $newColumns = [
        'cookie_lifetime_days' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:dialog_overlay/Resources/Private/Language/locallang_db.xlf:tt_content.cookie_lifetime_days',
            'config' => [
                'type' => 'number',
                'size' => 5,
                'default' => 30,
                'range' => ['lower' => 0, 'upper' => 365],
                'eval' => 'int'
            ],
        ],
        'cookie_name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:dialog_overlay/Resources/Private/Language/locallang_db.xlf:tt_content.cookie_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'placeholder' => 'overlay_shown_{uid}',
                'eval' => 'trim,lower'
            ],
        ],
        'auto_open' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:dialog_overlay/Resources/Private/Language/locallang_db.xlf:tt_content.auto_open',
            'config' => [
                'type' => 'check',
                'items' => [
                    ['label' => 'LLL:EXT:dialog_overlay/Resources/Private/Language/locallang_db.xlf:tt_content.auto_open.item0']
                ],
                'default' => 1
            ],
        ],
        'show_close_button' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:dialog_overlay/Resources/Private/Language/locallang_db.xlf:tt_content.show_close_button',
            'config' => ['type' => 'check', 'default' => 1],
        ],
        'close_button_label' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:dialog_overlay/Resources/Private/Language/locallang_db.xlf:tt_content.close_button_label',
            'config' => ['type' => 'input', 'size' => 30, 'default' => 'Schließen'],
            'displayCond' => 'FIELD:show_close_button:=:1'
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $newColumns);

    # \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    #     'tt_content',
    #     'CType',
    #     [
    #         'label' => 'Dialog Overlay (einmalig)',
    #         'value' => 'dialog_overlay',
    #         'icon'  => 'content-dialog-overlay',
    #         'group' => 'special',
    #     ],
    #     'container',
    #     'after'
    # );

    $GLOBALS['TCA']['tt_content']['types']['dialog_overlay']['showitem'] = '
            --palette--;;general, header;Titel,
            --div--;Einstellungen,
                cookie_lifetime_days, cookie_name, auto_open, show_close_button, close_button_label,
    ';
})();


