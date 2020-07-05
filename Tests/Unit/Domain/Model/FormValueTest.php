<?php
namespace DasLampe\AfContactform\Tests\Domain\Model;

use DasLampe\AfContactform\Domain\Model\FormValue;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2020 André Flemming <andre@scoutnet.de>, ScoutNet
 *
 *  All rights reserved
 ***************************************************************/


class FormValueTest extends UnitTestCase
{
    protected $validData;

    public function setUp() : void
    {
        parent::setUp();
        $this->validData = [
            'name' => 'Foo Bar',
            'email' => 'example@example.org',
            'msg' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
        ];
    }

    /**
     * @test
     */
    public function inputSameOutputTest() {
        $subject = new FormValue();
        $subject->setEmail($this->validData['email']);
        $subject->setFullname($this->validData['name']);
        $subject->setMessage($this->validData['msg']);

        $this->assertSame($this->validData['email'], $subject->getEmail());
        $this->assertSame($this->validData['name'], $subject->getFullname());
        $this->assertSame($this->validData['msg'], $subject->getMessage());
        $this->assertEmpty($subject->getPhone());
    }
}