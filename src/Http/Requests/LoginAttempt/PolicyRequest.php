<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PolicyRequest extends FormRequest
{

    protected $policies = [
        'index',
        'view',
        'viewAny',
        'create',
        'update',
        'delete',
        'restore',
        'forceDelete',
        'export',
    ];

    protected $modelPolicies = [
        'view',
        'update',
        'delete',
        'restore',
        'forceDelete',
    ];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'policy' => [
                'required',
                Rule::in($this->policies)
            ],
            'id' => [
                'numeric',
                'exists:Itecschool\AuditPkg\Models\LoginAttempt,id',
                Rule::requiredIf(in_array($this->policy, $this->modelPolicies)),
            ]
        ];
    }

    public function handle()
    {

         $loginAttempt = ($request->id) ? 
            LoginAttempt::findOrFail($request->id) : 
            app(LoginAttempt::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $loginAttempt),
        ]);

    }

}
