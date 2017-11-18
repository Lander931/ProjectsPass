<?php

namespace App\Policies;

use App\Project;
use App\User;
use App\Access;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the access.
     *
     * @param  \App\User  $user
     * @param  \App\Access  $access
     * @return mixed
     */
    public function view(User $user, Access $access)
    {
        //
    }

    /**
     * Determine whether the user can view page create accesses.
     *
     * @param  \App\User  $user
     * @param  \App\Project $project
     * @return mixed
     */
    public function pageCreate(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can create accesses.
     *
     * @param  \App\User  $user
     * @param  \App\Project $project
     * @return mixed
     */
    public function create(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can view page update the access.
     *
     * @param  \App\User  $user
     * @param  \App\Access  $access
     * @param  \App\Project $project
     * @return mixed
     */
    public function pageEdit(User $user, Access $access, Project $project)
    {
        return $user->id === $project->user_id && $access->project_id === $project->id;
    }
    /**
     * Determine whether the user can update the access.
     *
     * @param  \App\User  $user
     * @param  \App\Access  $access
     * @param  \App\Project $project
     * @return mixed
     */
    public function update(User $user, Access $access, Project $project)
    {
        return $user->id === $project->user_id && $access->project_id === $project->id;
    }

    /**
     * Determine whether the user can delete the access.
     *
     * @param  \App\User  $user
     * @param  \App\Access  $access
     * @param  \App\Project $project
     * @return mixed
     */
    public function delete(User $user, Access $access, Project $project)
    {
        return $user->id === $project->user_id && $access->project_id === $project->id;
    }
}
