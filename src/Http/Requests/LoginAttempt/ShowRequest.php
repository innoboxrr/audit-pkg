<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Innoboxrr\LaravelAudit\Http\Resources\Models\LoginAttemptResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $loginAttempt = LoginAttempt::findOrFail($this->login_attempt_id);

        return $this->user()->can('view', $loginAttempt);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new LoginAttempt)->loadable_relations)
            ],
            'login_attempt_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $loginAttempt = LoginAttempt::where('id', $request->login_attempt_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new LoginAttemptResource($loginAttempt);

    }
    
}
