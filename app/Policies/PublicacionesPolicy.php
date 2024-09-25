<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Publicaciones;
use App\Models\User;

class PublicacionesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Publicaciones');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Publicaciones $publicaciones): bool
    {
        return $user->checkPermissionTo('view Publicaciones');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Publicaciones');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Publicaciones $publicaciones): bool
    {
        return $user->checkPermissionTo('update Publicaciones');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Publicaciones $publicaciones): bool
    {
        return $user->checkPermissionTo('delete Publicaciones');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Publicaciones');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Publicaciones $publicaciones): bool
    {
        return $user->checkPermissionTo('restore Publicaciones');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Publicaciones');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Publicaciones $publicaciones): bool
    {
        return $user->checkPermissionTo('replicate Publicaciones');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Publicaciones');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Publicaciones $publicaciones): bool
    {
        return $user->checkPermissionTo('force-delete Publicaciones');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Publicaciones');
    }
}
