<?php

namespace Innoboxrr\LaravelAudit\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function __construct(array $attributes = [])
    {

        parent::__construct($attributes);

        $prefix = config('laravel-audit.db_prefix');

        $this->table = $prefix . $this->getTable();

    }

}
