<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Audit;

use Innoboxrr\LaravelAudit\Models\Audit;
use Innoboxrr\LaravelAudit\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Innoboxrr\LaravelAudit\Http\Events\Audit\Events\DeleteEvent;

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
