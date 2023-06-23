<?php

namespace App\Http\Resources\Api\V1\Orders\List;

use App\Models\OrderItem;
use App\Repositories\OrderItemRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public const ID = 'id';
    public const NAME = 'product_name';
    public const AMOUNT = 'amount';
    public const PRICE = 'price';

    /** @var OrderItem */
    public $resource;
    private OrderItemRepository $orderItemRepository;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->orderItemRepository = new OrderItemRepository();
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            self::ID => $this->resource->getId(),
            self::NAME => $this->orderItemRepository
                ->getProduct($this->resource)->getName(),
            self::AMOUNT => $this->resource->getAmount(),
            self::PRICE => $this->resource
                ->getPriceObject()->represent(),
        ];
    }
}
