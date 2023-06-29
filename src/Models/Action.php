<?php

namespace Innoboxrr\LaravelAudit\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\LaravelAudit\Models\Traits\Relations\ActionRelations;
use Innoboxrr\LaravelAudit\Models\Traits\Storage\ActionStorage;
use Innoboxrr\LaravelAudit\Models\Traits\Assignments\ActionAssignment;
use Innoboxrr\LaravelAudit\Models\Traits\Operations\ActionOperations;
use Innoboxrr\LaravelAudit\Models\Traits\Mutators\ActionMutators;

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
        return \Innoboxrr\LaravelAudit\Database\Factories\ActionFactory::new();
    }
    

}
