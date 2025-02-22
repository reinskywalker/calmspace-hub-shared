<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Forum Diskusi') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto px-5 py-10">
                <div class="text-center mb-10">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-4">Forum Diskusi</h1>
                    <p class="text-base leading-relaxed text-gray-500">Bertanya dan berdiskusi dengan komunitas kami.</p>
                </div>

                <div class="mb-10">
                    <form class="flex items-center" action="{{ route('discussion.ask-question') }}" method="GET">
                        <input type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Ketik pertanyaan Anda...">
                        <button type="submit"
                            class="ml-3 bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">
                            Tanya
                        </button>
                    </form>
                </div>

                <div class="divide-y divide-gray-300">
                    @foreach ($articles as $article)
                    <div class="p-6 border border-gray-300 rounded-lg bg-gray-50 mb-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $article->title }}</h3>
                        <p class="text-gray-700">{!! Str::limit(strip_tags($article->content), 100) !!}</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500">Lihat diskusi</a>
                    </div>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>