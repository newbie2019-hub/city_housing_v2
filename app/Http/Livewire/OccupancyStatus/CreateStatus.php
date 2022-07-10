<?php

namespace App\Http\Livewire\OccupancyStatus;

use App\Models\OccupancyStatus;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateStatus extends ModalComponent
{
    public $status;

    protected $rules = [
        'status' => ['bail', 'required'],

    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveHousingUnitStatus()
    {
        // $this->authorize('housingunit_status_create');
        $this->validate();

        OccupancyStatus::create(
            [
                'status' => $this->status,
            ]
        );


        activity()
            ->causedBy(auth()->user()->id)
            ->event('Housing Unit Status Created')
            ->log('Created a housing unit status');

        $this->emit('occupancyStatusRefresh');
        $this->emit('showToastNotification', ['type' => 'success', 'message' => 'Housing Unit status created successfully!', 'title' => 'Success']);

        $this->forceClose()->closeModal();
    }

    public function render()
    {
        return view('livewire.occupancy-status.create-status');
    }
}
