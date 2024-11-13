<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Visitor;
use App\Models\User;

class VisitorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Visitor');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Visitor $visitor): bool
    {
        return $user->checkPermissionTo('view Visitor');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Visitor');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Visitor $visitor): bool
    {
        return $user->checkPermissionTo('update Visitor');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Visitor $visitor): bool
    {
        return $user->checkPermissionTo('delete Visitor');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Visitor');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Visitor $visitor): bool
    {
        return $user->checkPermissionTo('restore Visitor');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Visitor');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Visitor $visitor): bool
    {
        return $user->checkPermissionTo('replicate Visitor');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Visitor');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Visitor $visitor): bool
    {
        return $user->checkPermissionTo('force-delete Visitor');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Visitor');
    }
}