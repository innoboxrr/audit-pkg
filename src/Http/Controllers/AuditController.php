<?php

namespace Itecschool\AuditPkg\Http\Controllers;

use Innoboxrr\SearchSurge\Search\Builder;
use Itecschool\AuditPkg\Models\Audit;
use Itecschool\AuditPkg\Http\Resources\Models\AuditResource;
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
use Itecschool\AuditPkg\Http\Events\Audit\Events\CreateEvent;
use Itecschool\AuditPkg\Http\Events\Audit\Events\DeleteEvent;
use Itecschool\AuditPkg\Http\Events\Audit\Events\ExportEvent;
use Itecschool\AuditPkg\Http\Events\Audit\Events\ForceDeleteEvent;
use Itecschool\AuditPkg\Http\Events\Audit\Events\RestoreEvent;
use Itecschool\AuditPkg\Http\Events\Audit\Events\UpdateEvent;

class AuditController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $audit = ($request->id) ? 
            Audit::findOrFail($request->id) : 
            app(Audit::class);

        return response()->json([
            'index'          => user()->can('index', $audit),
            'view'           => user()->can('view', $audit),
            'viewAny'        => user()->can('viewAny', $audit),
            'create'         => user()->can('create', $audit),
            'update'         => user()->can('update', $audit),
            'delete'         => user()->can('delete', $audit),
            'restore'        => user()->can('restore', $audit),
            'forceDelete'    => user()->can('forceDelete', $audit),
            'export'         => user()->can('export', $audit),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $audit = ($request->id) ? 
            Audit::findOrFail($request->id) : 
            app(Audit::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $audit),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new Builder('Audit', $request);

        $query = $builder->get();

        return AuditResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $audit = Audit::where('id', $request->audit_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new AuditResource($audit);

    }

    public function create(CreateRequest $request)
    {

        $audit = (new Audit)->createModel($request);

        $response = new AuditResource($audit);

        event(new CreateEvent($audit, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $audit = Audit::findOrFail($request->audit_id);

        $audit = $audit->updateModel($request);

        $response = new AuditResource($audit);

        event(new UpdateEvent($audit, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $audit = Audit::findOrFail($request->audit_id);

        $audit->deleteModel();

        $response = new AuditResource($audit);

        event(new DeleteEvent($audit, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $audit = Audit::withTrashed()->findOrFail($request->audit_id);

        $audit->restoreModel();

        $response = new AuditResource($audit);

        event(new RestoreEvent($audit, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $audit = Audit::withTrashed()->findOrFail($request->audit_id);

        $audit->forceDeleteModel();

        $response = new AuditResource($audit);

        event(new ForceDeleteEvent($audit, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
