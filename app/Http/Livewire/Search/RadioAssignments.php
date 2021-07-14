<?php

namespace App\Http\Livewire\Search;

use App\Models\Search;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\SearchRadioAssignment;
use Illuminate\Database\Eloquent\Collection;

class RadioAssignments extends Component
{
    public Search $search;
    public Collection $radioAssignments;
    public bool $showCreateRadioAssignmentModal = false;
    public string|null $call_sign = null;
    public string|null $tetra_number = null;
    public string|null $name = null;

    public function storeRadioAssignment(): void
    {
        $this->validate([
            'name' => 'required',
            'call_sign' => 'required',
        ]);

        SearchRadioAssignment::create([
            'search_id' => $this->search->id,
            'created_by' => auth()->user()->id,
            'name' => $this->name,
            'call_sign' => $this->call_sign,
            'tetra_number' => $this->tetra_number,
        ]);

        $this->radioAssignments = $this->search->radioAssignments()->get();
        $this->resetCreateRadioAssignmentForm();
        $this->showCreateRadioAssignmentModal = false;
    }

    public function resetCreateRadioAssignmentForm(): void
    {
        $this->name = null;
        $this->call_sign = null;
        $this->tetra_number = null;

        $this->errorBag = null;
    }

    public function mount(): void
    {
        $this->radioAssignments = $this->search->radioAssignments;
    }

    public function render(): View
    {
        return view('livewire.search.radio-assignments');
    }
}
