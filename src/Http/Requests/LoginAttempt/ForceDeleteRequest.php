<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Innoboxrr\LaravelAudit\Http\Resources\Models\LoginAttemptResource;
use Illuminate\Foundation\Http\FormRequest;
use Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Events\ForceDeleteEvent;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $loginAttempt = LoginAttempt::withTrashed()->findOrFail($this->login_attempt_id);
        
        return $this->user()->can('forceDelete', $loginAttempt);

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

        $loginAttempt->forceDeleteModel();

        $response = new LoginAttemptResource($loginAttempt);

        event(new ForceDeleteEvent($loginAttempt, $request, $response));

        return $response;

    }
    
}
