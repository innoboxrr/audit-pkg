<?php

namespace Innoboxrr\LaravelAudit\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\LaravelAudit\Models\Traits\Relations\AuditRelations;
use Innoboxrr\LaravelAudit\Models\Traits\Storage\AuditStorage;
use Innoboxrr\LaravelAudit\Models\Traits\Assignments\AuditAssignment;
use Innoboxrr\LaravelAudit\Models\Traits\Operations\AuditOperations;
use Innoboxrr\LaravelAudit\Models\Traits\Mutators\AuditMutators;

class Audit extends BaseModel
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        AuditRelations,
        AuditStorage,
        AuditAssignment,
        AuditOperations,
        AuditMutators;
        
    protected $fillable = [
        'before',
        'after',
        'route',
        'ip_address',
        'user_agent',
        'loggable_id',
        'loggable_type',
        'user_id',
        'action_id'
    ];

    protected $creatable = [
        'before',
        'after',
        'route',
        'ip_address',
        'user_agent',
        'loggable_id',
        'loggable_type',
        'user_id',
        'action_id'
    ];

    protected $updatable = [
        'before',
        'after',
        'route',
        'ip_address',
        'user_agent',
        'loggable_id',
        'loggable_type',
        'user_id',
        'action_id'
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    
    protected static function newFactory()
    {
        return \Innoboxrr\LaravelAudit\Database\Factories\AuditFactory::new();
    }
    

}
