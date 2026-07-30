<?php

namespace App\Policies;

use App\Models\Produk;
use App\Models\User;

class ProdukPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
{
    return in_array($user->role->name, ['admin', 'kasir']);
}

public function view(User $user, Produk $produk): bool
{
    return in_array($user->role->name, ['admin', 'kasir']);
}

public function create(User $user): bool
{
    return $user->role->name === 'admin';
}

public function update(User $user, Produk $produk): bool
{
    return $user->role->name === 'admin';
}

public function delete(User $user, Produk $produk): bool
{
    return $user->role->name === 'admin';
}

}
