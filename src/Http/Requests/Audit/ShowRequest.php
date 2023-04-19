<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $audit = Audit::findOrFail($this->audit_id);

        return $this->user()->can('view', $audit);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Audit)->loadable_relations)
            ],
            'audit_id' => 'required|numeric'
        ];
    }
    
}
