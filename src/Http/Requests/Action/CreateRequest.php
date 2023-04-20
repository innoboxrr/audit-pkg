<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Itecschool\AuditPkg\Http\Events\Action\Events\CreateEvent;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Action::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function handle()
    {

        $action = (new Action)->createModel($request);

        $response = new ActionResource($action);

        event(new CreateEvent($action, $request, $response));

        return $response;

    }
    
}
