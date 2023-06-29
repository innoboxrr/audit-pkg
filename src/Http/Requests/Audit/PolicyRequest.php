<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Audit;

use Innoboxrr\LaravelAudit\Models\Audit;
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
                'exists:Innoboxrr\LaravelAudit\Models\Audit,id',
                Rule::requiredIf(in_array($this->policy, $this->modelPolicies)),
            ]
        ];
    }

    public function handle()
    {

         $audit = ($request->id) ? 
            Audit::findOrFail($request->id) : 
            app(Audit::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $audit),
        ]);

    }

}
