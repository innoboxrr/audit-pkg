<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'before' => 'nullable',
            'after' => 'nullable',
            'route' => 'nullable',
            'ip_address' => 'nullable',
            'user_agent' => 'nullable',
            'loggable_id' => 'nullable',
            'loggable_type' => 'nullable',
            'user_id' => 'nullable',
            'action_id' => 'nullable'
            'audit_id' => 'required|numeric'
        ];
    }

}
