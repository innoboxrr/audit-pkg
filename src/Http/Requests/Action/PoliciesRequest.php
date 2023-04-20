<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
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
            'id' => 'nullable|numeric|exists:Itecschool\AuditPkg\Models\Action,id'
        ];
    }

    public function handle()
    {

        $action = ($request->id) ? 
            Action::findOrFail($request->id) : 
            app(Action::class);

        return response()->json([
            'index'          => user()->can('index', $action),
            'view'           => user()->can('view', $action),
            'viewAny'        => user()->can('viewAny', $action),
            'create'         => user()->can('create', $action),
            'update'         => user()->can('update', $action),
            'delete'         => user()->can('delete', $action),
            'restore'        => user()->can('restore', $action),
            'forceDelete'    => user()->can('forceDelete', $action),
            'export'         => user()->can('export', $action),
        ]);

    }
    
}
