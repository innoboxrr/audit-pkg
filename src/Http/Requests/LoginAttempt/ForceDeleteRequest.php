<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $loginAttempt = LoginAttempt::withTrashed()->findOrFail($this->login_attempt_id);
        
        return $this->user()->can('forceDelete', $loginAttempt);

    }

    public function rules()
    {
        return [
            'login_attempt_id' => 'required|numeric'
        ];
    }
    
}
