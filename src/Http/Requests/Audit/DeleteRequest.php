<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Foundation\Http\FormRequest;

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
    
}
