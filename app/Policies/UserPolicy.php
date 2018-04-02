<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends Policy
{
    use HandlesAuthorization;

    public function view(User $currentUser,User $user)
    {
        return $currentUser->can('manage_users');
    }

    public function create(User $currentUser,User $user)
    {
        return $currentUser->can('create_users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $currentUser,User $user)
    {
        return $currentUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $currentUser, User $user)
    {
        return $currentUser->can('destory_users');
    }
}
