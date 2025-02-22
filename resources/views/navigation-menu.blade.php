<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="/" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>

                    @if(Auth::check())
                    <x-jet-nav-link href="{{ route('mood.index') }}" :active="request()->routeIs('mood.index')">
                        {{ __('Mood Tracking') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('mood.report') }}" :active="request()->routeIs('mood.report')">
                        {{ __('Mood Report') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('discussion.forum-discussion') }}" :active="request()->routeIs('discussion.forum-discussion')">
                        {{ __('Forum Discussion') }}
                    </x-jet-nav-link>

                    @hasrole('admin')
                    <x-jet-nav-link href="{{ route('approval') }}" :active="request()->routeIs('approval')">
                        {{ __('Approval') }}
                    </x-jet-nav-link>
                    @endhasrole
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown (Desktop View) -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    @if(Auth::check())
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <div class="block rounded-md px-4 py-2 text-xs text-gray-800 flex items-center border border-gray-300">
                                    <img class="h-8 w-8 object-cover rounded-full mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    {{ Auth::user()->name }}
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @hasrole('admin')
                            <x-jet-dropdown-link href="{{ route('masterdata') }}">
                                {{ __('Admin Panel') }}
                            </x-jet-dropdown-link>
                            @endhasrole

                            <div class="border-t border-gray-100"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    @else
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        Login or Register?
                    </a>
                    @endif
                </div>
            </div>

            <!-- Hamburger (Mobile View) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if(Auth::check())
            <div class="flex items-center px-4">
                <div class="flex-shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="w-full flex justify-center py-4">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Login or Register?
                </a>
            </div>
            @endif
        </div>
    </div>
</nav>