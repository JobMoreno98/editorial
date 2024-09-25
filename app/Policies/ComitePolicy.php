<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Comite;
use App\Models\User;

class ComitePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Comite');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comite $comite): bool
    {
        return $user->checkPermissionTo('view Comite');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Comite');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comite $comite): bool
    {
        return $user->checkPermissionTo('update Comite');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comite $comite): bool
    {
        return $user->checkPermissionTo('delete Comite');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Comite');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comite $comite): bool
    {
        return $user->checkPermissionTo('restore Comite');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Comite');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Comite $comite): bool
    {
        return $user->checkPermissionTo('replicate Comite');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Comite');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comite $comite): bool
    {
        return $user->checkPermissionTo('force-delete Comite');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Comite');
    }
}
