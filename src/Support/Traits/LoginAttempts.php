<?php

namespace Itecschool\AuditPkg\Support\Traits;

/**
 * Este trait lo debe implementar el modelo User
 */

use Itecschool\AuditPkg\Models\LoginAttempt;

trait LoginAttempts 
{

	public function loginAttempts()
    {
        return $this->hasMany('Itecschool\AuditPkg\Models\LoginAttempt', 'email', 'email');
    }

    public function trackLoginAttempt($status = true)
    {

        LoginAttempt::create([
            'email' => $this->email,
            'status' => $status,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

    }

}