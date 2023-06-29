<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Innoboxrr\LaravelAudit\Http\Resources\Models\LoginAttemptResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Events\RestoreEvent;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $loginAttempt = LoginAttempt::withTrashed()->findOrFail($this->login_attempt_id);
        
        return $this->user()->can('restore', $loginAttempt);

    }

    public function rules()
    {
        return [
            'login_attempt_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $loginAttempt = LoginAttempt::withTrashed()->findOrFail($request->login_attempt_id);

        $loginAttempt->restoreModel();

        $response = new LoginAttemptResource($loginAttempt);

        event(new RestoreEvent($loginAttempt, $request, $response));

        return $response;

    }
    
}
