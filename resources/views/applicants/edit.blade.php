<x-app-layout>
    <div class="py-5">
        <div class="pb-5 my-6 mt-16 text-2xl font-semibold text-gray-700 border-b-2">
            <p class="text-2xl leading-8">
                {{ __('Applicant Personal Information' ) }}
            </p>
            <p class="text-base font-normal">Please make sure that your entered informations are correct.</p>
        </div>

        <form method="POST" action="{{  route('applicants.update', $applicant) }}">
            @method('PUT')
            @csrf

            {{-- Housing Info --}}
            <div class="mt-5">
                <p class="text-base font-medium">Housing Project</p>
                <div class="grid grid-cols-4 gap-6 mb-5">
                    <div class="mt-4">
                        <select name="housing_project_id" id="housing_project_id" class="'block p-3 w-full text-sm
                        text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            @foreach ($housing_projects as $housing)
                            <option value="{{ $housing->id }}" @if ($applicant->housing_unit->housingproject->id ==
                                $housing->id)
                                selected
                                @endif>
                                {{ $housing->project }}
                            </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input value="{{ $applicant->housing_unit->block_no }}" type="text" id="phase_no"
                                name="phase_no" class="block w-full border-2 " required />
                            <x-floating-label for="phase_no" :value="__('Phase No.')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input value="{{ $applicant->housing_unit->lot_no }}" type="text" id="block_no"
                                name="block_no" class="block w-full border-2 " required />
                            <x-floating-label for="block_no" :value="__('Block No.')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input value="{{ $applicant->housing_unit->phase_no }}" type="text" id="lot_no"
                                name="lot_no" class="block w-full border-2 " required />
                            <x-floating-label for="lot_no" :value="__('Lot No.')" />
                        </div>
                    </div>

                </div>
            </div>

            {{-- Applicant Info --}}
            <div class="mt-5">
                <p class="text-lg font-medium">Applicant Basic Info</p>

                <div class="grid grid-cols-3 gap-2">
                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="first_name" name="first_name"
                                value="{{ $applicant->info->first_name }}" class="block w-full " />
                            <x-floating-label for="first_name" :value="__('First Name')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="middle_name" name="middle_name"
                                value="{{ $applicant->info->middle_name }}" class="block w-full " />
                            <x-floating-label for="middle_name" :value="__('Middle Name')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="last_name" name="last_name"
                                value="{{ $applicant->info->last_name }}" class="block w-full " />
                            <x-floating-label for="last_name" :value="__('Last Name')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="suffix" name="suffix"
                                value="{{ $applicant->info->suffix }}" class="block w-full " />
                            <x-floating-label for="suffix" :value="__('Suffix')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <select id="gender" name="gender" class="'block p-3 w-full text-sm
                        text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option value="" selected>
                                Select a Gender
                            </option>
                            <option value="Male" @if ($applicant->info['gender']==='Male' ) selected
                                @endif>
                                Male
                            </option>

                            <option value="Female" @if ($applicant->info->gender==='Female' ) selected
                                @endif>
                                Female
                            </option>

                            <option value="Other" @if ($applicant->info->gender==='Other' ) selected
                                @endif>
                                Other
                            </option>

                        </select>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="brgy_origin" name="brgy_origin"
                                value="{{ $applicant->info->brgy_origin }}" class="block w-full " />
                            <x-floating-label for="brgy_origin" :value="__('Residence/Address')" />
                        </div>
                    </div>


                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="birth_date" name="birth_date"
                                value="{{ $applicant->info->birth_date }}" class="block w-full " />
                            <x-floating-label for="birth_date" :value="__('Birthday')" />
                        </div>
                    </div>


                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="place_of_birth" name="place_of_birth"
                                value="{{ $applicant->info->place_of_birth }}" class="block w-full " />
                            <x-floating-label for="place_of_birth" :value="__('Place of Birth')" />
                        </div>
                    </div>


                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="citizenship" name="citizenship"
                                value="{{ $applicant->info->citizenship }}" class="block w-full " />
                            <x-floating-label for="citizenship" :value="__('Citizenship')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="contact" name="contact"
                                value="{{ $applicant->info->contact }}" class="block w-full " />
                            <x-floating-label for="contact" :value="__('Contact')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="tin_no" name="tin_no"
                                value="{{ $applicant->info->tin_no }}" class="block w-full " />
                            <x-floating-label for="tin_no" :value="__('TIN no')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="govt_id" name="govt_id"
                                value="{{ $applicant->info->govt_id }}" class="block w-full " />
                            <x-floating-label for="govt_id" :value="__('GSIS/SSS/Pag-IBIG No')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="civil_status" name="civil_status"
                                value="{{ $applicant->info->civil_status }}" class="block w-full " />
                            <x-floating-label for="civil_status" :value="__('Civil Status')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="office" name="office"
                                value="{{ $applicant->info->office }}" class="block w-full " />
                            <x-floating-label for="office" :value="__('Office')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="income_per_month" name="income_per_month"
                                value="{{ $applicant->info->income_per_month }}" class="block w-full " />
                            <x-floating-label for="income_per_month" :value="__('Income per Month')" />
                        </div>
                    </div>
                </div>
            </div>


            {{-- Spouse Info --}}
            <div class="mt-5">
                <p class="text-lg font-medium">Applicant Spouse Info</p>

                <div class="grid grid-cols-3 gap-2">
                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="spouse_first_name" name="spouse_first_name"
                                value="{{ $applicant->spouse->spouse_first_name }}" class="block w-full " />
                            <x-floating-label for="spouse_first_name" :value="__('First Name')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="spouse_middle_name" name="spouse_middle_name"
                                value="{{ $applicant->spouse->spouse_middle_name }}" class="block w-full " />
                            <x-floating-label for="spouse_middle_name" :value="__('Middle Name')" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="spouse_last_name" name="spouse_last_name"
                                value="{{ $applicant->spouse->spouse_last_name }}" class="block w-full " />
                            <x-floating-label for="spouse_last_name" :value="__('Last Name')" />
                        </div>
                    </div>

                    <div class="mt-4">

                        <select id="spouse_gender" name="spouse_gender" class="'block p-3 w-full text-sm
                        text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option value="" selected>
                                Select a Gender
                            </option>
                            <option value="Male" @if ($applicant->spouse->spouse_gender==='Male' ) selected
                                @endif>
                                Male
                            </option>

                            <option value="Female" @if ($applicant->spouse->spouse_gender==='Female' ) selected
                                @endif>
                                Female
                            </option>

                            <option value="Other" @if ($applicant->spouse->spouse_gender==='Other' ) selected
                                @endif>
                                Other
                            </option>

                        </select>
                    </div>


                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="spouse_birth_date" name="spouse_birth_date"
                                value="{{ $applicant->spouse->spouse_birth_date }}" class="block w-full " />
                            <x-floating-label for="spouse_birth_date" :value="__('Birthday')" />
                        </div>
                    </div>


                    <div class="mt-4">
                        <div class="relative">
                            <x-floating-input type="text" id="spouse_place_of_birth" name="spouse_place_of_birth"
                                value="{{ $applicant->spouse->spouse_place_of_birth }}" class="block w-full " />
                            <x-floating-label for="spouse_place_of_birth" :value="__('Place of Birth')" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <p class="my-5 text-base font-medium">Family Composition</p>
                @foreach ($applicant->family_composition as $index => $familyComposition)
                <div class="pb-5 border-b-2">
                    <div class="grid grid-cols-3 gap-6 ">
                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input value="{{ $familyComposition->first_name }}" type="text"
                                    id="familyCompositions[{{$index}}][first_name]"
                                    name="familyCompositions[{{$index}}][first_name]" class="block w-full border-2 "
                                    required />
                                <x-floating-label for="familyCompositions[{{$index}}][first_name]"
                                    :value="__('First Name')" />
                            </div>
                            @error('familyCompositions[{{$index}}][first_name]')
                            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input value="{{ $familyComposition->middle_name }}" type="text"
                                    id="familyCompositions[{{ $index }}][middle_name]"
                                    name="familyCompositions[{{ $index }}][middle_name]" class="block w-full border-2 "
                                    required />
                                <x-floating-label for="familyCompositions[{{ $index }}][middle_name]"
                                    :value="__('Middle Name')" />
                            </div>
                            @error('familyCompositions[{{ $index }}][middle_name]')
                            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input value="{{ $familyComposition->last_name }}" type="text"
                                    id="familyCompositions[{{ $index }}][last_name]"
                                    name="familyCompositions[{{ $index }}][last_name]" class="block w-full border-2 "
                                    required />
                                <x-floating-label for="familyCompositions[{{ $index }}][last_name]"
                                    :value="__('Last Name')" />
                            </div>
                            @error('familyCompositions[{{ $index }}][last_name]')
                            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input value="{{ $familyComposition->relation }}" type="text"
                                    id="familyCompositions[{{ $index }}][relation]"
                                    name="familyCompositions[{{ $index }}][relation]" class="block w-full border-2 "
                                    required />
                                <x-floating-label for="familyCompositions[{{ $index }}][relation]"
                                    :value="__('Relation')" />
                            </div>
                            @error('familyCompositions[{{ $index }}][relation]')
                            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">

                            <select id="familyCompositions[{{ $index }}][gender]"
                                name="familyCompositions[{{ $index }}][gender]"
                                class="'block p-3 w-full text-sm
                                    text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                                    dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value="" selected>
                                    Select a Gender
                                </option>
                                <option value="Male" @if ($familyComposition->gender==='Male' ) selected
                                    @endif>
                                    Male
                                </option>

                                <option value="Female" @if ($familyComposition->gender==='Female' ) selected
                                    @endif>
                                    Female
                                </option>

                                <option value="Other" @if ($familyComposition->gender==='Other' ) selected
                                    @endif>
                                    Other
                                </option>

                            </select>
                        </div>

                        <div class="mt-4">

                            <select name="familyCompositions[{{ $index }}][civil_status]"
                                id="familyCompositions[{{ $index }}][civil_status]"
                                class="'block p-3 w-full text-sm
                                    text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                                    dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value="Single" @if ($familyComposition->civil_status==='Single' ) selected
                                    @endif>
                                    Single
                                </option>

                                <option value="Married" @if ($familyComposition->civil_status === 'Married' )
                                    selected @endif>
                                    Married
                                </option>

                                <option value="Widowed" @if ($familyComposition->civil_status==='Widowed' ) selected
                                    @endif>
                                    Widowed
                                </option>

                                <option value="Divorced" @if ($familyComposition->civil_status==='Divorced' ) selected
                                    @endif>
                                    Divorced
                                </option>

                            </select>
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input value="{{ $familyComposition->age }}" type="text"
                                    id="familyCompositions[{{ $index }}][age]"
                                    name="familyCompositions[{{ $index }}][age]" class="block w-full border-2 "
                                    required />
                                <x-floating-label for="familyCompositions[{{ $index }}][age]" :value="__('Age')" />
                            </div>
                            @error('familyCompositions[{{ $index }}][age]')
                            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input value="{{ $familyComposition->source_of_income }}" type="text"
                                    id="familyCompositions[{{ $index }}][source_of_income]"
                                    name="familyCompositions[{{ $index }}][source_of_income]"
                                    class="block w-full border-2 " required />
                                <x-floating-label for="familyCompositions[{{ $index }}][source_of_income]"
                                    :value="__('Source of Income')" />
                            </div>
                            @error('familyCompositions[{{ $index }}][source_of_income]')
                            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        @livewire('applicants.applicant-trash-family-member', ['id' => $familyComposition])
                    </div>
                </div>
                @endforeach
            </div>
            @livewire('applicants.add-family-composition')

            {{-- Requirements and attachments --}}
            <div class="mt-5">
                <p class="text-lg font-medium">Requirements</p>

                <div class="grid grid-cols-4 gap-6 mb-5">
                    @foreach ($applicant->requirements as $requirement)
                    {{-- <div class="mt-5 text-sm bg-transparent">
                        <li class=" text-cool-gray-900">
                            {{ $requirement->description ?? '' }}
                        </li>
                    </div> --}}

                    <div class="mt-5 text-sm bg-transparent">
                        <input id="requirements-{{ $requirement->id }}" name="requirements-{{ $requirement->id }}"
                            type="checkbox" value="{{ $requirement->id }}" checked
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-{{ $requirement->id }}"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ $requirement->description }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <p class="text-lg font-medium">Attachment</p>
                <div class="flex gap-2 mt-5">
                    @foreach ($applicant->requirementsImage as $photo)
                    <img class="w-32 h-32 mx-2" src="{{ asset('storage/images/requirement/'. $photo->image) }}">
                    @endforeach
                </div>
            </div>


            <div class="flex justify-end gap-2">
                <div class="flex justify-end my-5">

                    <div class="flex items-center justify-end mt-4">
                        <x-back-button href="{{ route('applicants.index') }}" class="ml-3">
                            {{ __('Back') }}
                        </x-back-button>
                        <x-button.text-button type="submit" btn-type="success">
                            {{ __('Create') }}
                        </x-button.text-button>
                    </div>

                </div>

            </div>
        </form>
    </div>

    {{-- @livewire('applicants.edit-applicant',['applicant' => $applicant]); --}}

</x-app-layout>
