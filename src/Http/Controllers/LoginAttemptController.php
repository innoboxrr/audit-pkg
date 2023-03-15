<?php

namespace Itecschool\AuditPkg\Http\Controllers;

use Innoboxrr\SearchSurge\Search\Builder;
use Itecschool\AuditPkg\Models\LoginAttempt;
use Itecschool\AuditPkg\Http\Resources\Models\LoginAttemptResource;
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
use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\CreateEvent;
use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\DeleteEvent;
use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\ExportEvent;
use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\ForceDeleteEvent;
use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\RestoreEvent;
use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\UpdateEvent;

class LoginAttemptController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $loginAttempt = ($request->id) ? 
            LoginAttempt::findOrFail($request->id) : 
            app(LoginAttempt::class);

        return response()->json([
            'index'          => user()->can('index', $loginAttempt),
            'view'           => user()->can('view', $loginAttempt),
            'viewAny'        => user()->can('viewAny', $loginAttempt),
            'create'         => user()->can('create', $loginAttempt),
            'update'         => user()->can('update', $loginAttempt),
            'delete'         => user()->can('delete', $loginAttempt),
            'restore'        => user()->can('restore', $loginAttempt),
            'forceDelete'    => user()->can('forceDelete', $loginAttempt),
            'export'         => user()->can('export', $loginAttempt),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $loginAttempt = ($request->id) ? 
            LoginAttempt::findOrFail($request->id) : 
            app(LoginAttempt::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $loginAttempt),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new Builder('LoginAttempt', $request);

        $query = $builder->get();

        return LoginAttemptResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $loginAttempt = LoginAttempt::where('id', $request->login_attempt_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new LoginAttemptResource($loginAttempt);

    }

    public function create(CreateRequest $request)
    {

        $loginAttempt = (new LoginAttempt)->createModel($request);

        $response = new LoginAttemptResource($loginAttempt);

        event(new CreateEvent($loginAttempt, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $loginAttempt = LoginAttempt::findOrFail($request->login_attempt_id);

        $loginAttempt = $loginAttempt->updateModel($request);

        $response = new LoginAttemptResource($loginAttempt);

        event(new UpdateEvent($loginAttempt, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $loginAttempt = LoginAttempt::findOrFail($request->login_attempt_id);

        $loginAttempt->deleteModel();

        $response = new LoginAttemptResource($loginAttempt);

        event(new DeleteEvent($loginAttempt, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $loginAttempt = LoginAttempt::withTrashed()->findOrFail($request->login_attempt_id);

        $loginAttempt->restoreModel();

        $response = new LoginAttemptResource($loginAttempt);

        event(new RestoreEvent($loginAttempt, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $loginAttempt = LoginAttempt::withTrashed()->findOrFail($request->login_attempt_id);

        $loginAttempt->forceDeleteModel();

        $response = new LoginAttemptResource($loginAttempt);

        event(new ForceDeleteEvent($loginAttempt, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
