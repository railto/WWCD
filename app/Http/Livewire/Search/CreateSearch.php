<?php

namespace App\Http\Livewire\Search;

use App\Models\Search;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Redirector;

class CreateSearch extends Component
{
    use AuthorizesRequests;

    public $location;
    public $start;
    public string $type = 'default';
    public string $officer_in_charge = 'default';
    public string $search_manager = 'default';
    public string $safety_officer = 'default';
    public string $section_leader = 'default';
    public string $radio_operator = 'default';
    public string $scribe = 'default';
    public $users;

    /**
     * @throws AuthorizationException
     */
    public function storeSearch(): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', Search::class);

        $this->validate([
            'location' => ['required'],
            'start' => ['required', 'date'],
            'type' => ['required', Rule::notIn(['default'])],
            'officer_in_charge' => ['required', Rule::notIn(['default'])],
            'search_manager' => ['required', Rule::notIn(['default'])],
            'safety_officer' => ['required', Rule::notIn(['default'])],
            'section_leader' => ['required', Rule::notIn(['default'])],
            'radio_operator' => ['required', Rule::notIn(['default'])],
            'scribe' => ['required', Rule::notIn(['default'])],
        ]);

        $search = Search::make([
            'location' => $this->location,
            'start' => $this->start,
            'type' => $this->type,
            'officer_in_charge' => $this->officer_in_charge,
            'search_manager' => $this->search_manager,
            'safety_officer' => $this->safety_officer,
            'section_leader' => $this->section_leader,
            'radio_operator' => $this->radio_operator,
            'scribe' => $this->scribe,
        ]);

        $search->user()->associate(auth()->user());
        $search->save();

        return redirect()->route('searches.show', ['search' => $search->id]);
    }

    public function mount(): void
    {
        $this->users = User::all();
    }

    /**
     * @throws AuthorizationException
     */
    public function render(): View
    {
        $this->authorize('create', Search::class);

        return view('livewire.search.create-search');
    }
}
