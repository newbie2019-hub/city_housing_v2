<div>
    <div class="w-9/12">
        <div class="bg-white w-96 overflow-auto shadow-sm sm:rounded-lg">
            <div class="pt-6 pb-4 px-6 bg-white border-b border-gray-200">

                <form method="POST" action="{{  route('users.update', $user) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-5">
                        <p class="font-medium text-xl text-left">Update User Info</p>
                        <p class="text-gray-500 text-sm text-left">All fields are required</p>
                    </div>


                    <div>
                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input type="text" id="first_name" name="first_name" wire:model="first_name"
                                    class="block w-full border-2 " required />
                                <x-floating-label for="first_name" :value="__('First Name')" />
                            </div>
                            @error('first_name')
                            <p id="outlined_error_help" class="mt-2 text-left text-xs text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input type="text" id="middle_name" name="middle_name"
                                    wire:model="middle_name" />
                                <x-floating-label for="middle_name" :value="__('Middle Name')" />
                            </div>
                            @error('middle_name')
                            <p id="outlined_error_help" class="mt-2 text-left text-xs text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input type="text" id="last_name" name="last_name" wire:model="last_name"
                                    required />
                                <x-floating-label for="last_name" :value="__('Last Name')" />
                            </div>
                            @error('last_name')
                            <p id="outlined_error_help" class="mt-2 text-left text-xs text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <select wire:model="gender" id="gender" name="gender" class="block px-2.5 py-3 w-full text-sm
                        text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option>Select Gender</option>
                                <option value="Male" @if ($gender==='Male' ) selected @endif>Male</option>
                                <option value="Female" @if ($gender==='Female' ) selected @endif>Female
                                </option>
                                <option value="Other" @if ($gender==='Other' ) selected @endif>Other</option>
                            </select>
                            @error('gender')
                            <p id="outlined_error_help" class="mt-2 text-left  text-xs text-red-600 dark:text-red-400">
                                {{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input type="text" id="address" name="address" wire:model="address"
                                    class="block w-full" />
                                <x-floating-label for="address" :value="__('Address')" />
                            </div>
                            @error('address')
                            <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input type="text" id="contact" name="contact" wire:model="contact"
                                    class="block w-full" required />
                                <x-floating-label for="contact" :value="__('Contact Number')" />
                            </div>
                            @error('contact')
                            <p id="outlined_error_help" class="mt-2 text-left text-xs text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <select wire:model="role" id="role" name="role" class="block px-2.5 py-3 w-full text-sm
                        text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option>Select Role</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if ($role===$role->name )
                                    selected @endif> {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <p id="outlined_error_help" class="mt-2 text-left text-xs text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>

                        {{-- <div class="mt-4">
                            <select wire:model="approve" id="approve" name="approve" class="block px-2.5 pb-2.5 w-full text-sm
                        text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600
                        dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option>Select Status</option>
                                <option value="1" @if ($approve===1 ) selected @endif>
                                    Approve
                                </option>

                                <option value="0" @if ($approve===0 ) selected @endif>
                                    Pending
                                </option>
                            </select>
                            @error('approve')
                            <p id="outlined_error_help" class="mt-2 text-left text-xs text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div> --}}
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center justify-end mt-4">
                            <x-button.text-button btnType="secondary" wire:click="$emit('closeModal')">
                                {{ __('Cancel') }}
                            </x-button.text-button>
                            <x-button.text-button btnType="success">
                                {{ __('Update') }}
                            </x-button.text-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
