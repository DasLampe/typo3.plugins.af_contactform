<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'DasLampe.af_contactform',  // vendor + extkey, seperated by a dot
    'Contactform',            // plugin name
    'DasLampe - From with Reply-To'  // backend title
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('af_contactform', 'Configuration/TypoScript', 'DasLampe - Form with Reply-To');