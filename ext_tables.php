<?php

defined('TYPO3') || die();

call_user_func(function () {
    // Icon-Class für CType
    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['dialog_overlay'] = 'content-dialog-overlay';
});
