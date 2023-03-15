<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
    
}
