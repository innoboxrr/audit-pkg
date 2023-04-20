<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $action = Action::findOrFail($this->action_id);

        return $this->user()->can('view', $action);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Action)->loadable_relations)
            ],
            'action_id' => 'required|numeric'
        ];
    }

    public function handle()
    {

        $action = Action::where('id', $request->action_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new ActionResource($action);

    }
    
}
