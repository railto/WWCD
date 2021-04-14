<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class SearchDetails extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search.search-details');
    }
}
