<?php

namespace App\Http\Livewire\HousingUnit;

use App\Models\HousingProject;
use App\Models\HousingUnit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class EditModal extends ModalComponent
{
    use AuthorizesRequests;


    public $housingunit;
    public $housing_project_id;
    public $phase_no;
    public $block_no;
    public $lot_no;
    public $remark;

    protected $rules = [
        'housing_project_id' => ['bail', 'required'],
        'phase_no' => ['bail', 'required'],
        'block_no' => ['bail', 'required'],
        'lot_no' => ['bail', 'required'],
        'remark' => ['bail', 'required'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($housingunit)
    {
        $this->housingunit = HousingUnit::withTrashed()->with('housingproject')->find($housingunit);

        $this->housing_project_id =   $this->housingunit->housingproject->id;
        $this->phase_no =   $this->housingunit->phase_no;
        $this->block_no =   $this->housingunit->block_no;
        $this->lot_no =   $this->housingunit->lot_no;
        $this->remark = $this->housingunit->remark;
    }

    public function updateHousingUnit()
    {
        $this->housingunit->update([
            'housing_project_id' =>   $this->housing_project_id,
            'phase_no' => $this->phase_no,
            'block_no' =>   $this->block_no,
            'lot_no' => $this->lot_no,
            'remark' => $this->remark,
        ]);

        $this->emit('showToastNotification', ['type' => 'success', 'message' => 'Housing Unit Updated successfully!', 'title' => 'Success']);

        activity()
            ->causedBy(auth()->user()->id)
            ->event('Housing Unit Updated')
            ->log('Housing Unit Updated');

        $this->emit('housingunitUpdated');

        $this->emit('closeModal');
    }

    public function render()
    {
        $housing_projects = HousingProject::get();
        return view('livewire.housing-unit.edit-modal', compact('housing_projects'));
    }
}
