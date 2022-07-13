<?php

namespace App\Http\Livewire\Filter;

use App\Models\HousingProject;
use LivewireUI\Modal\ModalComponent;

class FilterModal extends ModalComponent
{
    public $filterable = [
        'civil_status' => '',
        'start_income_per_month'  => '',
        'end_income_per_month'  => '',
        'start'  => '',
        'end'  => '',
        'office'  => '',
        'brgy_origin' => '',
        'housing_project_id' => '',
    ];
    public function render()
    {

        $housing_projects = HousingProject::all();
        return view('livewire.filter.filter-modal', compact('housing_projects'));
    }


    public function filterApplicant()
    {
        $this->emit('filter', $this->filterable);
    }

    public function resetFilter()
    {
        $this->reset();
        $this->closeModal();
        $this->emit('reset', $this->filterable);
    }
}
