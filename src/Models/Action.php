<?php

namespace Itecschool\AuditPkg\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Itecschool\AuditPkg\Models\Traits\Relations\ActionRelations;
use Itecschool\AuditPkg\Models\Traits\Storage\ActionStorage;
use Itecschool\AuditPkg\Models\Traits\Assignments\ActionAssignment;
use Itecschool\AuditPkg\Models\Traits\Operations\ActionOperations;
use Itecschool\AuditPkg\Models\Traits\Mutators\ActionMutators;

class Action extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ActionRelations,
        ActionStorage,
        ActionAssignment,
        ActionOperations,
        ActionMutators;
        
    protected $fillable = [];

    protected $creatable = [];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \Itecschool\AuditPkg\Database\Factories\ActionFactory::new();
    }
    */

}