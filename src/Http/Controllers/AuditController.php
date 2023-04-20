<?php

namespace Itecschool\AuditPkg\Http\Controllers;

use Itecschool\AuditPkg\Http\Requests\Audit\PoliciesRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\PolicyRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\IndexRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\ShowRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\CreateRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\UpdateRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\DeleteRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\RestoreRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\ForceDeleteRequest;
use Itecschool\AuditPkg\Http\Requests\Audit\ExportRequest;

class AuditController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function policies(PoliciesRequest $request)
    {
        $request->handle();   
    }

    public function policy(PolicyRequest $request)
    {
        $request->handle();
    }

    public function index(IndexRequest $request)
    {
        $request->handle();   
    }

    public function show(ShowRequest $request)
    {
        $request->handle();   
    }

    public function create(CreateRequest $request)
    {
        $request->handle();   
    }

    public function update(UpdateRequest $request)
    {
        $request->handle();   
    }

    public function delete(DeleteRequest $request)
    {
        $request->handle();   
    }

    public function restore(RestoreRequest $request)
    {
        $request->handle();   
    }

    public function forceDelete(ForceDeleteRequest $request)
    {
        $request->handle();   
    }

    public function export(ExportRequest $request)
    {
        $request->handle();   
    }

}
