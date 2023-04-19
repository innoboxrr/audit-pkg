<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Audit::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
