<?php

namespace Innoboxrr\LaravelAudit\Models\Filters\Audit;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        // Añadir restricciones de visibilidad

        return $query;

    }

}