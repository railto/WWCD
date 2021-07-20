<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Search;
use Livewire\Livewire;
use App\Http\Livewire\Search\SearchTeams;

test('a user with write permissions can add a search team', function () {
    $this->actingAs(User::factory()->write()->activated()->create());
    $search = Search::factory()->create();

    Livewire::test(SearchTeams::class, ['search' => $search])
        ->set('name', 'Team 1')
        ->set('team_leader', 'Team Leader')
        ->set('medic', 'Team Medic')
        ->set('responder_1', 'Responder 1')
        ->set('responder_2', 'Responder 2')
        ->set('responder_3', 'Responder 3')
        ->call('storeSearchTeam');

    expect($search->searchTeams()->first()->name)->toBe('Team 1');
});

test('a user with read only permissions can not add a search team', function () {
    $this->actingAs(User::factory()->activated()->create());
    $search = Search::factory()->create();

    Livewire::test(SearchTeams::class, ['search' => $search])
        ->set('name', 'Team 1')
        ->set('team_leader', 'Team Leader')
        ->set('medic', 'Team Medic')
        ->set('responder_1', 'Responder 1')
        ->set('responder_2', 'Responder 2')
        ->set('responder_3', 'Responder 3')
        ->call('storeSearchTeam');

    expect($search->searchTeams()->count())->toBe(0);
});
