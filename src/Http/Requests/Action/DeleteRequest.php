<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $action = Action::findOrFail($this->action_id);

        return $this->user()->can('delete', $action);

    }

    public function rules()
    {
        return [
            'action_id' => 'required|numeric'
        ];
    }
    
}
