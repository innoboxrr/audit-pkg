<?php

namespace Itecschool\AuditPkg\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ActionRelations
{
	
    public function audits()
    {
    	return $this->hasMany('Itecschool\AuditPkg\Models\Audit');
    }

}