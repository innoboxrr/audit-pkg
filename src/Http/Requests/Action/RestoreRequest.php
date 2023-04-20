<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Itecschool\AuditPkg\Http\Events\Action\Events\RestoreEvent;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $action = Action::withTrashed()->findOrFail($this->action_id);
        
        return $this->user()->can('restore', $action);

    }

    public function rules()
    {
        return [
            'action_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $action = Action::withTrashed()->findOrFail($request->action_id);

        $action->restoreModel();

        $response = new ActionResource($action);

        event(new RestoreEvent($action, $request, $response));

        return $response;

    }
    
}
