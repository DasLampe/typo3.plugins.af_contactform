<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'DasLampe.' . $_EXTKEY,       // vendor + extkey, sperated by .
    'Contactform',                // plugin name
    array(
        'Frontend' => 'index,sendMail',
    ),
    //disable caching
    array(
        'Frontend' => 'index,sendMail',
    )
);