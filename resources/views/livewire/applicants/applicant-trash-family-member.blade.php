<div>
    <div class="mt-4">
        <a type='button'
            class="px-4 py-2 text-sm font-medium leading-5 text-center transition-colors duration-150  border border-transparent rounded-lg focus:outline-none focus:ring-0 text-red-1000 active:bg-red-900/[.20] hover:text-red-500 hover:bg-red-700/[.20]"
            wire:click='$emit("openModal", "applicants.confirmation-modal" , {{ json_encode([$familyMember->id, "FamilyComposition", "archive" ]) }})'>
            Trash Family
            Member
        </a>
    </div>
</div>
