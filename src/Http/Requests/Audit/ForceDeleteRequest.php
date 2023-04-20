<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Itecschool\AuditPkg\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Itecschool\AuditPkg\Http\Events\Audit\Events\ForceDeleteEvent;

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
