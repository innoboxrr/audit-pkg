<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Illuminate\Foundation\Http\FormRequest;

class PoliciesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|numeric|exists:Itecschool\AuditPkg\Models\LoginAttempt,id'
        ];
    }
    
}
