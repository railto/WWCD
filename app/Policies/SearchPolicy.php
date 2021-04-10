<?php

namespace App\Policies;

use App\Models\Search;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SearchPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Search $search): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Search $search): bool
    {
        return false;
    }

    public function end(User $user, Search $search): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Search $search): bool
    {
        return false;
    }

    public function restore(User $user, Search $search): bool
    {
        return false;
    }

    public function forceDelete(User $user, Search $search): bool
    {
        return false;
    }
}
