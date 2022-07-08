<?php

namespace App\Http\Livewire\Applicants;

use Livewire\Component;

class AddFamilyComposition extends Component
{

    public $familyCompositions = [];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addItem()
    {
        $this->familyCompositions[] = [];
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
