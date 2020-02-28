<?php

namespace App\Policies;

use App\User;
use App\Idea;
use Illuminate\Auth\Access\HandlesAuthorization;

class IdeaPolicy
{
    use HandlesAuthorization;


    public function before(User $user, $ability){
        if($user->isModerator()) return true;
    }

    /**
     * Determine whether the user can view the idea.
     *
     * @param \App\User $user
     * @param Idea $idea
     * @return mixed
     */
    public function view(User $user, Idea $idea)
    {
        if($idea->isPublished()){
            return true;
        }else if($idea->user_id === $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create ideas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the idea.
     *
     * @param  \App\User  $user
     * @param  \App\Idea  $idea
     * @return mixed
     */
    public function update(User $user, Idea $idea)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the idea.
     *
     * @param  \App\User  $user
     * @param  \App\Idea  $idea
     * @return mixed
     */
    public function delete(User $user, Idea $idea)
    {
        return false;
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
