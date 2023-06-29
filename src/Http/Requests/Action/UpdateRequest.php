<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Action;

use Innoboxrr\LaravelAudit\Models\Action;
use Innoboxrr\LaravelAudit\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\Action\Events\UpdateEvent;

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
            //
            'action_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $action = Action::findOrFail($request->action_id);

        $action = $action->updateModel($request);

        $response = new ActionResource($action);

        event(new UpdateEvent($action, $request, $response));

        return $response;

    }

}
