<?php

namespace Innoboxrr\LaravelAudit\Models\Filters\Audit;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Utils\CreationFilterQuery;

class CreationFilter
{

    public static function apply(Builder $query, Request $request)
    {

        $query = CreationFilterQuery::sort($query, $request);

        $query = Order::orderBy($query, $request, 'created_at');

        return $query;

    }

}
