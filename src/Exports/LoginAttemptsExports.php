<?php

namespace Innoboxrr\LaravelAudit\Exports;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
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
                'innoboxrrlaravelaudit.excel_view', 
                'innoboxrrlaravelaudit::excel.'
            ) . 'login_attempt', 
            [
                'login_attempts' => $this->getQuery()
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(LoginAttempt::class, $this->request);

    }

}