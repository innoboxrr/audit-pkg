<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Innoboxrr\LaravelAudit\Http\Resources\Models\LoginAttemptResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Events\CreateEvent;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', LoginAttempt::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function handle()
    {

        $loginAttempt = (new LoginAttempt)->createModel($request);

        $response = new LoginAttemptResource($loginAttempt);

        event(new CreateEvent($loginAttempt, $request, $response));

        return $response;

    }
    
}
