<?php

namespace Itecschool\AuditPkg\Models;

use Illuminate\Database\Eloquent\Model;
use Itecschool\PermissionPkg\Support\Traits\HasPermissions;

class BaseModel extends Model
{

    use HasPermissions;

    public function __construct(array $attributes = [])
    {

        parent::__construct($attributes);

        $prefix = config('itecschoolauditpkg.db_prefix');

        $this->table = $prefix . $this->getTable();

    }

}
