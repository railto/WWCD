<?php


namespace Tests\Feature\Search;


use App\Http\Livewire\Search\SearchTeams;
use App\Models\Search;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class AddSearchTeamTest extends TestCase
{
    /** @test */
    public function aWriteUserCanAddASearchTeam()
    {
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

        $this->assertDatabaseHas('search_teams', ['name' => 'Team 1']);
    }

    /** @test */
    public function aReadUserCanNotAddASearchTeam()
    {
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

        $this->assertDatabaseMissing('search_teams', ['name' => 'Team 1']);
    }
}
