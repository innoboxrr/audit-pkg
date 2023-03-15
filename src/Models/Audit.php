<?php

namespace Itecschool\AuditPkg\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Itecschool\AuditPkg\Models\Traits\Relations\AuditRelations;
use Itecschool\AuditPkg\Models\Traits\Storage\AuditStorage;
use Itecschool\AuditPkg\Models\Traits\Assignments\AuditAssignment;
use Itecschool\AuditPkg\Models\Traits\Operations\AuditOperations;
use Itecschool\AuditPkg\Models\Traits\Mutators\AuditMutators;

class Audit extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        AuditRelations,
        AuditStorage,
        AuditAssignment,
        AuditOperations,
        AuditMutators;
        
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
        return \Itecschool\AuditPkg\Database\Factories\AuditFactory::new();
    }
    */

}
