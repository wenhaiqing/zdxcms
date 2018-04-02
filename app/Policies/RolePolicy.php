<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RolePolicy extends Policy
{

    public function view(User $user, Role $role)
    {
        return $user->can("manage_roles");
    }

    public function create(User $user, Role $role)
    {
        return $user->can("create_roles");
    }

    public function update(User $user, Role $role)
    {
        return $user->can("edit_roles");
    }

    public function delete(User $user, Role $role)
    {
        return $user->can("destory_roles");
    }
}
