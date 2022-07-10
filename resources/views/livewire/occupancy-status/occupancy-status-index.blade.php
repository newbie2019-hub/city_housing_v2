<div class="mt-20">
    <div class="mt-4 bg-white rounded-lg shadow-xs">
        <div class="my-6 text-2xl font-semibold text-gray-700 mt-14">
            <p class="text-2xl leading-8">
                Housing Unit Statuses
            </p>
            <p class="text-base font-normal">Here are the housing unit status that is available in the system</p>
            </p>
        </div>
        <div class="relative flex justify-between mb-5">
            <button
                class="px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg bg-blue-1000 active:bg-blue-900 hover:bg-blue-700 focus:outline-none focus:ring"
                wire:click='$emit("openModal", "occupancy-status.create-status")'>
                {{ __('New Status') }}
            </button>

            <x-input wire:model.debounce.400ms="search" id="search" class="right-0 w-1/3 sm:w-1/2" type="text"
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
        <div class="container overflow-x-auto ">
            <div class="w-full shadow-sm sm:rounded-lg">
                <table class="[&>*]:p-4 w-full text-sm text-left text-gray-500 table-auto dark:text-gray-400">
                    <thead class="text-sm text-black uppercase bg-[#ECECED] dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        @forelse ($statuses as $status)
                        <tr
                            class="text-gray-900 bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <td class="px-6 py-4">
                                {{ $status->id }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $status->status }}
                            </td>

                            <td class="px-6 py-4 text-center ">
                                <div class="flex justify-between ">

                                    <div class="w-full font-medium transform hover:text-purple-500 hover:scale-110 ">

                                        <button wire:click='$emit("openModal", "occupancy-status.edit-status" , {{
                                     json_encode(["occupancyStatus" => $status->id]) }})'>
                                            Edit
                                        </button>
                                    </div>

                                    <div
                                        class="w-full font-medium text-red-600 transform hover:text-red-900 hover:scale-110">
                                        <button type="submit"
                                            wire:click='$emit("openModal", "confirm-delete-modal" , {{ json_encode([$status->id, "Status" , "delete"]) }})'>
                                            Move to Trash
                                        </button>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <td class="py-6" colspan="4">
                            <div class="flex flex-col justify-center place-items-center align-center">
                                <img class="w-24 h-24" src="{{ asset('images/empty.svg') }}" alt="Empty" />
                                <div class="">
                                    <p class="mt-5">
                                        No data for your activity logs
                                    </p>
                                </div>
                            </div>
                        </td>
                        @endforelse
                    </tbody>
                </table>

                <div class="my-4">
                    {{ $statuses->links() }}
                </div>
            </div>
        </div>
    </div>





</div>
