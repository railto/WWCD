<?php

namespace App\Http\Livewire\Search\Teams;

use Livewire\Component;

class ListSearchTeams extends Component
{
    public $searchTeams;
    public $search;

    public function mount()
    {
        $this->searchTeams = $this->search->searchTeams;
    }

    public function render()
    {
        return view('livewire.search.teams.list-search-teams');
    }
}
