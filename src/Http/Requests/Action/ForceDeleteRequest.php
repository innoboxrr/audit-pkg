<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Action;

use Innoboxrr\LaravelAudit\Models\Action;
use Innoboxrr\LaravelAudit\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Innoboxrr\LaravelAudit\Http\Events\Action\Events\ForceDeleteEvent;

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
