<?php

namespace App\Http\Controllers;

use App\Actions\SaveApplicantAttachmentRequirmentAction;
use App\Http\Requests\ApplicantsRequest;
use App\Models\Applicant;
use App\Models\ApplicantsInfo;
use App\Models\FamilyComposition;
use App\Models\HousingProject;
use App\Models\Requirement;
use App\Models\Spouse;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applicants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $housing_projects = HousingProject::get(['id', 'project']);
        return view('applicants.create', compact('housing_projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $applicant_info = ApplicantsInfo::create($request->validated());
        $spouse = Spouse::create($request->validated());

        $applicant =  Applicant::create([
            'applicant_info_id' => $applicant_info->id,
            'spouse_id' => $spouse->id,
            'housing_project_id' => $request->housing_project_id,
        ]);

        foreach ($request->familyCompositions as $family) {
            FamilyComposition::create([
                'applicant_id' => $applicant->id,
                'first_name' => $family['first_name'],
                'middle_name' => $family['middle_name'],
                'last_name' => $family['last_name'],
                'relation' => $family['relation'],
                'civil_status' => $family['civil_status'],
                'age' => $family['age'],
                'source_of_income' => $family['source_of_income'],

            ]);
        }

        return redirect()->route('applicants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        $applicant->load('info', 'spouse', 'housing_unit.housingproject', 'family_composition', 'requirements:description', 'requirementsImage');

        return view('applicants.show', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        $housing_projects = HousingProject::get(['id', 'project']);
        $requirements = Requirement::all();
        $applicant->load(
            'info',
            'spouse',
            'housing_unit.housingproject',
            'family_composition',
            'requirements:id,description',
            'requirementsImage'
        );

        // $applicantRequirement = $applicant->requirements->pluck('id')->toArray();

        return view('applicants.edit', compact('applicant', 'housing_projects', 'requirements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantsRequest $request, Applicant $applicant, SaveApplicantAttachmentRequirmentAction $saveAttachementRequirements)
    {
        if ($request->requirementPhoto)  $saveAttachementRequirements->execute($request->requirementPhoto, $applicant->id);

        $updatedRequirement = $applicant->requirements()->whereNotIn('requirement_id', $request->requirements)->get();

        $applicant->info->update($request->validated());
        $applicant->spouse->update($request->validated());
        $applicant->update($request->validated());


        $applicant
            ->requirements()
            ->attach($request->requirements);

        $applicant
            ->requirements()
            ->detach($updatedRequirement);

        if ($request->familyCompositions) {
            foreach ($request->familyCompositions as $family) {
                FamilyComposition::updateOrCreate([
                    'relation' => $family['relation'],
                    'civil_status' => $family['civil_status'],
                    'age' => $family['age'],

                    'source_of_income' => $family['source_of_income'],

                ], [
                    'applicant_id' => $applicant->id,
                    'first_name' => $family['first_name'],
                    'middle_name' => $family['middle_name'],
                    'last_name' => $family['last_name'],
                    'gender' => $family['gender'],
                ]);
            }

            $applicant->family_composition()->whereNotIn(
                'id',
                collect($request->familyCompositions)->pluck('id')
            )
                ->delete();
        }


        return redirect()->route('applicants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
