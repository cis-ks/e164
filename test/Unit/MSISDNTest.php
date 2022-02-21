<?php

declare(strict_types=1);

namespace ItuTTest\E164\Unit;

use ItuT\E164\MSISDN;
use PHPUnit\Framework\TestCase;

class MSISDNTest extends TestCase
{
    public function goodValues(): array
    {
        return [
            'from saint kitts and nevis msisdn' => [
                '186945612345',
            ],
            'from usa msisdn' => [
                '14155552671'
            ],
            'from uk msisdn' => [
                '442071838750'
            ],
            'from brazil msisdn' => [
                '551155256325'
            ],
        ];
    }

    /**
     * @test
     * @dataProvider goodValues
     */
    public function staticMethodFromStringWithGoodValuesReturnsInstance($value)
    {
        $instance = MSISDN::fromString($value);

        $this->assertInstanceOf(MSISDN::class, $instance);
    }

    /**
     * @test
     * @dataProvider goodValues
     */
    public function methodToStringWillReturnsExpectedValues($msisdnValue)
    {
        $instance = MSISDN::fromString($msisdnValue);

        $this->assertEquals($msisdnValue, $instance->__toString());
    }
}
