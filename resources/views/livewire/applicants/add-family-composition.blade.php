<div>
    @foreach ($familyCompositions as $index => $familyComposition)
    <div class="pb-5 border-b-2">
        <div class="grid grid-cols-3 gap-6 ">
            <div class="mt-4">

                <div class="relative">
                    <x-floating-input value="{{ $familyCompositions[$index]['first_name'] }}" type="text"
                        id="familyCompositions[{{$index}}][first_name]"
                        name="familyCompositions[{{$index}}][first_name]" class="block w-full border-2 " required />
                    <x-floating-label for="familyCompositions[{{$index}}][first_name]" :value="__('First Name')" />
                </div>
                @error('familyCompositions[{{$index}}][first_name]')
                <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                    $message
                    }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <div class="relative">
                    <x-floating-input value="{{ $familyCompositions[$index]['middle_name'] }}" type="text"
                        id="familyCompositions[{{$index}}][middle_name]"
                        name="familyCompositions[{{$index}}][middle_name]" class="block w-full border-2 " required />
                    <x-floating-label for="familyCompositions[{{$index}}][middle_name]" :value="__('Middle Name')" />
                </div>
                @error('familyCompositions[{{$index}}][middle_name]')
                <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                    $message
                    }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <div class="relative">
                    <x-floating-input value="{{ $familyCompositions[$index]['last_name'] }}" type="text"
                        id="familyCompositions[{{$index}}][last_name]" name="familyCompositions[{{$index}}][last_name]"
                        class="block w-full border-2 " required />
                    <x-floating-label for="familyCompositions[{{$index}}][last_name]" :value="__('Last Name')" />
                </div>
                @error('familyCompositions[{{$index}}][last_name]')
                <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                    $message
                    }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <div class="relative">
                    <x-floating-input value="{{ $familyCompositions[$index]['relation'] }}" type="text"
                        id="familyCompositions[{{$index}}][relation]" name="familyCompositions[{{$index}}][relation]"
                        class="block w-full border-2 " required />
                    <x-floating-label for="familyCompositions[{{$index}}][relation]" :value="__('Relation')" />
                </div>
                @error('familyCompositions[{{$index}}][relation]')
                <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                    $message
                    }}</p>
                @enderror
            </div>

            <div class="mt-4">

                <select name="familyCompositions[{{$index}}][gender]" id="familyCompositions[{{$index}}][gender]" class="'block p-3 w-full text-sm
         text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
         dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="" selected>
                        Select a Gender
                    </option>
                    <option value="Male" @if ($familyCompositions[$index]['gender']==='Male' ) selected @endif>
                        Male
                    </option>

                    <option value="Female" @if ($familyCompositions[$index]['gender']==='Female' ) selected @endif>
                        Female
                    </option>

                    <option value="Other" @if ($familyCompositions[$index]['gender']==='Other' ) selected @endif>
                        Other
                    </option>

                </select>
                @error('familyCompositions[{{$index}}][gender]')
                <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                    $message
                    }}</p>
                @enderror
            </div>

            <div class="mt-4">

                <select name="familyCompositions[{{$index}}][civil_status]"
                    id="familyCompositions[{{$index}}][civil_status]" class="'block p-3 w-full text-sm
                text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">

                    <option value="" selected>
                        Select a Civil Status
                    </option>
                    <option value="Single" @if ($familyCompositions[$index]['civil_status']==='Single' ) selected
                        @endif>
                        Single
                    </option>

                    <option value="Married" @if ($familyCompositions[$index]['civil_status']==='Married' ) selected
                        @endif>
                        Married
                    </option>

                    <option value="Widowed" @if ($familyCompositions[$index]['civil_status']==='Widowed' ) selected
                        @endif>
                        Widowed
                    </option>

                    <option value="Divorced" @if ($familyCompositions[$index]['civil_status']==='Divorced' ) selected
                        @endif>
                        Divorced
                    </option>
                </select>
            </div>

            <div class="mt-4">
                <div class="relative">
                    <x-floating-input value="{{ $familyCompositions[$index]['age'] }}" type="text"
                        id="familyCompositions[{{$index}}][age]" name="familyCompositions[{{$index}}][age]"
                        class="block w-full border-2 " required />
                    <x-floating-label for="familyCompositions[{{$index}}][age]" :value="__('Age')" />
                </div>
                @error('familyCompositions[{{$index}}][age]')
                <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                    $message
                    }}</p>
                @enderror
            </div>

            <input hidden value="{{ $familyCompositions[$index]['id'] }}" id="familyCompositions[{{$index}}][id]"
                name="familyCompositions[{{$index}}][id]">
            <div class="mt-4">
                <div class="relative">
                    <x-floating-input value="{{ $familyCompositions[$index]['source_of_income'] }}" type="text"
                        id="familyCompositions[{{$index}}][source_of_income]"
                        name="familyCompositions[{{$index}}][source_of_income]" class="block w-full border-2 "
                        required />
                    <x-floating-label for="familyCompositions[{{$index}}][source_of_income]"
                        :value="__('Source of Income')" />
                </div>
                @error('familyCompositions[{{$index}}][source_of_income]')
                <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                    $message
                    }}</p>
                @enderror
            </div>


            <div class="mt-4">
                <div class="relative">
                    <a wire:click="removeItem({{ $index }})"
                        class="px-4 py-2 text-sm font-medium leading-5 text-center transition-colors duration-150  border border-transparent rounded-lg focus:outline-none focus:ring-0 text-red-1000 active:bg-red-900/[.20] hover:text-red-500 hover:bg-red-700/[.20]">
                        Remove
                    </a>
                </div>

            </div>
        </div>
    </div>
    @endforeach



    <div class="flex items-center justify-end ">
        <button wire:click.prevent="addItem()"
            class="px-4 py-2 mt-3 ml-3 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-800 border border-transparent rounded-lg cursor-pointer active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring">
            {{ __('Add Family Member') }}
        </button>
    </div>
</div>
