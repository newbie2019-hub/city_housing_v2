<?php

namespace App\Actions;

use App\Models\ApplicantRequirementImage;
use Illuminate\Support\Facades\Storage;

class SaveApplicantAttachmentRequirmentAction
{
    public function execute($requirementPhoto = [], $applicantId)
    {

        // dd($requirementPhoto);
        foreach ($requirementPhoto as $index => $photo) {
            $requirement = $applicantId . '-' . $index . '-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/images/requirement', $requirement);
            ApplicantRequirementImage::create([
                'applicant_id' => $applicantId,
                'image' => $requirement,

            ]);
        }
    }
}
