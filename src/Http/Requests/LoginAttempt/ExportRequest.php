<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        
        $this->merge([
            'paginate' => 0,
            'managed' => true,
            'except_view_any' => true,
        ]);

    }

    public function authorize()
    {
        return $this->user()->can('export', LoginAttempt::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
