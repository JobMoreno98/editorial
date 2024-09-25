<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Permisos;
use App\Models\User;

class PermisosPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Permisos');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permisos $permisos): bool
    {
        return $user->checkPermissionTo('view Permisos');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Permisos');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permisos $permisos): bool
    {
        return $user->checkPermissionTo('update Permisos');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permisos $permisos): bool
    {
        return $user->checkPermissionTo('delete Permisos');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Permisos');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permisos $permisos): bool
    {
        return $user->checkPermissionTo('restore Permisos');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Permisos');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Permisos $permisos): bool
    {
        return $user->checkPermissionTo('replicate Permisos');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Permisos');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permisos $permisos): bool
    {
        return $user->checkPermissionTo('force-delete Permisos');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Permisos');
    }
}
