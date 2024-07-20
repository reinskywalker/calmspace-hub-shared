<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Your Articles') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto">

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-5 mx-auto">
                        <div class="flex flex-wrap -m-4 text-center">
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
                                    <img src="{{ asset('images/dummy_image.jpg') }}" class="card-img-top img-fluid" alt="Dummy Image">
                                    <p class="leading-relaxed">Migrasikan Infrastruktur IT Anda ke Cloud Anda dengan AWS dan Elitery</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>