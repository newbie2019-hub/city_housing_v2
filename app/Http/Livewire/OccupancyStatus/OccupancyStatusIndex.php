<?php

namespace App\Http\Livewire\OccupancyStatus;

use App\Models\OccupancyStatus;
use Livewire\Component;
use Livewire\WithPagination;

class OccupancyStatusIndex extends Component
{
    use WithPagination;

    public $search;
    protected $listeners = ['occupancyStatusRefresh' => 'render'];

    public function render()
    {
        $statuses = OccupancyStatus::whereLike('status', $this->search)
            ->paginate(10);

        return view('livewire.occupancy-status.occupancy-status-index', compact('statuses'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
