<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Track Your Mood') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto">
                @if ($alreadySubmitted)
                <div class="p-4 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg bg-white text-center">
                        <h2 class="title-font font-medium text-2xl text-gray-900">You did great!</h2>
                        <p class="leading-relaxed">You submitted today's mood.</p>
                        <p class="text-xl mt-4">
                            Your Mood Today:
                            @foreach ($submittedMoods as $submission)
                            {{ $submission->mood->emoji ?? '❓' }}
                            @endforeach
                        </p>

                        <button onclick="document.getElementById('mood-form').classList.toggle('hidden')"
                            class="mt-4 px-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-700 focus:outline-none">
                            Feel something? Add another mood
                        </button>
                    </div>
                </div>

                <div id="mood-form" class="hidden">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto">
                            <div class="text-center mb-10">
                                <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-4">Select Another Mood</h1>
                                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">You can add multiple moods throughout the day.</p>
                            </div>

                            <form method="POST" action="{{ route('mood.track') }}">
                                @csrf
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                                    @foreach ($moods as $mood)
                                    <button type="submit" name="mood_code" value="{{ $mood->id }}"
                                        class="p-4 flex flex-col items-center justify-center border-2 border-gray-200 rounded-lg bg-white hover:bg-indigo-100 focus:outline-none">
                                        <div class="text-4xl mb-2">
                                            {{ $mood->emoji ?? '❓' }}
                                        </div>
                                        <span class="text-xl font-medium text-gray-900">{{ $mood->name }}</span>
                                    </button>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
                @else
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-10 mx-auto">
                        <div class="text-center mb-10">
                            <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-4">Select Your Mood</h1>
                            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">Tap on the emoji that best represents your mood today.</p>
                        </div>

                        <form method="POST" action="{{ route('mood.track') }}">
                            @csrf
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                                @foreach ($moods as $mood)
                                <button type="submit" name="mood_code" value="{{ $mood->id }}"
                                    class="p-4 flex flex-col items-center justify-center border-2 border-gray-200 rounded-lg bg-white hover:bg-indigo-100 focus:outline-none">
                                    <div class="text-4xl mb-2">
                                        {{ $mood->emoji ?? '❓' }}
                                    </div>
                                    <span class="text-xl font-medium text-gray-900">{{ $mood->name }}</span>
                                </button>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </section>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>