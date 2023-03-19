<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Audit::class);

    }

    public function rules()
    {
        return [
            'before' => 'nullable',
            'after' => 'nullable',
            'route' => 'nullable',
            'ip_address' => 'required',
            'user_agent' => 'required',
            'loggable_id' => 'required',
            'loggable_type' => 'required',
            'user_id' => 'required',
            'action_id' => 'required'
        ];
    }
    
}
