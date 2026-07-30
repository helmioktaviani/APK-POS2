<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    /**
     * Determine whether the user can view dashboard data.
     */
    public function viewAny(User $user): bool
    {
        return $user->role->name === 'admin';
    }
}
