<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Itecschool\AuditPkg\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Itecschool\AuditPkg\Http\Events\Audit\Events\UpdateEvent;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $audit = Audit::findOrFail($this->audit_id);

        return $this->user()->can('update', $audit);

    }

    public function rules()
    {
        return [
            //
            'audit_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $audit = Audit::findOrFail($request->audit_id);

        $audit = $audit->updateModel($request);

        $response = new AuditResource($audit);

        event(new UpdateEvent($audit, $request, $response));

        return $response;

    }

}
