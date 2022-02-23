<?php

declare(strict_types=1);

namespace ItuT\E164;

use Webmozart\Assert\Assert;

/**
 * @link https://ldapwiki.com/wiki/National%20Destination%20Code
 */
class NationalSignificantNumber
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromMSISDNValue(string $msisdnValue)
    {
        Assert::digits($msisdnValue);

        $countryCode = CountryCode::fromMSISDNValue($msisdnValue);
        $nationalSignificantNumberValue = substr($msisdnValue, strlen($countryCode->value()));

        return new static($nationalSignificantNumberValue);
    }

    public function value(): string
    {
        return $this->value;
    }
}
