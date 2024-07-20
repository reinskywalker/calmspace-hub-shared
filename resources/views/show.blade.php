<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article Detail') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto p-6">
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $article->title }}</h1>
                    <p class="text-gray-600 mb-4">Posted by: {{ $article->posted_by }} on {{ $article->created_at->format('F d, Y') }}</p>
                    <div class="mb-6 flex justify-center">
                        <img src="{{ asset('images/dummy_image.jpg') }}" alt="{{ $article->title }}" class="w-64 h-full object-cover rounded-lg shadow-md">
                    </div>
                    <div class="prose max-w-full text-gray-700 mb-6">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                    @if ($article->audio_video_url)
                    <div class="mb-6">
                        @if (Str::contains($article->audio_video_url, 'youtube.com') || Str::contains($article->audio_video_url, 'youtu.be'))
                        @php
                        // Extract the YouTube video ID
                        $video_id = '';
                        if (Str::contains($article->audio_video_url, 'youtube.com')) {
                        $video_id = Str::after(parse_url($article->audio_video_url, PHP_URL_QUERY), 'v=');
                        } else {
                        $video_id = Str::afterLast($article->audio_video_url, '/');
                        }
                        @endphp
                        <iframe class="w-full h-64 rounded-lg shadow-md" src="https://www.youtube.com/embed/{{ $video_id }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @elseif (Str::contains($article->audio_video_url, 'vimeo.com'))
                        @php
                        // Extract the Vimeo video ID
                        $video_id = Str::afterLast($article->audio_video_url, '/');
                        @endphp
                        <iframe class="w-full h-64 rounded-lg shadow-md" src="https://player.vimeo.com/video/{{ $video_id }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        @else
                        <audio controls class="w-full">
                            <source src="{{ $article->audio_video_url }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>