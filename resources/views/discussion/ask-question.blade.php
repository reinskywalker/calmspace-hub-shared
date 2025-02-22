<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Buat Artikel Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto px-5 py-10">
                <div class="text-center mb-10">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-4">Buat Artikel Baru</h1>
                    <p class="text-base leading-relaxed text-gray-500">Tulis artikel baru untuk forum diskusi.</p>
                </div>

                <form method="POST" action="{{ route('articles.store') }}">
                    @csrf
                    <input type="hidden" name="author" value="{{ Auth::user()->name }}">

                    <div class="mb-6">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Judul Artikel</label>
                        <input type="text" name="title" id="title" required class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-gray-700 font-medium mb-2">Isi Artikel</label>
                        <textarea id="content" name="content" class="w-full border-gray-300 rounded-md shadow-sm" rows="5" required></textarea>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="javascript:history.back()" class="bg-gray-500 text-white px-6 py-2 rounded-md">Kembali</a>
                        <button type="submit" class="bg-indigo-500 text-white px-6 py-2 rounded-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('content', {
                toolbar: [{
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
                    },
                    {
                        name: 'styles',
                        items: ['Format']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    },
                ]
            });
        });

        document.querySelector('form').addEventListener('submit', function() {
            for (let instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });
    </script>
</x-app-layout>