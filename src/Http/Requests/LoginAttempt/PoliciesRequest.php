<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;

class PoliciesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|numeric|exists:Innoboxrr\LaravelAudit\Models\LoginAttempt,id'
        ];
    }

    public function handle()
    {

        $loginAttempt = ($request->id) ? 
            LoginAttempt::findOrFail($request->id) : 
            app(LoginAttempt::class);

        return response()->json([
            'index'          => user()->can('index', $loginAttempt),
            'view'           => user()->can('view', $loginAttempt),
            'viewAny'        => user()->can('viewAny', $loginAttempt),
            'create'         => user()->can('create', $loginAttempt),
            'update'         => user()->can('update', $loginAttempt),
            'delete'         => user()->can('delete', $loginAttempt),
            'restore'        => user()->can('restore', $loginAttempt),
            'forceDelete'    => user()->can('forceDelete', $loginAttempt),
            'export'         => user()->can('export', $loginAttempt),
        ]);

    }
    
}
