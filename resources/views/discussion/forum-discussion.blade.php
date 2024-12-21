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
                    <form class="flex items-center">
                        <input
                            type="text"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Ketik pertanyaan Anda...">
                        <button
                            type="submit"
                            href="{{ route('discussion.ask-question') }}"
                            class="ml-3 bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none">
                            Tanya
                        </button>
                    </form>
                </div>

                <!-- Discussion List -->
                <div class="divide-y divide-gray-300">
                    @php
                    $discussions = [
                    [
                    'question' => 'Bagaimana cara mengelola stres saat bekerja?',
                    'answers' => [
                    'Cobalah teknik pernapasan dalam untuk relaksasi.',
                    'Luangkan waktu untuk istirahat dan berjalan-jalan sejenak.',
                    'Berbicara dengan teman atau terapis dapat membantu.'
                    ],
                    ],
                    [
                    'question' => 'Apa tips untuk menjaga kesehatan mental selama pandemi?',
                    'answers' => [
                    'Tetap terhubung dengan keluarga dan teman melalui video call.',
                    'Jaga rutinitas harian yang sehat seperti olahraga dan tidur cukup.',
                    'Batasi konsumsi berita jika merasa cemas.'
                    ],
                    ],
                    [
                    'question' => 'Bagaimana cara menghadapi perasaan cemas yang berlebihan?',
                    'answers' => [
                    'Identifikasi penyebab kecemasan dan catat dalam jurnal.',
                    'Praktikkan mindfulness atau meditasi.',
                    'Konsultasikan dengan profesional jika kecemasan terus berlanjut.'
                    ],
                    ],
                    [
                    'question' => 'Apa yang bisa dilakukan untuk meningkatkan suasana hati yang buruk?',
                    'answers' => [
                    'Dengarkan musik favorit yang membuat Anda senang.',
                    'Cobalah aktivitas fisik ringan seperti yoga atau berjalan kaki.',
                    'Habiskan waktu di luar rumah untuk mendapatkan udara segar.'
                    ],
                    ],
                    [
                    'question' => 'Bagaimana cara membantu teman yang sedang depresi?',
                    'answers' => [
                    'Dengarkan mereka tanpa menghakimi.',
                    'Tawarkan dukungan dan tanyakan apa yang mereka butuhkan.',
                    'Dorong mereka untuk mencari bantuan profesional jika diperlukan.'
                    ],
                    ],
                    [
                    'question' => 'Bagaimana cara menjaga konsistensi dalam tracking mood?',
                    'answers' => [
                    'Gunakan aplikasi untuk mengingatkan Anda setiap hari.',
                    'Catat mood Anda pada waktu yang sama setiap hari.',
                    'Jadikan bagian dari rutinitas harian Anda.'
                    ],
                    ],
                    [
                    'question' => 'Apa manfaat menulis jurnal untuk kesehatan mental?',
                    'answers' => [
                    'Membantu menyalurkan emosi dan mengurangi stres.',
                    'Memberikan pemahaman yang lebih baik tentang pola pikir.',
                    'Membantu menyusun solusi untuk masalah yang dihadapi.'
                    ],
                    ],
                    [
                    'question' => 'Bagaimana cara memotivasi diri saat merasa lelah secara emosional?',
                    'answers' => [
                    'Tetapkan tujuan kecil yang mudah dicapai.',
                    'Berikan penghargaan pada diri sendiri setelah mencapai tujuan.',
                    'Bicaralah dengan seseorang yang dapat memberikan dukungan.'
                    ],
                    ],
                    [
                    'question' => 'Apa hubungan antara tidur yang cukup dengan mood?',
                    'answers' => [
                    'Tidur cukup membantu mengatur emosi dan mood.',
                    'Kurang tidur dapat meningkatkan risiko stres dan kecemasan.',
                    'Cobalah tidur selama 7-8 jam setiap malam.'
                    ],
                    ],
                    [
                    'question' => 'Bagaimana cara mengelola waktu untuk menjaga keseimbangan hidup?',
                    'answers' => [
                    'Prioritaskan tugas-tugas yang penting terlebih dahulu.',
                    'Tetapkan batas waktu untuk pekerjaan dan waktu istirahat.',
                    'Gunakan alat bantu seperti kalender atau aplikasi manajemen waktu.'
                    ],
                    ],
                    ];

                    $currentPage = request('page', 1);
                    $perPage = 5;
                    $paginatedDiscussions = array_slice($discussions, ($currentPage - 1) * $perPage, $perPage);
                    $totalPages = ceil(count($discussions) / $perPage);
                    @endphp

                    @foreach ($paginatedDiscussions as $discussion)
                    <div class="p-6 border border-gray-300 rounded-lg bg-gray-50 mb-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $discussion['question'] }}</h3>
                        <ul class="list-disc pl-6 text-gray-700">
                            @foreach ($discussion['answers'] as $answer)
                            <li class="mb-2">{{ $answer }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    <nav class="inline-flex -space-x-px" aria-label="Pagination">
                        @if ($currentPage > 1)
                        <a href="?page={{ $currentPage - 1 }}" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">&laquo; Prev</a>
                        @endif

                        @for ($i = 1; $i <= $totalPages; $i++)
                            <a href="?page={{ $i }}" class="px-3 py-2 border {{ $currentPage == $i ? 'bg-indigo-500 text-white' : 'bg-white text-gray-500 hover:bg-gray-100' }}">{{ $i }}</a>
                            @endfor

                            @if ($currentPage < $totalPages)
                                <a href="?page={{ $currentPage + 1 }}" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-100">Next &raquo;</a>
                                @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>