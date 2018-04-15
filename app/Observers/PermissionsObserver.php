<?php

namespace App\Observers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class PermissionsObserver
{

    public function created(Permission $permission)
    {
        $role = Role::findById(1);
        $permission->assignRole($role);
    }
}