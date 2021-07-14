<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class SearchDetails extends Component
{
    public $search;

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.search.search-details');
    }
}
