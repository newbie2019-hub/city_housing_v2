<?php

namespace App\Http\Livewire\HousingProject;

use App\Models\HousingProject;
use Livewire\Component;
use Livewire\WithPagination;

class HousingProjectTable extends Component
{
    use WithPagination;
    public $search;

    protected $listeners = ['housingprojectUpdated' => 'render'];
    public function render()
    {
        $housings = HousingProject::search($this->search)
            ->latest()
            ->paginate(5, ['*'], 'housingprojects');

        $archivedHousings = HousingProject::search($this->search)
            ->onlyTrashed()
            ->latest()
            ->paginate(5, ['*'], 'archivedhousingproject');
        return view('livewire.housing-project.housing-project-table', compact('housings', 'archivedHousings'));
    }
}
