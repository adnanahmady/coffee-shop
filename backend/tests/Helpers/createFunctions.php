<?php

use App\Models\Ability;
use App\Models\Address;
use App\Models\Currency;
use App\Models\Customization;
use App\Models\DeliveryType;
use App\Models\Option;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists('createSetting')) {
    function createSetting(
        array $fields = [],
        int $count = null,
    ): Setting|Collection {
        $factory = Setting::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createAddress')) {
    function createAddress(
        array $fields = [],
        int $count = null,
    ): Address|Collection {
        $factory = Address::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createOption')) {
    function createOption(
        array $fields = [],
        int $count = null,
    ): Option|Collection {
        $factory = Option::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createCustomization')) {
    function createCustomization(
        array $fields = [],
        int $count = null,
    ): Customization|Collection {
        $factory = Customization::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createDeliveryType')) {
    function createDeliveryType(
        array $fields = [],
        int $count = null,
    ): DeliveryType|Collection {
        $factory = DeliveryType::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createProduct')) {
    function createProduct(
        array $fields = [],
        int $count = null,
    ): Product|Collection {
        $factory = Product::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createOrderStatus')) {
    function createOrderStatus(
        array $fields = [],
        int $count = null,
    ): OrderStatus|Collection {
        $factory = OrderStatus::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createOrderItem')) {
    function createOrderItem(
        array $fields = [],
        int $count = null,
    ): OrderItem|Collection {
        $factory = OrderItem::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createOrder')) {
    function createOrder(
        array $fields = [],
        int $count = null,
        User $for = null,
    ): Order|Collection {
        $factory = Order::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        if (null !== $for) {
            $fields[Order::USER] = $for;
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createAbility')) {
    function createAbility(
        array $fields = [],
        int $count = null,
    ): Ability|Collection {
        $factory = Ability::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createRole')) {
    function createRole(
        array $fields = [],
        int $count = null,
    ): Role|Collection {
        $factory = Role::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createCurrency')) {
    function createCurrency(
        array $fields = [],
        int $count = null,
    ): Currency|Collection {
        $factory = Currency::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}

if (!function_exists('createUser')) {
    function createUser(
        array $fields = [],
        int $count = null,
    ): User|Collection {
        $factory = User::factory();

        if ($count) {
            $factory = $factory->count($count);
        }

        return $factory->create($fields);
    }
}
