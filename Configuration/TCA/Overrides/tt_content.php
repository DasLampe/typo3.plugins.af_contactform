<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'AfContactform',
    'Contactform',            // plugin name
    'DasLampe - Form with Reply-To'  // backend title
);