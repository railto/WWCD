<?php

namespace App\Http\Livewire\Search;

use App\Models\SearchTeam;
use Livewire\Component;

class SearchTeams extends Component
{
    public $search;
    public $searchTeams;
    public $showCreateSearchTeamModal = false;
    public $name;
    public $team_leader;
    public $medic;
    public $responder_1;
    public $responder_2;
    public $responder_3;

    public function storeSearchTeam()
    {
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

        $this->showCreateSearchTeamModal = false;
        $this->searchTeams = $this->search->searchTeams()->get();
        $this->resetCreateSearchTeamForm();
    }

    public function resetCreateSearchTeamForm()
    {
        $this->name = null;
        $this->team_leader = null;
        $this->medic = null;
        $this->responder_1 = null;
        $this->responder_2 = null;
        $this->responder_3 = null;
    }

    public function mount()
    {
        $this->searchTeams = $this->search->searchTeams;
    }

    public function render()
    {
        return view('livewire.search.search-teams');
    }
}
