<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Innoboxrr\LaravelAudit\Http\Resources\Models\LoginAttemptResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Events\UpdateEvent;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $loginAttempt = LoginAttempt::findOrFail($this->login_attempt_id);

        return $this->user()->can('update', $loginAttempt);

    }

    public function rules()
    {
        return [
            //
            'login_attempt_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $loginAttempt = LoginAttempt::findOrFail($request->login_attempt_id);

        $loginAttempt = $loginAttempt->updateModel($request);

        $response = new LoginAttemptResource($loginAttempt);

        event(new UpdateEvent($loginAttempt, $request, $response));

        return $response;

    }

}
