<?php

namespace Itecschool\AuditPkg\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function __construct(array $attributes = [])
    {

        parent::__construct($attributes);

        $prefix = config('itecschoolauditpkg.db_prefix');

        $this->table = $prefix . $this->table;

    }

}
