<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Innoboxrr\LaravelAudit\Http\Resources\Models\LoginAttemptResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\SearchSurge\Search\Builder;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', LoginAttempt::class);
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

        $query = $builder->get(LoginAttempt::class, $request);

        return LoginAttemptResource::collection($query);

    }
}
