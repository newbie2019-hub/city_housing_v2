<?php

namespace App\Http\Livewire\Applicants;

use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Applicant;
use App\Models\ApplicantsInfo;
use Livewire\Component;
use Livewire\WithPagination;

class Applicants extends Component
{
    use WithPagination, WithSorting;

    public $query;

    public $filterable = [
        'civil_status' => '',
        'start_income_per_month'  => null,
        'end_income_per_month'  => null,
        'start'  => null,
        'end'  => null,
    ];

    public function filterApplicant()
    {
        $this->emitSelf('$refresh');
        $this->resetPage();
    }
 
    public function render()
    {

        $applicants = Applicant::query()
        ->with('info', 'spouse')
        ->when($this->filterable['civil_status'], fn($query, $status) => 
            $query->whereRelation('info', 'civil_status', $status)
        )
        ->when($this->filterable['start_income_per_month'], fn($query, $min) => 
            $query->whereRelation('info', 'income_per_month', '>=', $min)
        )
        ->when($this->filterable['end_income_per_month'],   fn($query, $max) => 
            $query->whereRelation('info', 'income_per_month', '<=', $max)
        )
        ->paginate(10);
        return view('livewire.applicants.applicants', compact('applicants'));
    }

    public function getApplicants()
    {
        
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
