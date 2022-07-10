<div>
    <div class="w-9/12 ">
        <div class="overflow-auto bg-white shadow-sm w-96 sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form wire:submit.prevent="saveHousingUnitStatus">
                    <div class="mb-5">
                        <p class="text-xl font-medium text-left">Create new Housing Unit Status</p>
                        <p class="text-sm text-left text-gray-500">All fields are required</p>
                    </div>

                    <div>

                        <div class="mt-4">
                            <div class="relative">
                                <x-floating-input type="text" id="status" name="status" wire:model="status"
                                    class="block w-full border-2 " required />
                                <x-floating-label for="status" :value="__('Status')" />
                            </div>
                            @error('status')
                            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                                $message
                                }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-5">
                        <x-button.text-button btnType="secondary" type="button" wire:click="$emit('closeModal')">Cancel
                        </x-button.text-button>
                        <x-button.text-button btnType="success" type="submit">Save Housing
                            Unit
                        </x-button.text-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
