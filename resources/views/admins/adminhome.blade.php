<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Home') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-wrap -m-4 text-center ">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{route('usersIndex')}}">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white hover:bg-green-100">
                            <svg fill=" none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                            </svg>
                            <h2 class="title-font font-medium text-xl text-gray-900">{{$userCount}}</h2>
                            <p class="leading-relaxed">Users</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Cards -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                <div class="flex items-center p-1 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-4 w-full">
                        <div class="container px-5 mx-auto" id="chart">
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-1 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-4 w-full">
                        <div class="container px-5 mx-auto" id="chart2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>