<?php

namespace Itecschool\AuditPkg\Policies;

use App\Models\User;
use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuditPolicy
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

    public function view(User $user, Audit $audit)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Audit $audit)
    {
        return false;
    }

    public function delete(User $user, Audit $audit)
    {
        return false;
    }

    public function restore(User $user, Audit $audit)
    {
        return false;
    }

    public function forceDelete(User $user, Audit $audit)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
