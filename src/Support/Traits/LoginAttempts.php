<?php

namespace Itecschool\AuditPkg\Support\Traits;

/**
 * Este trait lo debe implementar el modelo User
 */

trait LoginAttempts 
{

	public function loginAttempts()
    {
        return $this->hasMany('Itecschool\AuditPkg\Models\LoginAttempt', 'email', 'email');
    }

}