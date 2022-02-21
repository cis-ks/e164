<?php

declare(strict_types=1);

namespace ItuTTest\E164\Unit;

use ItuT\E164\CountryCode;
use PHPUnit\Framework\TestCase;

class CountryCodeTest extends TestCase
{
    public function goodValues(): array
    {
        return [
            [
                '186945612345',
                CountryCode::SAINT_KITTS_AND_NEVIS()
            ],
            [
                '14155552671',
                CountryCode::UNITED_STATES(),
            ],
            [
                '442071838750',
                CountryCode::UNITED_KINGDOM(),
            ],
            [
                '551155256325',
                CountryCode::BRAZIL(),
            ],

        ];
    }

    /**
     * @test
     * @dataProvider goodValues
     */
    public function staticMethodFromMSISDNValueWithGoodValuesReturnsInstance($value, $expected)
    {
        $instance = CountryCode::fromMSISDNValue($value);

        $this->assertInstanceOf(CountryCode::class, $instance);
        $this->assertEquals($expected->value(), $instance->value());
    }
}
