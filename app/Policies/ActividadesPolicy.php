<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Actividades;
use App\Models\User;

class ActividadesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Actividades');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Actividades $actividades): bool
    {
        return $user->checkPermissionTo('view Actividades');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Actividades');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Actividades $actividades): bool
    {
        return $user->checkPermissionTo('update Actividades');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Actividades $actividades): bool
    {
        return $user->checkPermissionTo('delete Actividades');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Actividades');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Actividades $actividades): bool
    {
        return $user->checkPermissionTo('restore Actividades');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Actividades');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Actividades $actividades): bool
    {
        return $user->checkPermissionTo('replicate Actividades');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Actividades');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Actividades $actividades): bool
    {
        return $user->checkPermissionTo('force-delete Actividades');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Actividades');
    }
}
