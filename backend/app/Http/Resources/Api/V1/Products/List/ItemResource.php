<?php

namespace App\Http\Resources\Api\V1\Products\List;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public const PRODUCT_ID = 'product_id';
    public const NAME = 'name';
    public const PRICE = 'price';
    public const AMOUNT = 'amount';

    /** @var Product */
    public $resource;

    public function toArray(Request $request): array
    {
        return [
            self::PRODUCT_ID => $this->resource->getId(),
            self::NAME => $this->resource->getName(),
            self::PRICE => $this->resource->getPriceObject()->represent(),
            self::AMOUNT => $this->resource->getAmount(),
        ];
    }
}