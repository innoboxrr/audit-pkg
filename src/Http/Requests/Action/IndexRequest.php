<?php

namespace Itecschool\AuditPkg\Http\Requests\Action;

use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Resources\Models\ActionResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\SearchSurge\Search\Builder;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Action::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function handle()
    {

        $builder = new Builder();

        $query = $builder->get(Action::class, $request);

        return ActionResource::collection($query);

    }
}
