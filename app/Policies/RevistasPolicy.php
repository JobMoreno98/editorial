<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Revistas;
use App\Models\User;

class RevistasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Revistas');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Revistas $revistas): bool
    {
        return $user->checkPermissionTo('view Revistas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Revistas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Revistas $revistas): bool
    {
        return $user->checkPermissionTo('update Revistas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Revistas $revistas): bool
    {
        return $user->checkPermissionTo('delete Revistas');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Revistas');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Revistas $revistas): bool
    {
        return $user->checkPermissionTo('restore Revistas');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Revistas');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Revistas $revistas): bool
    {
        return $user->checkPermissionTo('replicate Revistas');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Revistas');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Revistas $revistas): bool
    {
        return $user->checkPermissionTo('force-delete Revistas');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Revistas');
    }
}
