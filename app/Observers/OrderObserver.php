<?php

namespace App\Observers;

use App\Jobs\ProcessOrder;
use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Order $order): void
    {
        ProcessOrder::dispatch($order)->delay(now()->addMinutes(3));
    }
}
