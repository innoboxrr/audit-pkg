<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', LoginAttempt::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
