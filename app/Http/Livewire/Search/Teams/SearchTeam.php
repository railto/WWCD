<?php

namespace App\Http\Livewire\Search\Teams;

use Livewire\Component;

class SearchTeam extends Component
{
    public $searchTeam;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.search.teams.search-team');
    }
}
