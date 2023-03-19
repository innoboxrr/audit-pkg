<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $action = Action::findOrFail($this->action_id);

        return $this->user()->can('update', $action);

    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'template' => 'nullable|string|max:500'
            'action_id' => 'required|numeric'
        ];
    }

}
