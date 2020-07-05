<?php
namespace DasLampe\AfContactform\Tests\Acceptance\Support\Extension;

use TYPO3\TestingFramework\Core\Acceptance\Extension\BackendEnvironment;

/**
 * Load various core extensions
 */
class BackendDummyEnvironment extends BackendEnvironment
{
    /**
     * Load a list of core extensions
     *
     * @var array
     */
    protected $localConfig = [
        'coreExtensionsToLoad' => [
            'core',
            'extbase',
            'fluid',
            'backend',
            'about',
            'install',
            'frontend',
            'recordlist',
            'extensionmanager',
        ],
        'testExtensionsToLoad' => [
            'typo3conf/ext/af_contactform',
        ],
        'xmlDatabaseFixtures' => [
            'PACKAGE:typo3/testing-framework/Resources/Core/Acceptance/Fixtures/be_users.xml',
            'PACKAGE:typo3/testing-framework/Resources/Core/Acceptance/Fixtures/be_sessions.xml',
            'PACKAGE:typo3/testing-framework/Resources/Core/Acceptance/Fixtures/be_groups.xml',
        ],
    ];
}