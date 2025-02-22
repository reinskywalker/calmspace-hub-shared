<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mood Tracker Report') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mx-auto px-5 py-10">
                <div class="text-center mb-10">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-4">Mood Tracker</h1>
                    <p class="text-base leading-relaxed text-gray-500">Your mood trends and daily entries for {{ now()->format('F Y') }}.</p>
                </div>

                <!-- Line Chart -->
                <div class="mb-10">
                    <canvas id="moodChart"></canvas>
                </div>

                <!-- Calendar Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto border-collapse border border-gray-300 w-full text-center">
                        <thead class="bg-gray-100">
                            <tr>
                                @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                                <th class="border border-gray-300 px-4 py-2 font-bold text-gray-800">{{ $day }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $daysInMonth = now()->daysInMonth;
                            $firstDayOfMonth = now()->startOfMonth()->dayOfWeek;
                            $currentDay = 1;
                            @endphp
                            @for ($week = 0; $week < 6; $week++)
                                <tr>
                                @for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++)
                                    @if (($week===0 && $dayOfWeek < $firstDayOfMonth) || $currentDay> $daysInMonth)
                                    <td class="border border-gray-300 px-4 py-6 bg-gray-50"></td>
                                    @else
                                    @php
                                    $date = now()->format("Y-m-") . str_pad($currentDay, 2, '0', STR_PAD_LEFT);
                                    $isToday = ($date == $today);
                                    @endphp
                                    <td class="border border-gray-300 px-4 py-6 {{ $isToday ? 'bg-yellow-200' : 'bg-white' }}">
                                        <div class="font-bold text-lg text-gray-900">{{ $currentDay }}</div>
                                        <div class="text-gray-700 text-sm mt-2">
                                            @if(isset($moodData[$date]))
                                            @foreach($moodData[$date] as $mood)
                                            {{ $mood->mood->emoji ?? '❓' }}
                                            @endforeach
                                            @else
                                            <span class="text-gray-400">No mood</span>
                                            @endif
                                        </div>
                                    </td>
                                    @php $currentDay++; @endphp
                                    @endif
                                    @endfor
                                    </tr>
                                    @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('moodChart').getContext('2d');
        const moodChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {
                    !!json_encode(array_keys($moodScores)) !!
                },
                datasets: [{
                    label: 'Mood Level',
                    data: {
                        !!json_encode(array_values($moodScores)) !!
                    },
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Mood Trends for {{ now()->format("F Y") }}'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Day of the Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Mood Level (1-5)'
                        },
                        min: 1,
                        max: 5,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>