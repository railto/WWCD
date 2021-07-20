<?php

namespace App\Http\Livewire\Search;

use App\Models\Search;
use Livewire\Component;
use App\Models\SearchTeam;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SearchTeams extends Component
{
    use AuthorizesRequests;

    public Search $search;
    public Collection $searchTeams;
    public bool $showCreateSearchTeamModal = false;
    public string|null $name = null;
    public string|null $team_leader = null;
    public string|null $medic = null;
    public string|null $responder_1 = null;
    public string|null $responder_2 = null;
    public string|null $responder_3 = null;

    public function storeSearchTeam(): void
    {
        $this->authorize('create', SearchTeam::class);

        $this->validate([
            'name' => 'required',
            'team_leader' => 'required',
            'medic' => 'required',
        ]);

        SearchTeam::create([
            'search_id' => $this->search->id,
            'created_by' => auth()->user()->id,
            'name' => $this->name,
            'team_leader' => $this->team_leader,
            'medic' => $this->medic,
            'responder_1' => $this->responder_1,
            'responder_2' => $this->responder_2,
            'responder_3' => $this->responder_3,
        ]);

        $this->searchTeams = $this->search->searchTeams()->get();
        $this->resetCreateSearchTeamForm();
        $this->showCreateSearchTeamModal = false;
    }

    public function resetCreateSearchTeamForm(): void
    {
        $this->name = null;
        $this->team_leader = null;
        $this->medic = null;
        $this->responder_1 = null;
        $this->responder_2 = null;
        $this->responder_3 = null;

        $this->errorBag = null;
    }

    public function mount(): void
    {
        $this->searchTeams = $this->search->searchTeams;
    }

    public function render(): View
    {
        $this->authorize('viewAny', SearchTeam::class);

        return view('livewire.search.search-teams');
    }
}
