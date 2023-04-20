<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Itecschool\AuditPkg\Http\Events\Action\Events\DeleteEvent;

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

    public function handle()
    {

        $action = Action::findOrFail($request->action_id);

        $action->deleteModel();

        $response = new ActionResource($action);

        event(new DeleteEvent($action, $request, $response));

        return $response;

    }
    
}
