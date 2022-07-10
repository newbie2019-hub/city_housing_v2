<?php

namespace App\Http\Livewire\HousingUnit;

use App\Http\Livewire\DataTable\WithBulkSelect;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\HousingUnit as ModelsHousingUnit;
use Livewire\Component;
use Livewire\WithPagination;

class HousingUnit extends Component
{

    use WithPagination, WithSorting, WithBulkSelect;

    protected $listeners = ['housingunitUpdated' => 'render'];

    public function render()
    {
        $housingunits = ModelsHousingUnit::query()
            ->with('housingproject')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10, ['*'], 'housingunit');

        $archivedHousingunits = ModelsHousingUnit::query()
            ->onlyTrashed()
            ->with('housingproject')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10, ['*'], 'archivedHousingunit');

        return view('livewire.housing-unit.housing-unit', compact('housingunits', 'archivedHousingunits'));
    }


    public function updatedSelectAll()
    {
        $housingunits = ModelsHousingUnit::query()
            ->with('housingproject')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
        $this->selectAllData($housingunits);
    }
}
