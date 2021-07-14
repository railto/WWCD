<?php

namespace App\Providers;

use App\Models\Search;
use App\Models\SearchTeam;
use App\Policies\SearchPolicy;
use App\Policies\SearchTeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Search::class => SearchPolicy::class,
        SearchTeam::class => SearchTeamPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
