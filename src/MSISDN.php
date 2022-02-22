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

        return new static($countryCode, $nationalSignificantNumber);
    }

    public function getCountryCode(): CountryCode
    {
        return $this->countryCode;
    }

    public function getNationalSignificantNumber(): NationalSignificantNumber
    {
        return $this->nationalSignificantNumber;
    }

    public function __toString(): string
    {
        return $this->countryCode->value() . $this->nationalSignificantNumber->value();
    }
}
