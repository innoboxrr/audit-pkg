<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Itecschool\AuditPkg\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Itecschool\AuditPkg\Http\Events\Audit\Events\DeleteEvent;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $audit = Audit::findOrFail($this->audit_id);

        return $this->user()->can('delete', $audit);

    }

    public function rules()
    {
        return [
            'audit_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $audit = Audit::findOrFail($request->audit_id);

        $audit->deleteModel();

        $response = new AuditResource($audit);

        event(new DeleteEvent($audit, $request, $response));

        return $response;

    }
    
}
