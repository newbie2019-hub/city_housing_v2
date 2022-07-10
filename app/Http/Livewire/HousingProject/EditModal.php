<?php

namespace App\Http\Livewire\HousingProject;

use App\Models\HousingProject;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class EditModal extends ModalComponent
{
    use AuthorizesRequests;

    public $housingProject;
    public $project;
    public $location;
    public $description;

    protected $rules = [
        'project' => ['bail', 'required', 'max:120'],
        'location' => ['bail', 'required', 'max:120'],
        'description' => ['bail', 'required'],
    ];

    public function mount($housingproject)
    {
        // $this->authorize('housingprojct_update');
        $this->housingProject = HousingProject::withTrashed()->find($housingproject);
        $this->project = $this->housingProject->project;
        $this->location = $this->housingProject->location;
        $this->description = $this->housingProject->description;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function UpdateHousingProject()
    {

        $this->validate();
        $this->housingProject->update([
            'project' => $this->project,
            'location' => $this->location,
            'description' => $this->description,
        ]);

        $this->emit('showToastNotification', ['type' => 'success', 'message' => 'Housing Project Updated successfully!', 'title' => 'Success']);

        activity()
            ->causedBy(auth()->user()->id)
            ->event('Housing Project Updated')
            ->log('Updated Housing Project');
        $this->emit('housingprojectUpdated');

        $this->emit('closeModal');
    }


    public function render()
    {
        return view('livewire.housing-project.edit-modal');
    }
}
