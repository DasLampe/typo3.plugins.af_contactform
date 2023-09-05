<?php

use DasLampe\AfContactform\Controller\FrontendController;

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'AfContactform',
        'Contactform',                // plugin name
        array(
            FrontendController::class => 'index,sendMail',
        ),
        //disable caching
        array(
            FrontendController::class => 'index,sendMail',
        )
    );
})();