<?php

namespace App\Http\Livewire\Applicants;

use App\Models\Applicant;
use App\Models\FamilyComposition;
use Illuminate\Database\Eloquent\Model;
use LivewireUI\Modal\ModalComponent;

class ConfirmationModal extends ModalComponent
{
    public $arhive;
    public  $applicant;
    public  $type;


    public function mount($applicant, $type, $archive = null)
    {
        $this->archive = $archive;
        $this->type = $type;
        if ($this->type === 'Applicant') {
            $applicantInfo = Applicant::withTrashed()->find($applicant);
            $this->applicant = $applicantInfo;
        }

        if ($this->type === 'FamilyComposition') {
            $applicantInfo = FamilyComposition::withTrashed()->find($applicant);
            $this->applicant = $applicantInfo;
        }
    }

    public function render()
    {
        return view('livewire.applicants.confirmation-modal');
    }

    public function restoreOrArchive()
    {
        if ($this->archive === "restore") {
            $this->applicant->restore();
        } elseif ($this->archive === "archive") {
            $this->applicant->delete();
        }

        if ($this->type === 'FamilyComposition') return redirect()->back();

        $this->emit('archiveApplicantTableRefreshEvent');
        $this->emit('ApplicantTableRefreshEvent');

        $this->closeModal();
    }
}
