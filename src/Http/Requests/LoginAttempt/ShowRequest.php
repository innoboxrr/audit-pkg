<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $loginAttempt = LoginAttempt::findOrFail($this->login_attempt_id);

        return $this->user()->can('view', $loginAttempt);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new LoginAttempt)->loadable_relations)
            ],
            'login_attempt_id' => 'required|numeric'
        ];
    }
    
}
