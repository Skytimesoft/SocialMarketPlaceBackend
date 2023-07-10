<?php

namespace App\Filters\API;

use App\Filters\API\ApiFilter;

class ProductFilter extends ApiFilter
{
    protected $safeParms = [
        'category_id' => ['eq'],
        'sub_category_id' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥',
    ];
}