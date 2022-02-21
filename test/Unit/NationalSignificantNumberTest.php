<?php

declare(strict_types=1);

namespace ItuTTest\E164\Unit;

use ItuT\E164\MSISDN;
use ItuT\E164\NationalSignificantNumber;
use PHPUnit\Framework\TestCase;

class NationalSignificantNumberTest extends TestCase
{
    public function goodValues(): array
    {
        return [
            'from saint kitts and nevis msisdn' => [
                '186945612345',
                '45612345'
            ],
            'from usa msisdn' => [
                '14155552671',
                '4155552671'
            ],
            'from uk msisdn' => [
                '442071838750',
                '2071838750'
            ],
            'from brazil msisdn ' => [
                '551155256325',
                '1155256325'
            ],
        ];
    }

    /**
     * @test
     * @dataProvider goodValues
     */
    public function staticMethodFromStringWithGoodValuesReturnsInstance($msisdn, $expectedValue)
    {
        $instance = NationalSignificantNumber::fromMSISDNValue($msisdn);

        $this->assertInstanceOf(NationalSignificantNumber::class, $instance);
        $this->assertEquals($expectedValue, $instance->value());
    }
}
