<div class="mt-5 mb-5">

    <div class="relative flex justify-between">
        <div>
            <a href="{{ route('applicants.create') }}">
                <x-button>{{ __('Add Applicants') }}</x-button>
            </a>
        </div>

        <div class="right-0 flex justify-end w-3/4 gap-3 sm:w-1/2">
            <a>
                <button wire:click='$emit("openModal", "filter.filter-modal")'
                    class="mt-1.5 px-4 py-2 text-sm font-medium leading-5 text-center
                  text-white transition-colors duration-150 bg-blue-1000 border border-transparent rounded-lg active:bg-blue-900
                  hover:bg-blue-700 focus:outline-none focus:ring'">
                    {{ __('Filter') }}
                </button>
            </a>


            <x-input wire:model.debounce.400ms="search" id="search" class="w-1/3 mb-4 righ-0" type="text"
                name="search" placeholder="Search" :value="old('search')" />
            <div class="absolute top-4 right-3">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>

    <div>
        <div class=" p-4 w-auto  h-full md:h-auto">
            <div class=" bg-white rounded-lg dark:bg-gray-700">
                <div class="mb-5">
                    <p class="font-medium text-xl text-left">Filter Application</p>
                    <p class="text-gray-500 text-sm text-left">All fields are required</p>
                </div>
                <div class="mt-5">
                    <select wire:model="filterable.civil_status" name="civil_status" id="civil_status"
                        class="'block p-3 w-full text-sm
                text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="" disabled>
                            Select Civil Status
                        </option>
                        <option value="Single">
                            Single
                        </option>
                        <option value="Married">
                            Married
                        </option>

                        <option value="Widowed">
                            Widowed
                        </option>
                        <option value="Divorced">
                            Divorced
                        </option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-6 ">

                    <div>
                        <span>Income per Month</span>
                        <div class="flex gap-2">
                            <div>
                                <span>From</span>
                                <div class="relative mt-2">
                                    <x-floating-input type="number" wire:model.lazy="filterable.start_income_per_month"
                                        id="start_income_per_month" name="start_income_per_month"
                                        class="block w-full border-2 " />
                                    <x-floating-label for="start_income_per_month" :value="__('Income per Month')" />
                                </div>
                            </div>

                            <div>
                                <span>To</span>
                                <div class="relative mt-2">
                                    <x-floating-input type="number" wire:model.lazy="filterable.end_income_per_month"
                                        id="end_income_per_month" name="end_income_per_month"
                                        class="block w-full border-2 " />
                                    <x-floating-label for="end_income_per_month" :value="__('Income per Month')" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span>Birthday</span>
                        <div class="flex items-center gap-2">
                            <div>
                                <span>From</span>
                                <input wire:model="filterable.start" id="datepicker"
                                    type="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>

                            <div>
                                <span>To</span>
                                <input wire:model="filterable.end" id="datepicker" type="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    {{ now() }} - VAL: {{ $filterable['start_income_per_month'] }} -
                    {{ $filterable['end_income_per_month'] }}
                </div>
                <div class="flex justify-end gap-4 mt-5">
                    <x-button.text-button wire:click="resetFilter" btn-type="error">Reset Filter</x-button.text-button>
                    <x-button wire:click="filterApplicant">Filter</x-button>
                </div>
            </div>
        </div>
    </div>

    <div class="container overflow-x-auto">
        <x-table>
            <x-slot name="head">
                <x-table.heading>
                    Applicant
                </x-table.heading>
                <x-table.heading>
                    Spouse
                </x-table.heading>
                <x-table.heading>
                    Date of Birth
                </x-table.heading>
                <x-table.heading>
                    Civil Status
                </x-table.heading>
                <x-table.heading>
                    Office
                </x-table.heading>
                <x-table.heading>
                    Income Per Month
                </x-table.heading>
                <x-table.heading>
                    Added By
                </x-table.heading>
                <x-table.heading>
                    Added On
                </x-table.heading>
                <x-table.heading>
                    Action
                </x-table.heading>
            </x-slot>
            <x-slot name="body">
                @forelse ($applicants as $applicant)
                    <x-table.row wire:key="{{ $applicant->id }}" wire:loading.class="opacity-50 ">
                        <x-table.cell class="cell">
                            {{ $applicant->info->full_name }}
                        </x-table.cell>
                        <x-table.cell class="cell">
                            {{ $applicant->spouse->full_name }}
                        </x-table.cell>
                        <x-table.cell class="cell">
                            {{ $applicant->info->birth_date }}
                        </x-table.cell>
                        <x-table.cell class="cell">
                            {{ $applicant->info->civil_status }}
                        </x-table.cell>
                        <x-table.cell class="cell">
                            {{ $applicant->info->office }}
                        </x-table.cell>
                        <x-table.cell class="cell">
                            {{ $applicant->info->income_per_month }}
                        </x-table.cell>
                        <x-table.cell class="cell">
                            {{ $applicant->created_by }}
                        </x-table.cell>
                        <x-table.cell class="cell">
                            {{ $applicant->created_at->format('F j, Y h:i:s A') }}
                        </x-table.cell>

                        <x-table.cell class="cell">
                            <div class="flex justify-between gap-1 ">
                                <div
                                    class="w-full font-medium transform text-blue-1000 hover:text-blue-900 hover:scale-110 ">
                                    <a href="{{ route('applicants.show', $applicant) }}">
                                        View Detail
                                    </a>
                                </div>
                                <div class="w-full font-medium transform hover:text-purple-500 hover:scale-110 ">
                                    <a href="{{ route('applicants.edit', $applicant) }}">
                                        Edit
                                    </a>
                                </div>
                                <div
                                    class="w-full font-medium text-red-600 transform hover:text-red-900 hover:scale-110">
                                    <button
                                        wire:click='$emit("openModal", "applicants.confirmation-modal" , {{ json_encode([$applicant->id, 'archive']) }})'
                                        type="submit">
                                        Move to Trash
                                    </button>
                                </div>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <td class="py-6" colspan="5">
                        <div class="flex flex-col justify-center place-items-center align-center">
                            <img class="w-24 h-24" src="{{ asset('images/empty.svg') }}" alt="Empty" />
                            <div class="">
                                <p class="mt-5 text-gray-500">
                                    No data available ...
                                </p>
                            </div>
                        </div>
                    </td>
                @endforelse
            </x-slot>
        </x-table>
        <div class="mt-5 mb-5">
            {{ $applicants->onEachSide(0)->links() }}
        </div>
    </div>

</div>
