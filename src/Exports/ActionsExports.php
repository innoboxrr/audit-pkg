<?php

namespace Itecschool\AuditPkg\Exports;

use Itecschool\AuditPkg\Models\Action;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ActionsExports implements FromView
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
            ) . 'action', 
            [
                'actions' => $this->getQuery()
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Action::class, $this->request);

    }

}