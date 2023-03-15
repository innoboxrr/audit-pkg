<?php

namespace Itecschool\AuditPkg\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function map()
    {

        $this->mapApiRoutes();      

    }

    protected function mapApiRoutes()
    {

        foreach (glob(__DIR__ . '/../../routes/api/models/*.php') as $file) {

            $name = basename($file, '.php');

            Route::middleware('api')
                ->prefix('api/itecschool/auditpkg/' . $name)
                ->as('api.itecschool.auditpkg.' . $name . '.')
                ->namespace('Itecschool\AuditPkg\Http\Controllers')
                ->group($file);

        }

    }

}
