<?php

namespace App\Policies;

use App\Models\User;
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackup;

class BackupsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Backups');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FilamentSpatieLaravelBackup $backups): bool
    {
        return $user->checkPermissionTo('view Backups');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Backups');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FilamentSpatieLaravelBackup $backups): bool
    {
        return $user->checkPermissionTo('update Backups');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FilamentSpatieLaravelBackup $backups): bool
    {
        return $user->checkPermissionTo('delete Backups');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FilamentSpatieLaravelBackup $backups): bool
    {
        return $user->checkPermissionTo('restore Backups');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FilamentSpatieLaravelBackup $backups): bool
    {
        return $user->checkPermissionTo('forceDelete Backups');
    }
}
