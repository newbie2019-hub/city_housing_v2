<aside
    class=" hidden fixed top-0 left-0 w-64 overflow-y-auto bg-white border-r-2 md:block flex-shrink-0 h-screen z-[5]">
    <div class="py-4">
        <div>
            <p class="ml-6 mt-5 text-lg font-medium text-black">
                Main Menu
            </p>
            <ul class=" mt-4">
                <li class="relative px-6 py-2 ">
                    <x-nav-link
                        class="{{ request()->routeIs('dashboard') ? 'text-[#5283F1]' : 'text-[#525252]' }} hover:text-blue-900"
                        href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>
                        <span class="">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                </li>

                @role('User|Admin')
                <li class="relative px-6 py-2">
                    <x-nav-link class="{{ request()->routeIs('applicants.*') ? 'text-[#5283F1]' : 'text-[#525252]' }} "
                        href="{{ route('applicants.index') }}" :active="request()->routeIs('applicants.*')">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                            </svg>
                        </x-slot>
                        <span class="">{{ __('Applicants') }}</span>
                    </x-nav-link>
                </li>
                @endrole

                @role('Admin')
                <li class="relative px-6 py-2">
                    <x-nav-link class="{{ request()->routeIs('users.*') ? 'text-[#5283F1]' : 'text-[#525252]' }}"
                        href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">

                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>

                        </x-slot>
                        <span class="">{{ __('Users') }}</span>
                    </x-nav-link>
                </li>

                <li class="relative px-6 py-2">
                    <button
                        class="inline-flex items-center w-full gap-6 ml-2 text-base font-semibold text-gray-800 transition-colors duration-150 hover:text-blue-800"
                        @click="toggleMultiLevelMenu" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            <span class="ml-4">Housing</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isMultiLevelMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md"
                            aria-label="submenu">
                            <li
                                class="right-0 px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                                <a href="{{ route('housingprojects.index') }}"
                                    class="{{ request()->routeIs('housingprojects.*') ? 'text-[#5283F1]' : 'text-[#525252]' }} flex w-full gap-4"
                                    :active="request()->routeIs('housingprojects.*')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    Project</a>
                            </li>
                        </ul>
                    </template>
                    <template x-if="isMultiLevelMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md"
                            aria-label="submenu">
                            <li
                                class="right-0 px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                                <a href="{{ route('housingunits') }}"
                                    class="{{ request()->routeIs('housingunits') ? 'text-[#5283F1]' : 'text-[#525252]' }} flex w-full gap-4"
                                    :active="request()->routeIs('housingunits')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    Unit</a>
                            </li>
                        </ul>
                    </template>
                </li>
                @endrole
            </ul>
        </div>

        <div>
            <p class="ml-6 mt-5 text-lg font-medium text-black">
                Configurations
            </p>

            <ul class="mt-4">


                @role('Admin')
                <li class="relative px-6 py-2">
                    <x-nav-link href="{{ route('users.index') }}" :active="false" class="text-[#525252]">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>
                        <span class="">{{ __('System Settings') }}</span>
                    </x-nav-link>
                </li>

                <li class="relative px-6 py-2">
                    <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')"
                        class="{{ request()->routeIs('roles.*') ? 'text-[#5283F1]' : 'text-[#525252]' }}">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>
                        <span class="">{{ __('User Roles') }}</span>
                    </x-nav-link>
                </li>
                @endrole
            </ul>
        </div>

        <div>
            <p class="ml-6 mt-5 text-lg font-medium text-black">
                Account
            </p>

            <ul class="mt-4">
                @role('Admin')
                <li class="relative px-6 py-2">
                    <x-nav-link href="{{ url('accountlogs') }}" :active="request()->is('accountlogs')"
                        class="{{ request()->is('accountlogs') ? 'text-[#5283F1]' : 'text-[#525252]' }}">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>
                        <span class="">{{ __('Accounts Logs') }}</span>
                    </x-nav-link>
                </li>

                <li class="relative px-6 py-2">
                    <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"
                        class="{{ request()->routeIs('profile.show') ? 'text-[#5283F1]' : 'text-[#525252]' }}">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>
                        <span class="">{{ __('Accounts Settings') }}</span>
                    </x-nav-link>
                </li>
                @endrole
            </ul>
        </div>
        <div>

        </div>

        <div class="fixed w-64 bottom-0 pb-3.5 left-0 bg-white border-2 ">
            <div class="flex items-center px-3">
                <div class="flex-shrink-0 h-16 w-16">
                    <img src="{{ asset('images/logo.jpg') }}" class="mx-2 h-16 w-16 rounded-full" />
                </div>
                <div class="ml-4 text-base leading-4">
                    <div class=" font-medium text-gray-900">
                        {{ auth()->user()->full_name }}

                    </div>
                    <div class=" text-gray-500 text-ellipsis overflow-hidden w-32 text-sm">
                        {{ auth()->user()->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
