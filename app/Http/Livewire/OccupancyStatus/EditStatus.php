<?php

namespace App\Http\Livewire\OccupancyStatus;

use App\Models\OccupancyStatus;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditStatus extends ModalComponent
{

    public $occupancyStatus;
    public $status;

    protected $rules = [
        'status' => ['bail', 'required'],

    ];

    public function updateHousingUnitStatus()
    {
        // $this->authorize('housingunit_status_create');
        $this->validate();

        $this->occupancyStatus->update(
            [
                'status' => $this->status,
            ]
        );

        activity()
            ->causedBy(auth()->user()->id)
            ->event('Housing Unit Status Updated')
            ->log('Created a housing unit status');

        $this->emit('occupancyStatusRefresh');
        $this->emit('showToastNotification', ['type' => 'success', 'message' => 'Housing Unit status updated successfully!', 'title' => 'Success']);


        $this->closeModal();
    }

    public function mount(OccupancyStatus $occupancyStatus)
    {
        $this->occupancyStatus = $occupancyStatus;
        $this->status = $occupancyStatus->status;
    }

    public function render()
    {
        return view('livewire.occupancy-status.edit-status');
    }
}
