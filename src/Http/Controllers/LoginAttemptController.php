<?php

namespace Itecschool\AuditPkg\Http\Controllers;

use Itecschool\AuditPkg\Http\Requests\LoginAttempt\PoliciesRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\PolicyRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\IndexRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\ShowRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\CreateRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\UpdateRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\DeleteRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\RestoreRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\ForceDeleteRequest;
use Itecschool\AuditPkg\Http\Requests\LoginAttempt\ExportRequest;

class LoginAttemptController extends Controller
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
