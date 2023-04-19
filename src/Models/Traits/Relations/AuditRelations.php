<?php

namespace Itecschool\AuditPkg\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait AuditRelations
{
	
    public function loggable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(config('itecschoolauditpkg.user_class', 'App\Models\User'));
    }

    public function action()
    {
    	return $this->belongsTo('Itecschool\AuditPkg\Models\Action');
    }

}