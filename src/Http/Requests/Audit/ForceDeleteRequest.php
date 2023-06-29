<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Audit;

use Innoboxrr\LaravelAudit\Models\Audit;
use Innoboxrr\LaravelAudit\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Innoboxrr\LaravelAudit\Http\Events\Audit\Events\ForceDeleteEvent;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $audit = Audit::withTrashed()->findOrFail($this->audit_id);
        
        return $this->user()->can('forceDelete', $audit);

    }

    public function rules()
    {
        return [
            'audit_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $audit = Audit::withTrashed()->findOrFail($request->audit_id);

        $audit->forceDeleteModel();

        $response = new AuditResource($audit);

        event(new ForceDeleteEvent($audit, $request, $response));

        return $response;

    }
    
}
