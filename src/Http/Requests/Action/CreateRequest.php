<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Action::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
