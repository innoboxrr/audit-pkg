<?php

namespace Itecschool\AuditPkg\Policies;

use App\Models\User;
use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoginAttemptPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {

        $exceptAbilities = [];

        if($user->isAdmin() && !in_array($ability, $exceptAbilities)){
        
            return true;
            
        }

    }

    public function index(User $user)
    {
        return false;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, LoginAttempt $loginAttempt)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, LoginAttempt $loginAttempt)
    {
        return false;
    }

    public function delete(User $user, LoginAttempt $loginAttempt)
    {
        return false;
    }

    public function restore(User $user, LoginAttempt $loginAttempt)
    {
        return false;
    }

    public function forceDelete(User $user, LoginAttempt $loginAttempt)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
