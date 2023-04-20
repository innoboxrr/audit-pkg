<?php

namespace Itecschool\AuditPkg\Http\Requests\Audit;

use Itecschool\AuditPkg\Models\Audit;
use Itecschool\AuditPkg\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Itecschool\AuditPkg\Http\Events\Audit\Events\CreateEvent;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Audit::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function handle()
    {

        $audit = (new Audit)->createModel($request);

        $response = new AuditResource($audit);

        event(new CreateEvent($audit, $request, $response));

        return $response;

    }
    
}
