<?php

namespace App\Http\Livewire\Applicants;

use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Applicant;
use Livewire\Component;
use Livewire\WithPagination;

class Applicants extends Component
{
    use WithPagination, WithSorting;
    public $search = '';
    public $civil_status;
    public $start_income_per_month;
    public $end_income_per_month;
    public $start;
    public $end;
    public $office;
    public $brgy_origin;
    public $housing_project_id;

    protected $listeners = [
        'filter' => 'filter',
        'reset' => 'filter',
        'ApplicantTableRefreshEvent' => 'render',
    ];



    public function filter($value)
    {
        $this->civil_status = $value['civil_status'];
        $this->start_income_per_month = $value['start_income_per_month'];
        $this->end_income_per_month = $value['end_income_per_month'];
        $this->office = $value['office'];
        $this->end = $value['end'];
        $this->start = $value['start'];
        $this->brgy_origin = $value['brgy_origin'];
        $this->housing_project_id = $value['housing_project_id'];
        $this->emitSelf('render');
    }

    public function render()
    {
        $applicants = Applicant::search($this->search)
            ->with('info', 'spouse', 'housing_unit')
            ->where(
                fn ($query) =>
                $query
                    ->when(
                        $this->civil_status,
                        fn ($query) =>
                        $query->whereRelation('info', 'civil_status', $this->civil_status)
                    )

                    ->when(
                        $this->start_income_per_month,
                        fn ($query) =>
                        $query->whereRelation('info', 'income_per_month', '>=', $this->start_income_per_month)
                    )
                    ->when(
                        $this->end_income_per_month,
                        fn ($query) =>
                        $query->whereRelation('info', 'income_per_month', '<=', $this->end_income_per_month)
                    )

                    ->when($this->office, function ($query) {
                        $query->whereRelation('info', 'office', $this->office);
                    })
                    ->when(
                        $this->start,
                        fn ($query) =>
                        $query->whereRelation('info', 'birth_date', '>=', $this->start)
                    )
                    ->when(
                        $this->end,
                        fn ($query) =>
                        $query->whereRelation('info', 'birth_date', '<=', $this->end)
                    )
                    ->when(
                        $this->brgy_origin,
                        fn ($query) =>
                        $query->whereRelation('info', 'brgy_origin',  $this->brgy_origin)
                    )

                    ->when(
                        $this->housing_project_id,
                        fn ($query) =>
                        $query->whereRelation('housing_unit', 'housing_project_id',  $this->housing_project_id)
                    )


            )

            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5, ['*'], 'applicant');


        $archivedApplicants = Applicant::onlyTrashed()
            ->with('info', 'spouse')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5, ['*'], 'archivedapplicant');

        return view('livewire.applicants.applicants', compact('applicants', 'archivedApplicants'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilter()
    {
        $this->start = null;
        $this->end = null;
        $this->civil_status = null;
        $this->income_per_month = null;
        $this->office = null;
    }
}
