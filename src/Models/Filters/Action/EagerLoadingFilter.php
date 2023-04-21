<?php

namespace Itecschool\AuditPkg\Models\Filters\Action;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_audits == 1 || $request->load_audits == true) {

            $query->with(['audits']);

        }

        if ($request->load_actionable == 1 || $request->load_actionable == true) {

            $query->with(['actionable']);

        }
        
        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
