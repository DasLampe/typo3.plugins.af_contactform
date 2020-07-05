<?php
namespace DasLampe\AfContactform\Tests\Acceptance\Backend;

use DasLampe\AfContactform\Tests\Acceptance\Support\BackendTester;
use TYPO3\TestingFramework\Core\Acceptance\Helper\Topbar;

/**
 * Tests the backend module can be loaded
 */
class ModuleTest
{
    /**
     * @param BackendTester $I
     */
    public function _before(BackendTester $I)
    {
//        $I->useExistingSession('admin');
    }

    /**
     * @param BackendTester $I
     */
    public function dummyTest(BackendTester $I)
    {
    }

}