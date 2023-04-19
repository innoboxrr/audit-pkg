<?php

namespace Itecschool\AuditPkg\Exports;

use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LoginAttemptsExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view(
            config(
                'itecschoolauditpkg.excel_view', 
                'itecschoolauditpkg::excel.'
            ) . 'login_attempt', 
            [
                'login_attempts' => $this->getQuery()
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get('Itecschool\AuditPkg\Models\LoginAttempt', $this->request);

    }

}