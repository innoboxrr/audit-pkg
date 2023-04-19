<?php

namespace Itecschool\AuditPkg\Models\Filters\Audit;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_loggable == 1 || $request->load_loggable == true) {

            $query->with(['loggable']);

        }

        if ($request->load_user == 1 || $request->load_user == true) {

            $query->with(['user']);

        }

        if ($request->load_action == 1 || $request->load_action == true) {

            $query->with(['action']);

        }

        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
