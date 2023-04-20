<?php

namespace Itecschool\AuditPkg\Http\Controllers;

use Itecschool\AuditPkg\Http\Requests\Action\PoliciesRequest;
use Itecschool\AuditPkg\Http\Requests\Action\PolicyRequest;
use Itecschool\AuditPkg\Http\Requests\Action\IndexRequest;
use Itecschool\AuditPkg\Http\Requests\Action\ShowRequest;
use Itecschool\AuditPkg\Http\Requests\Action\CreateRequest;
use Itecschool\AuditPkg\Http\Requests\Action\UpdateRequest;
use Itecschool\AuditPkg\Http\Requests\Action\DeleteRequest;
use Itecschool\AuditPkg\Http\Requests\Action\RestoreRequest;
use Itecschool\AuditPkg\Http\Requests\Action\ForceDeleteRequest;
use Itecschool\AuditPkg\Http\Requests\Action\ExportRequest;

class ActionController extends Controller
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
