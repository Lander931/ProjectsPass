<?php

namespace App\Policies;

use App\Project;
use App\User;
use App\Note;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the note.
     *
     * @param  \App\User $user
     * @param  \App\Note $note
     * @return mixed
     */
    public function view(User $user, Note $note)
    {
        //
    }

    /**
     * Determine whether the user can view page create notes.
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function pageCreate(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can create notes.
     *
     * @param  \App\Project $project
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can view page update the note.
     *
     * @param  \App\Project $project
     * @param  \App\User $user
     * @param  \App\Note $note
     * @return mixed
     */
    public function pageEdit(User $user, Note $note, Project $project)
    {
        return $user->id === $project->user_id && $note->project_id == $project->id;
    }

    /**
     * Determine whether the user can update the note.
     *
     * @param  \App\Project $project
     * @param  \App\User $user
     * @param  \App\Note $note
     * @return mixed
     */
    public function update(User $user, Note $note, Project $project)
    {
        return $user->id === $project->user_id && $note->project_id == $project->id;
    }

    /**
     * Determine whether the user can delete the note.
     *
     * @param  \App\Project $project
     * @param  \App\User $user
     * @param  \App\Note $note
     * @return mixed
     */
    public function delete(User $user, Note $note, Project $project)
    {
        return $user->id === $project->user_id && $note->project_id == $project->id;
    }
}
