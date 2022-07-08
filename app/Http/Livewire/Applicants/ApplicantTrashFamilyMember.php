<?php

namespace App\Http\Livewire\Applicants;

use App\Models\FamilyComposition;
use Livewire\Component;

class ApplicantTrashFamilyMember extends Component
{

    public $familyMember;

    public function mount(FamilyComposition $id)
    {
        $this->familyMember = $id;
    }

    public function render()
    {
        return view('livewire.applicants.applicant-trash-family-member');
    }
}
