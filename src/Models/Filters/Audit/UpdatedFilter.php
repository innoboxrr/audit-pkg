<?php

namespace Innoboxrr\LaravelAudit\Models\Filters\Audit;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Utils\UpdatedFilterQuery;

class UpdatedFilter
{

    public static function apply(Builder $query, Request $request)
    {

        $query = UpdatedFilterQuery::sort($query, $request);

        $query = Order::orderBy($query, $request, 'updated_at');

        return $query;

    }

}
