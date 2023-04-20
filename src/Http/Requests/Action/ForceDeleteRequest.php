<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Itecschool\AuditPkg\Http\Events\Action\Events\ForceDeleteEvent;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $action = Action::withTrashed()->findOrFail($this->action_id);
        
        return $this->user()->can('forceDelete', $action);

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

        $action->forceDeleteModel();

        $response = new ActionResource($action);

        event(new ForceDeleteEvent($action, $request, $response));

        return $response;

    }
    
}
