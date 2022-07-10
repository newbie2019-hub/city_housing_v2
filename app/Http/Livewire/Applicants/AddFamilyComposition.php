<?php

namespace App\Http\Livewire\Applicants;

use App\Models\FamilyComposition;
use Livewire\Component;

class AddFamilyComposition extends Component
{

    public $familyCompositions = [];



    public function mount($familyCompositions)
    {

        $applicantFamilyComposition = FamilyComposition::where('applicant_id', $familyCompositions)->get()->toArray();
        $this->familyCompositions = $applicantFamilyComposition;
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addItem()
    {
        $this->familyCompositions[] = [
            'id' => '',
            'applicant_id' => '',
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'gender' => '',
            'relation' => '',
            'civil_status' => '',
            'age' => '',
            'source_of_income' => '',
        ];
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeItem($value)
    {
        unset($this->familyCompositions[$value]);
    }

    public function render()
    {
        return view('livewire.applicants.add-family-composition');
    }
}
