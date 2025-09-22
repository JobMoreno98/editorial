<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Contenidos;
use App\Models\User;

class ContenidosPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Contenidos');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contenidos $contenidos): bool
    {
        return $user->checkPermissionTo('view Contenidos');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Contenidos');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contenidos $contenidos): bool
    {
        return $user->checkPermissionTo('update Contenidos');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contenidos $contenidos): bool
    {
        return $user->checkPermissionTo('delete Contenidos');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Contenidos');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Contenidos $contenidos): bool
    {
        return $user->checkPermissionTo('restore Contenidos');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Contenidos');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Contenidos $contenidos): bool
    {
        return $user->checkPermissionTo('replicate Contenidos');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Contenidos');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Contenidos $contenidos): bool
    {
        return $user->checkPermissionTo('force-delete Contenidos');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Contenidos');
    }
}
