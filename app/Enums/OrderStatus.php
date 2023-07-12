<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';

    case Paid = 'paid';

    case Delivered = 'delivered';

    case Cancelled = 'cancelled';

}