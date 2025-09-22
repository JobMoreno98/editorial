<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Preguntas;
use App\Models\User;

class PreguntasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Preguntas');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Preguntas $preguntas): bool
    {
        return $user->checkPermissionTo('view Preguntas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Preguntas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Preguntas $preguntas): bool
    {
        return $user->checkPermissionTo('update Preguntas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Preguntas $preguntas): bool
    {
        return $user->checkPermissionTo('delete Preguntas');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Preguntas');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Preguntas $preguntas): bool
    {
        return $user->checkPermissionTo('restore Preguntas');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Preguntas');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Preguntas $preguntas): bool
    {
        return $user->checkPermissionTo('replicate Preguntas');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Preguntas');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Preguntas $preguntas): bool
    {
        return $user->checkPermissionTo('force-delete Preguntas');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Preguntas');
    }
}
