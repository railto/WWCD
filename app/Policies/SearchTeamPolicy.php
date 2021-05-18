<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SearchTeamPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'write']);
    }

    public function viewAny(User $user): bool
    {
        return true;
    }
}
