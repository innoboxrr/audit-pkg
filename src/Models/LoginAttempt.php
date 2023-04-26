<?php

namespace Itecschool\AuditPkg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Itecschool\AuditPkg\Models\Traits\Relations\LoginAttemptRelations;
use Itecschool\AuditPkg\Models\Traits\Storage\LoginAttemptStorage;
use Itecschool\AuditPkg\Models\Traits\Assignments\LoginAttemptAssignment;
use Itecschool\AuditPkg\Models\Traits\Operations\LoginAttemptOperations;
use Itecschool\AuditPkg\Models\Traits\Mutators\LoginAttemptMutators;

class LoginAttempt extends BaseModel
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        LoginAttemptRelations,
        LoginAttemptStorage,
        LoginAttemptAssignment,
        LoginAttemptOperations,
        LoginAttemptMutators;
        
    protected $fillable = [
        'email',
        'status',
        'user_agent',
        'ip_address'
    ];

    protected $creatable = [
        'email',
        'status',
        'user_agent',
        'ip_address'
    ];

    protected $updatable = [
        'email',
        'status',
        'user_agent',
        'ip_address'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $allowed_status = [
        'success',
        'failure'
    ];

    public $loadable_relations = [];

    
    protected static function newFactory()
    {
        return \Itecschool\AuditPkg\Database\Factories\LoginAttemptFactory::new();
    }
    

}
