<?php
defined('TYPO3') || die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function () {
    // Icon-Klasse hattest du bereits …
    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['dialog_overlay'] = 'content-dialog-overlay';

    ExtensionManagementUtility::addStaticFile(
        'dialog_overlay',
        'Configuration/TypoScript',
        'Dialog Overlay (CE & FE Rendering)'
    );
});
