<?php

namespace Innoboxrr\LaravelAudit\Models\Filters\Action;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class IdFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->id) {

            $query->where('id', $request->id);

        }

        $query = Order::orderBy($query, $request, 'id');

        return $query;

    }

}
