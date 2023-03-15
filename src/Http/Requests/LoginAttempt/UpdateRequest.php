<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $loginAttempt = LoginAttempt::findOrFail($this->login_attempt_id);

        return $this->user()->can('update', $loginAttempt);

    }

    public function rules()
    {
        return [
            //
            'login_attempt_id' => 'required|numeric'
        ];
    }

}
