<?php

namespace NumaxLab\Sgae\Tests\Records;

use Carbon\Carbon;
use NumaxLab\Sgae\Records\AbstractRecord;
use NumaxLab\Sgae\Records\Work;
use PHPUnit\Framework\TestCase;

class WorkTest extends TestCase
{
    /**
     * @var \NumaxLab\Sgae\Records\Work
     */
    protected $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new Work();
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->sut = null;
    }

    public function testExtendsAbstractRecord()
    {
        $this->assertInstanceOf(AbstractRecord::class, $this->sut);
    }

    public function testConvertsToLine()
    {
        $this->sut->setPropertyCode(123456)
            ->setSessionDatetime(Carbon::now())
            ->setTitle('Test title')
            ->setVersion(2)
            ->setLanguage(4);

        $line = $this->sut->toLine();

        $this->assertInternalType('string', $line);
        $this->assertEquals(89, mb_strlen($line));
    }

    public function testMbString()
    {
        $this->sut->setPropertyCode(123456)
            ->setSessionDatetime(Carbon::now())
            ->setTitle('Test title áüè')
            ->setVersion(2)
            ->setLanguage(4);

        $line = $this->sut->toLine();

        $this->assertInternalType('string', $line);
        $this->assertEquals(89, mb_strlen($line));
    }
}
