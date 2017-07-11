<?php

namespace NumaxLab\Sgae\Tests\Records;

use Carbon\Carbon;
use NumaxLab\Sgae\Records\AbstractRecord;
use NumaxLab\Sgae\Records\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    /**
     * @var \NumaxLab\Sgae\Records\Session
     */
    protected $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new Session();
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
            ->setTicketsQty(10)
            ->setEarnings(154.32);

        $line = $this->sut->toLine();

        $this->assertInternalType('string', $line);
        $this->assertEquals(89, mb_strlen($line));
    }
}
