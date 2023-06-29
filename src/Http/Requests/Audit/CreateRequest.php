<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\Audit;

use Innoboxrr\LaravelAudit\Models\Audit;
use Innoboxrr\LaravelAudit\Http\Resources\Models\AuditResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\LaravelAudit\Http\Events\Audit\Events\CreateEvent;

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
