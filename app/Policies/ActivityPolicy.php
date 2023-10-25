<?php

namespace App\Policies;

use App\Activity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any activities.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the activity.
     *
     * @param User $user
     * @param Activity $activity
     * @return bool
     */
    public function view(User $user, Activity $activity): bool
    {
        return $user->id == $activity->user_id;
    }

    /**
     * Determine whether the user can create activities.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the activity.
     *
     * @param User $user
     * @param Activity $activity
     * @return mixed
     */
    public function update(User $user, Activity $activity)
    {
        //
    }

    /**
     * Determine whether the user can delete the activity.
     *
     * @param User $user
     * @param Activity $activity
     * @return mixed
     */
    public function delete(User $user, Activity $activity)
    {
        //
    }

    /**
     * Determine whether the user can restore the activity.
     *
     * @param User $user
     * @param Activity $activity
     * @return mixed
     */
    public function restore(User $user, Activity $activity)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the activity.
     *
     * @param User $user
     * @param Activity $activity
     * @return mixed
     */
    public function forceDelete(User $user, Activity $activity)
    {
        //
    }
}
