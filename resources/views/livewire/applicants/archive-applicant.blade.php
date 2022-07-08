<div>

    <div class="mt-4 bg-white rounded-lg shadow-xs">
        <div class="my-6 text-2xl font-semibold text-gray-700 mt-14">
            <p class="text-2xl leading-8">
                Archived Applicants
            </p>
            <p class="text-base font-normal">Here are the archived applicants of this system.</p>
            </p>
        </div>
        <div class="container overflow-x-auto">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable multi-column wire:click="sortBy('first_name')" :direction="$sorts['first_name'] ?? null">
                        Applicant
                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('first_name')" :direction="$sorts['first_name'] ?? null">
                        Spouse
                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('birth_date')" :direction="$sorts['birth_date'] ?? null">
                        Date of Birth
                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('civil_status')" :direction="$sorts['civil_status'] ?? null">
                        Civil Status

                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('office')" :direction="$sorts['office'] ?? null">
                        Office
                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('income_per_month')" :direction="$sorts['income_per_month'] ?? null">
                        Income Per Month
                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('income_per_month')" :direction="$sorts['income_per_month'] ?? null">
                        Added By
                    </x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy(' created_at')" :direction="$sorts[' created_at'] ?? null">
                        Added On
                    </x-table.heading>

                    <x-table.heading sortable multi-column>
                        Action
                    </x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($archivedApplicants as $archiveApplicant)
                        <x-table.row wire:key="{{ $archiveApplicant->id }}" wire:loading.class="opacity-50 ">
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->info->full_name }}
                            </x-table.cell>
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->spouse->full_name }}
                            </x-table.cell>
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->info->birth_date }}
                            </x-table.cell>
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->info->civil_status }}
                            </x-table.cell>
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->info->office }}
                            </x-table.cell>
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->info->income_per_month }}
                            </x-table.cell>
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->created_by }}
                            </x-table.cell>
                            <x-table.cell class="cell">
                                {{ $archiveApplicant->created_at->format('F j, Y h:i:s A') }}
                            </x-table.cell>

                            <x-table.cell class="cell">
                                <div class="flex justify-between gap-1 ">
                                    <div
                                        class="w-full font-medium transform text-blue-1000 hover:text-blue-900 hover:scale-110 ">
                                        <a href="{{ route('applicants.show', $archiveApplicant) }}">
                                            View Detail
                                        </a>
                                    </div>
                                    <div class="w-full font-medium transform hover:text-purple-500 hover:scale-110 ">
                                        <a href="{{ route('applicants.edit', $archiveApplicant) }}">
                                            Edit
                                        </a>
                                    </div>

                                    <div
                                        class="w-full font-medium text-red-600 transform hover:text-red-900 hover:scale-110">
                                        <button
                                            wire:click='$emit("openModal", "applicants.confirmation-modal" , {{ json_encode([$archiveApplicant->id, 'restore']) }})'
                                            type="submit">
                                            Restore
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
                {{ $archivedApplicants->onEachSide(0)->links() }}
            </div>
        </div>
    </div>
</div>
