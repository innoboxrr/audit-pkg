<?php

namespace Itecschool\AuditPkg\Exports;

use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AuditsExports implements FromView
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
            ) . 'audit', 
            [
                'audits' => $this->getQuery()
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder('Audit', $this->request);

        return $builder->get();

    }

}