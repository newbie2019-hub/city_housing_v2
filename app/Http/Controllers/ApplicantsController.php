<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantsRequest;
use App\Models\Applicant;
use App\Models\ApplicantsInfo;
use App\Models\FamilyComposition;
use App\Models\HousingProject;
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

        $applicant->load(
            'info',
            'spouse',
            'housing_unit.housingproject',
            'family_composition',
            'requirements:description',
            'requirementsImage'
        );

        return view('applicants.edit', compact('applicant', 'housing_projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantsRequest $request, Applicant $applicant)
    {
        $applicant->info->update($request->validated());
        $applicant->spouse->update($request->validated());
        $applicant->update($request->validated());
        foreach ($request->familyCompositions as $family) {
            FamilyComposition::updateOrCreate([
                'relation' => $family['relation'],
                'civil_status' => $family['civil_status'],
                'age' => $family['age'],
                'gender' => $family['gender'],
                'source_of_income' => $family['source_of_income'],

            ], [
                'applicant_id' => $applicant->id,
                'first_name' => $family['first_name'],
                'middle_name' => $family['middle_name'],
                'last_name' => $family['last_name'],
            ]);
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

    public function income(ApplicantsInfo $info)
     {
        
     }
}
