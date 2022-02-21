<?php

declare(strict_types=1);

namespace ItuT\E164;

class MSISDN
{
    /**
     * @var CountryCode
     */
    private $countryCode;

    /**
     * @var NationalSignificantNumber
     */
    private $nationalSignificantNumber;

    public function __construct(
        CountryCode $countryCode,
        NationalSignificantNumber $nationalSignificantNumber
    ) {
        $this->countryCode = $countryCode;
        $this->nationalSignificantNumber = $nationalSignificantNumber;
    }

    public static function fromString(string $value)
    {
        $countryCode = CountryCode::fromMSISDNValue($value);
        $nationalSignificantNumber = NationalSignificantNumber::fromMSISDNValue($value);

        return new self($countryCode, $nationalSignificantNumber);
    }
}
