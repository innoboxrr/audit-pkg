<?php

namespace Innoboxrr\LaravelAudit\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait LoginAttemptRelations
{
	
    public function user()
    {
    	return $this->belongsTo(
    		config('laravel-audit.user_class', 'App\Models\User'), 
    		'email', 
    		'email'
    	);
    }

}