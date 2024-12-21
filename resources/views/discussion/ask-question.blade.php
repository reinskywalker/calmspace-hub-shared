<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajukan Pertanyaan') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto px-5 py-10">
                <div class="text-center mb-10">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-4">Ajukan Pertanyaan</h1>
                    <p class="text-base leading-relaxed text-gray-500">Isi formulir berikut untuk mengajukan pertanyaan Anda ke forum diskusi.</p>
                </div>

                <form method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="question_title" class="block text-gray-700 font-medium mb-2">Judul Pertanyaan</label>
                        <input type="text" id="question_title" name="title" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan judul pertanyaan" required>
                    </div>

                    <div class="mb-6">
                        <label for="question_description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                        <textarea id="question_description" name="description" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 wysiwyg-editor" rows="5" placeholder="Tulis deskripsi pertanyaan Anda" required></textarea>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="javascript:history.back()" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Kembali</a>
                        <button type="submit" class="bg-indigo-500 text-white px-6 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('question_description', {
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
    </script>
</x-app-layout>
