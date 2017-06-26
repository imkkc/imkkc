<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @param  Admin  $admin
     * @param  Role  $role
     * @return mixed
     */
    public function view(Admin $admin, Role $role)
    {
        return $admin->id === $role->user_id;
    }

    public function show(Admin $admin, Role $role)
    {
        return $admin->id === $role->user_id;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->id;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  Admin  $admin
     * @param  Role  $role
     * @return mixed
     */
    public function update(Admin $admin, Role $role)
    {
        return $admin->id === $role->user_id;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  Admin  $admin
     * @param  Role  $role
     * @return mixed
     */
    public function delete(Admin $admin, Role $role)
    {
        return $admin->id === $role->user_id;
    }
}
