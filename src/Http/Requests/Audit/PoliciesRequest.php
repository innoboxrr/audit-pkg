<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
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
            'id' => 'nullable|numeric|exists:Itecschool\AuditPkg\Models\Audit,id'
        ];
    }

    public function handle()
    {

        $audit = ($request->id) ? 
            Audit::findOrFail($request->id) : 
            app(Audit::class);

        return response()->json([
            'index'          => user()->can('index', $audit),
            'view'           => user()->can('view', $audit),
            'viewAny'        => user()->can('viewAny', $audit),
            'create'         => user()->can('create', $audit),
            'update'         => user()->can('update', $audit),
            'delete'         => user()->can('delete', $audit),
            'restore'        => user()->can('restore', $audit),
            'forceDelete'    => user()->can('forceDelete', $audit),
            'export'         => user()->can('export', $audit),
        ]);

    }
    
}
