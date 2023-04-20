<?php

namespace Itecschool\AuditPkg\Support\Traits;

use Illuminate\Support\Facades\Validator;
use Itecschool\AuditPkg\Models\Audit;
use Itecschool\AuditPkg\Models\Action;

/**
 * Este trait lo debe implementar todo modelo que sea auditable
 **/

trait Auditable 
{

	public function audits()
	{
		return $this->morphMany('Itecschool\AuditPkg\Models\Audit', 'loggable');
	}

	public function log(string $type) : Audit
	{

		if (!app()->runningInConsole() && auth()->check()) {
		
			return Audit::create([
		    	'before' => json_encode($this->getOriginal()),
		    	'after' => ($this->isDirty()) ? json_encode($this->getAttributes()) : null,
		        'route' => request()->url(),
		        'ip_address' => request()->ip(),
		        'user_agent' => request()->header('User-Agent'),
		        'loggable_id' => $this->id,
		        'loggable_type' => get_class($this),
		        'user_id' => auth()->id(),
		        'action_id' => Action::getId($type, $this),
		    ]);

		}
	    
	}

}