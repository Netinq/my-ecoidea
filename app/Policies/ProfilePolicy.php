<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability){
        if($user->isModerator()) return true;
    }

    /**
     * Determine whether the user can view the idea.
     *
     * @param \App\User $user
     * @param \App\User $target
     * @return mixed
     */
    public function view(User $user, User $target)
    {
        return false;
    }

    /**
     * Determine whether the user can update the idea.
     *
     * @param \App\User $user
     * @param User $target
     * @return mixed
     */
    public function update(User $user, User $target)
    {
        return $user->id === $target->id;
    }

    /**
     * Determine whether the user can delete the idea.
     *
     * @param \App\User $user
     * @param User $target
     * @return mixed
     */
    public function delete(User $user, User $target)
    {
        return $user->id === $target->id;
    }

    /**
     * Determine whether the user can restore the idea.
     *
     * @param  \App\User  $user
     * @param  \App\Idea  $idea
     * @return mixed
     */
    public function restore(User $user, Idea $idea)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the idea.
     *
     * @param  \App\User  $user
     * @param  \App\Idea  $idea
     * @return mixed
     */
    public function forceDelete(User $user, Idea $idea)
    {
        return false;
    }
}
