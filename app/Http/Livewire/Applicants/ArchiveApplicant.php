<?php

namespace App\Http\Livewire\Applicants;

use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Applicant;
use Livewire\Component;

class ArchiveApplicant extends Component
{
    use WithSorting;
    
    public function render()
    {
        $archivedApplicants = Applicant::onlyTrashed()
        ->with('info', 'spouse')
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate(5, ['*'], 'archivedapplicant');

        return view('livewire.applicants.archive-applicant', compact('archivedApplicants'));
    }

    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilter()
    {
        $this->reset();
    }
}
