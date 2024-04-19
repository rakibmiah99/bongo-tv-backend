<?php

namespace App\Policies;

use App\Models\MoviesCelebrity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MoviesCelebrityPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MoviesCelebrity $moviesCelebrity): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MoviesCelebrity $moviesCelebrity): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MoviesCelebrity $moviesCelebrity): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MoviesCelebrity $moviesCelebrity): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MoviesCelebrity $moviesCelebrity): bool
    {
        //
    }
}
