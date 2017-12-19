<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'DasLampe.' . $_EXTKEY,  // vendor + extkey, seperated by a dot
    'Contactform',            // plugin name
    'Contactform'  // backend title
);