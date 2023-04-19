<?php

namespace Itecschool\AuditPkg\Http\Controllers;

use Innoboxrr\SearchSurge\Search\Builder;
use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Resources\Models\ActionResource;
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
use Itecschool\AuditPkg\Http\Events\Action\Events\CreateEvent;
use Itecschool\AuditPkg\Http\Events\Action\Events\DeleteEvent;
use Itecschool\AuditPkg\Http\Events\Action\Events\ExportEvent;
use Itecschool\AuditPkg\Http\Events\Action\Events\ForceDeleteEvent;
use Itecschool\AuditPkg\Http\Events\Action\Events\RestoreEvent;
use Itecschool\AuditPkg\Http\Events\Action\Events\UpdateEvent;

class ActionController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $action = ($request->id) ? 
            Action::findOrFail($request->id) : 
            app(Action::class);

        return response()->json([
            'index'          => user()->can('index', $action),
            'view'           => user()->can('view', $action),
            'viewAny'        => user()->can('viewAny', $action),
            'create'         => user()->can('create', $action),
            'update'         => user()->can('update', $action),
            'delete'         => user()->can('delete', $action),
            'restore'        => user()->can('restore', $action),
            'forceDelete'    => user()->can('forceDelete', $action),
            'export'         => user()->can('export', $action),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $action = ($request->id) ? 
            Action::findOrFail($request->id) : 
            app(Action::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $action),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new Builder();

        $query = $builder->get(Action::class, $request);

        return ActionResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $action = Action::where('id', $request->action_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new ActionResource($action);

    }

    public function create(CreateRequest $request)
    {

        $action = (new Action)->createModel($request);

        $response = new ActionResource($action);

        event(new CreateEvent($action, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $action = Action::findOrFail($request->action_id);

        $action = $action->updateModel($request);

        $response = new ActionResource($action);

        event(new UpdateEvent($action, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $action = Action::findOrFail($request->action_id);

        $action->deleteModel();

        $response = new ActionResource($action);

        event(new DeleteEvent($action, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $action = Action::withTrashed()->findOrFail($request->action_id);

        $action->restoreModel();

        $response = new ActionResource($action);

        event(new RestoreEvent($action, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $action = Action::withTrashed()->findOrFail($request->action_id);

        $action->forceDeleteModel();

        $response = new ActionResource($action);

        event(new ForceDeleteEvent($action, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
