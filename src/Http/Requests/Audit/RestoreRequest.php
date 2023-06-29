<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Audit;

use Innoboxrr\LaravelAudit\Models\Audit;
use Innoboxrr\LaravelAudit\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\Audit\Events\RestoreEvent;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $audit = Audit::withTrashed()->findOrFail($this->audit_id);
        
        return $this->user()->can('restore', $audit);

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

        $audit->restoreModel();

        $response = new AuditResource($audit);

        event(new RestoreEvent($audit, $request, $response));

        return $response;

    }
    
}
