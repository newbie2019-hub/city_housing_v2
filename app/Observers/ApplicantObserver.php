<?php

namespace App\Observers;

use App\Models\Applicant;

class ApplicantObserver
{
    /**
     * Handle the Applicant "created" event.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return void
     */
    public function created(Applicant $applicant)
    {
        //
    }

    /**
     * Handle the Applicant "updated" event.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return void
     */
    public function updated(Applicant $applicant)
    {
        //
    }

    /**
     * Handle the Applicant "deleted" event.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return void
     */
    public function deleted(Applicant $applicant)
    {
        //
    }

    /**
     * Handle the Applicant "restored" event.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return void
     */
    public function restored(Applicant $applicant)
    {
        //
    }

    /**
     * Handle the Applicant "force deleted" event.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return void
     */
    public function forceDeleted(Applicant $applicant)
    {
        //
    }
}
