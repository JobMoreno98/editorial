<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Descargas;
use App\Models\User;

class DescargasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Descargas');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Descargas $descargas): bool
    {
        return $user->checkPermissionTo('view Descargas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Descargas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Descargas $descargas): bool
    {
        return $user->checkPermissionTo('update Descargas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Descargas $descargas): bool
    {
        return $user->checkPermissionTo('delete Descargas');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Descargas');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Descargas $descargas): bool
    {
        return $user->checkPermissionTo('restore Descargas');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Descargas');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Descargas $descargas): bool
    {
        return $user->checkPermissionTo('replicate Descargas');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Descargas');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Descargas $descargas): bool
    {
        return $user->checkPermissionTo('force-delete Descargas');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Descargas');
    }
}
