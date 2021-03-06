<div>

    <div class="flex justify-end space-x-4 mb-3 ">
        <div class="relative w-1/3">
            <x-floating-input wire:model.debounce.400ms="search" id="search" class="w-full" type="text" name="search"
                :value="old('search')" />
            <x-floating-label for="search" :value="__('Search')" />
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 table-auto dark:text-gray-400">
            @if (!count($users) == '0')
                <thead class="text-sm text-black uppercase bg-[#ECECED] dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contact
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created on
                        </th>
                        <th scope="col" class="px-24 py-3">
                            Action
                        </th>
                    </tr>

                </thead>
            @endif
            <tbody>
                @forelse ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mt-6 my-auto h-16 w-16">
                                    <img src="{{ asset('images/logo.jpg') }}" class="mx-2 h-10 w-10 rounded-full" />
                                </div>
                                <span>{{ $user->full_name }}</span>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $user->contact }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $user->created_at }}

                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-between">
                                <div
                                    class="w-full transform font-medium text-blue-1000 hover:text-blue-900 hover:scale-110 ">
                                    <button
                                        wire:click='$emit("openModal", "user-detail-modal" , {{ json_encode([$user->id, true]) }})'>
                                        View Detail
                                    </button>
                                </div>

                                <div
                                    class="w-full inline-flex justify-center text-lg font-medium text-red-1000 hover:text-red-700 hover:underline sm:ml-3 sm:w-auto sm:text-sm">
                                    {{-- <a href="#"
                                    class="w-full transform text-red-600 hover:text-red-900 hover:scale-110">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="w-4 h-4">
                                            Restore
                                        </button>
                                    </form> --}}
                                    <button type="submit"
                                        wire:click='$emit("openModal", "confirm-delete-modal" , {{ json_encode([$user->id, 'restore']) }})'>
                                        Restore

                                    </button>


                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <div class=" flex justify-center">
                        <div class="my-5">
                            <img class="w-24 h-24" src="{{ asset('images/empty.svg') }}" alt="Empty" />
                            <div class="mr-8">
                                No available Chairman
                            </div>
                        </div>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
