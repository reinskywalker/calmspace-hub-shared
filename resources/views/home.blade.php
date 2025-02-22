@if(Auth::check())
<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Guided Meditation Hub') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto">

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-5 mx-auto">
                        @php
                        $publishedArticles = $articles->filter(function ($article) {
                        return $article->status === 'published';
                        });
                        @endphp

                        @if($publishedArticles->count() > 0)
                        <div class="flex flex-wrap -m-4 text-center">
                            @foreach ($publishedArticles as $article)
                            <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white flex flex-col h-full" style="height: 400px;">
                                    <img src="{{ asset($article->thumbnail_image_url) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover mb-4" style="height: 200px; object-fit: cover;">
                                    <div class="flex flex-col flex-grow">
                                        <h2 class="title-font font-medium text-2xl text-gray-900">{{ $article->title }}</h2>
                                        <p class="leading-relaxed mt-4 flex-grow overflow-hidden">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                                    </div>
                                    <a href="{{ route('articles.show', $article->id) }}" class="text-indigo-500 inline-flex items-center mt-4">
                                        Read More
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            @endforeach
                        </div>
                        @else
                        <!-- Video Section -->
                        <div class="flex flex-wrap justify-center gap-6 mt-10">
                            <!-- Video 1 -->
                            <div class="w-full sm:w-1/2 md:w-1/3 bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                                <video class="w-full h-auto object-cover rounded-lg shadow-lg" controls>
                                    <source src="{{ asset('videos/video_1.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <!-- Video 2 -->
                            <div class="w-full sm:w-1/2 md:w-1/3 bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                                <video class="w-full h-auto object-cover rounded-lg shadow-lg" controls>
                                    <source src="{{ asset('videos/video_2.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>

                        @endif
                        <div class="mt-4">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
@else
<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Welcome to Calmspace') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto">

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-10 mx-auto">
                        <div class="text-center mb-10">
                            <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-4">Your Path to Mental Wellness</h1>
                            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">Calmspace is here to support your mental health journey with tools, resources, and a supportive community.</p>
                        </div>

                        <!-- Video Section -->
                        <div class="relative w-full h-40 bg-gray-700 flex items-center justify-center mt-16 overflow-hidden">
                            <video class="w-full h-full object-cover opacity-100 rounded-lg shadow-lg" autoplay loop muted playsinline>
                                <source src="{{ asset('images/mental-video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 text-center">
                            <!-- Feature 1 -->
                            <div class="p-4 flex justify-center items-center">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white w-full h-full flex flex-col justify-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m0 4v1m0 4v1m0 4v1m0 4v1m0-10H5.5m13 0H18" />
                                    </svg>
                                    <h2 class="title-font font-medium text-2xl text-gray-900">Track Daily Mood</h2>
                                    <p class="leading-relaxed">Easily log your mood every day and monitor patterns over time.</p>
                                </div>
                            </div>

                            <!-- Feature 2 -->
                            <div class="p-4 flex justify-center items-center">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white w-full h-full flex flex-col justify-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M12 9v6m-7 6h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <h2 class="title-font font-medium text-2xl text-gray-900">Monthly Mood Reports</h2>
                                    <p class="leading-relaxed">Generate detailed reports to understand your emotional trends.</p>
                                </div>
                            </div>

                            <!-- Feature 3 -->
                            <div class="p-4 flex justify-center items-center">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white w-full h-full flex flex-col justify-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" />
                                    </svg>
                                    <h2 class="title-font font-medium text-2xl text-gray-900">Community Support</h2>
                                    <p class="leading-relaxed">Join a community of people supporting each other's mental health.</p>
                                </div>
                            </div>

                            <!-- Feature 4 -->
                            <div class="p-4 flex justify-center items-center">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white w-full h-full flex flex-col justify-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3.866 0-7 1.791-7 4v3h14v-3c0-2.209-3.134-4-7-4zm0 10a4 4 0 100-8 4 4 0 000 8z" />
                                    </svg>
                                    <h2 class="title-font font-medium text-2xl text-gray-900">Guided Meditations</h2>
                                    <p class="leading-relaxed">Calm your mind with expert-led meditations tailored to your needs.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 text-center">
                            <a href="#" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Get Started</a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
@endif