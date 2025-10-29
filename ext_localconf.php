<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(static function () {
    // fix for typo3 14 and use the page.typoscript file ...
    ExtensionManagementUtility::addPageTSConfig(
        '@import \'EXT:dialog_overlay/Configuration/PageTS/NewContentElement.typoscript\'' . PHP_EOL
    );
    // b13/container liest YAML automatisch
})();
