<?php

namespace Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Illuminate\Foundation\Http\FormRequest;
use Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Events\ExportEvent;

class ExportRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        
        $this->merge([
            'paginate' => 0,
            'managed' => true,
            'except_view_any' => true,
        ]);

    }

    public function authorize()
    {
        return $this->user()->can('export', LoginAttempt::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function handle()
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }
    
}
