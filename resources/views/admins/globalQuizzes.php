<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Global Quiz Home') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto">
                <div class="flex justify-between items-center py-4">
                    <a href="{{route('beginTest')}}" class=" tracking-wide font-bold rounded border-2 border-blue-500 hover:border-blue-500 bg-blue-500 text-white hover:bg-blue-600 transition shadow-md py-1 px-6 items-center">Take a New Quiz</a>
                    <p class="tracking-wide font-bold rounded @if(round($quizAverage,2)<70) bg-red-500 @endif  @if(round($quizAverage,2)>=70) bg-blue-600 @endif text-white shadow-md py-2 px-6 items-center">Average Score: <span class="mx-2"> {{round($quizAverage,2) .'%'}}</span></p>
                </div>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-5 mx-auto">
                        <div class="flex flex-wrap -m-4 text-center">
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
        
                            </div>
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                                    </svg>
                                    <h2 class="title-font font-medium text-xl text-gray-900">{{$activeUsers}}</h2>
                                    <p class="leading-relaxed">Users</p>
                                </div>
                            </div>
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path>
                                    </svg>
                                    <h2 class="title-font font-medium text-xl text-gray-900">{{$questionsCount}}</h2>
                                    <p class="leading-relaxed">Questions</p>
                                </div>
                            </div>
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <h2 class="title-font font-medium text-xl text-gray-900">{{$quizesTaken}}</h2>
                                    <p class="leading-relaxed">Quizzes Taken</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="text-gray-600 body-font">
                    <div class="p-4 w-full">
                        <div class="container px-5 py-5 mx-auto" id="chart">
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

</x-app-layout>