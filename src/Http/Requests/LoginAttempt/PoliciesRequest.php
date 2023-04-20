<?php

namespace Itecschool\AuditPkg\Http\Requests\LoginAttempt;

use Itecschool\AuditPkg\Models\LoginAttempt;
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
            'id' => 'nullable|numeric|exists:Itecschool\AuditPkg\Models\LoginAttempt,id'
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
