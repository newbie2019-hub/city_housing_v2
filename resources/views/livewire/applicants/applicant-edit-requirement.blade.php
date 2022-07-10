<div>
    <div class="mt-10">
        <div>
            <label type="file"
                class="py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg px-11 bg-green-1000 active:bg-green-900 hover:bg-green-700 focus:outline-none focus:ring'">
                Upload Image of Requirements
                <input class="hidden" type="file" wire:model="requirementPhoto" name="requirementPhoto[]"
                    id="requirementPhoto" multiple>
            </label>

            @error('requirementPhoto.*')
            <p id="outlined_error_help" class="mt-2 text-xs text-left text-red-600 dark:text-red-400">{{
                $message
                }}</p>
            @enderror
        </div>

        @if ($requirementPhoto)

        <div class="mt-5">
            Photo Preview:
            <div class="flex gap-2 mt-3">
                @foreach ($requirementPhoto as $photo)
                <img class="w-32 h-32 mx-2" src="{{ $photo->temporaryUrl() }}">
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
