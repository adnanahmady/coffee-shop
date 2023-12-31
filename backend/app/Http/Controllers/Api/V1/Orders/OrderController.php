<?php

namespace App\Http\Controllers\Api\V1\Orders;

use App\DataTransferObjects\Orders\StoreOrderDataDto;
use App\Exceptions\Models\InvalidOrderItemAmountException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Orders\GetListRequest;
use App\Http\Requests\Api\V1\Orders\StoreRequest;
use App\Http\Resources\Api\V1\Orders\List;
use App\Http\Resources\Api\V1\Orders\Stored;
use App\Repositories\OrderRepository;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function index(
        GetListRequest $request,
        OrderService $orderService,
    ): List\PaginatorCollection {
        return new List\PaginatorCollection(
            $orderService->getPaginated(
                $request->user(),
                $request->getPage(),
                $request->getPerPage(),
            )
        );
    }

    /**
     * The thrown exception is a handled one, and
     * its effect is expected.
     *
     * @param StoreRequest    $request         request
     * @param OrderRepository $orderRepository orderRepository
     *
     * @throws InvalidOrderItemAmountException
     */
    public function store(
        StoreRequest $request,
        OrderRepository $orderRepository
    ): Stored\PaginatorResource {
        $order = $orderRepository->orderProducts(
            new StoreOrderDataDto(
                user: $request->user(),
                deliveryType: $request->getDeliveryType(),
                address: $request->getAddress(),
            ),
            $request->getProducts(),
        );

        return new Stored\PaginatorResource($order);
    }
}
