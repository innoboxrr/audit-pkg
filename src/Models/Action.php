<?php

namespace Itecschool\AuditPkg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Itecschool\AuditPkg\Models\Traits\Relations\ActionRelations;
use Itecschool\AuditPkg\Models\Traits\Storage\ActionStorage;
use Itecschool\AuditPkg\Models\Traits\Assignments\ActionAssignment;
use Itecschool\AuditPkg\Models\Traits\Operations\ActionOperations;
use Itecschool\AuditPkg\Models\Traits\Mutators\ActionMutators;

class Action extends BaseModel
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ActionRelations,
        ActionStorage,
        ActionAssignment,
        ActionOperations,
        ActionMutators;
        
    protected $fillable = [
        'type',
        'actionable_id',
        'actionable_type',
        'description'
    ];

    protected $creatable = [
        'type',
        'actionable_id',
        'actionable_type',
        'description'
    ];

    protected $updatable = [
        'description',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    
    protected static function newFactory()
    {
        return \Itecschool\AuditPkg\Database\Factories\ActionFactory::new();
    }
    

}
