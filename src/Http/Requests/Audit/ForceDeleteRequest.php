<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Foundation\Http\FormRequest;

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
    
}
