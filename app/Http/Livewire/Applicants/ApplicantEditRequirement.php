<?php

namespace App\Http\Livewire\Applicants;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicantEditRequirement extends Component
{
    use WithFileUploads, AuthorizesRequests;
    public $requirementPhoto = [];

    public function render()
    {
        return view('livewire.applicants.applicant-edit-requirement');
    }
}
