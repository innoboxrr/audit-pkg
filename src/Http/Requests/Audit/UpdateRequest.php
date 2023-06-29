<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Audit;

use Innoboxrr\LaravelAudit\Models\Audit;
use Innoboxrr\LaravelAudit\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\Audit\Events\UpdateEvent;

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
