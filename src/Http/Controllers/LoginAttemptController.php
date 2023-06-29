<?php

namespace Innoboxrr\LaravelAudit\Http\Controllers;

use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\PoliciesRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\PolicyRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\IndexRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\ShowRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\CreateRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\UpdateRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\DeleteRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\RestoreRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\ForceDeleteRequest;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\ExportRequest;

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
