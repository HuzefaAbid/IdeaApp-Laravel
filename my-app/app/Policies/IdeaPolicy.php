<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{

    public function modify(User $user, Idea $idea): bool
    {
        return $user->id === $idea->user_id;
    }
}
