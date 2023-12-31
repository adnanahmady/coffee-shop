<?php

namespace App\Http\Requests\Api\V1\Products;

use App\Http\Requests\Api\V1\AbstractFormRequest;
use App\Models\Currency;
use App\ValueObjects\Shared\PriceInterface;
use App\ValueObjects\Shared\PriceObject;

class StoreRequest extends AbstractFormRequest
{
    public const NAME = 'name';
    public const PRICE = 'price';
    public const CURRENCY = 'currency';
    public const AMOUNT = 'amount';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            self::NAME => 'required|string|min:2',
            self::AMOUNT => 'required|int',
            self::PRICE => 'required|int',
            self::CURRENCY => sprintf(
                'required|int|exists:%s,%s',
                Currency::TABLE,
                Currency::ID
            ),
        ];
    }

    public function getName(): string
    {
        return $this->{self::NAME};
    }

    public function getPriceObject(): PriceInterface
    {
        return new PriceObject($this->{self::PRICE}, $this->{self::CURRENCY});
    }

    public function getAmount(): int
    {
        return $this->{self::AMOUNT};
    }
}
