<?php

namespace App\Http\Livewire\Search;

use App\Models\Search;
use Livewire\Component;
use App\Models\SearchCommsLog;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommsLog extends Component
{
    use AuthorizesRequests;

    public Search $search;
    public Collection $commsLog;
    public bool $showCreateLogEntryModal = false;
    public string|null $time = null;
    public string|null $call_sign = null;
    public string|null $message = null;
    public string|null $action = null;

    public function openAddCommsLogModal()
    {
        $this->time = now()->format('H:i');
        $this->showCreateLogEntryModal = true;
    }

    public function storeCommsLog(): void
    {
        $this->authorize('create', SearchCommsLog::class);

        $this->validate([
            'time' => ['required', 'string'],
            'call_sign' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        $this->search->commsLogs()->create([
            'created_by' => auth()->user()->id,
            'time' => $this->time,
            'call_sign' => $this->call_sign,
            'message' => $this->message,
            'action' => $this->action,
        ]);

        $this->commsLog = $this->search->commsLogs()->get();
        $this->showCreateLogEntryModal = false;
        $this->resetCreateCommsLogEntryForm();
    }

    public function resetCreateCommsLogEntryForm()
    {
        $this->time = null;
        $this->call_sign = null;
        $this->message = null;
        $this->action = null;
        $this->errorBag = null;
    }

    public function mount(): void
    {
        $this->commsLog = $this->search->commsLogs;
    }

    public function render(): View
    {
        $this->authorize('viewAny', SearchCommsLog::class);

        return view('livewire.search.comms-log');
    }
}
