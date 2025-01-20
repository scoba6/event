<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hotesse;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotessePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_hotesse');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hotesse $hotesse): bool
    {
        return $user->can('view_hotesse');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_hotesse');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hotesse $hotesse): bool
    {
        return $user->can('update_hotesse');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hotesse $hotesse): bool
    {
        return $user->can('delete_hotesse');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_hotesse');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Hotesse $hotesse): bool
    {
        return $user->can('force_delete_hotesse');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_hotesse');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Hotesse $hotesse): bool
    {
        return $user->can('restore_hotesse');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_hotesse');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Hotesse $hotesse): bool
    {
        return $user->can('replicate_hotesse');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_hotesse');
    }
}
