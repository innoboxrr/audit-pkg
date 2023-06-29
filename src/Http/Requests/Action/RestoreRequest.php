<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Action;

use Innoboxrr\LaravelAudit\Models\Action;
use Innoboxrr\LaravelAudit\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\Action\Events\RestoreEvent;

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
