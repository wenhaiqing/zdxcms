<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionPolicy extends Policy
{

    public function view(User $user, Permission $permission)
    {
        return $user->can("manage_permissions");
    }

    public function create(User $user, Permission $permission)
    {
        return $user->can("create_permissions");
    }

    public function update(User $user, Permission $permission)
    {
        return $user->can("edit_permissions");
    }

    public function delete(User $user, Permission $permission)
    {
        return $user->can("destory_permissions");
    }
}
