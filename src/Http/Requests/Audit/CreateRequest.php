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
            //
        ];
    }
    
}
