<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'DasLampe.' . $_EXTKEY,  // vendor + extkey, seperated by a dot
    'Contactform',            // plugin name
    'DasLampe - From with Reply-To'  // backend title
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'DasLampe - Form with Reply-To');