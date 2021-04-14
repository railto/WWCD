<?php

namespace App\Http\Livewire\Search;

use App\Models\Search;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowSearch extends Component
{
    public $search;

    public function mount(Search $search)
    {
        $this->search = $search;
    }

    public function render(): View
    {
        return view('livewire.search.show-search');
    }
}
