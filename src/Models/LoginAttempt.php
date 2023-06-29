<?php

namespace Innoboxrr\LaravelAudit\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\LaravelAudit\Models\Traits\Relations\LoginAttemptRelations;
use Innoboxrr\LaravelAudit\Models\Traits\Storage\LoginAttemptStorage;
use Innoboxrr\LaravelAudit\Models\Traits\Assignments\LoginAttemptAssignment;
use Innoboxrr\LaravelAudit\Models\Traits\Operations\LoginAttemptOperations;
use Innoboxrr\LaravelAudit\Models\Traits\Mutators\LoginAttemptMutators;

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
        return \Innoboxrr\LaravelAudit\Database\Factories\LoginAttemptFactory::new();
    }
    

}
