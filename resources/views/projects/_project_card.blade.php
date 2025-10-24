@if ($project->status == 'active')
    <div
        class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full transform hover:-translate-y-2 transition-transform duration-300">
        <a href="{{ route('projects.show', $project->slug) }}" class="block">
            <img class="h-56 w-full object-cover" src="https://picsum.photos/seed/{{ $project->id }}/600/400"
                alt="Foto Proyek {{ $project->title }}">
        </a>
        <div class="p-6 flex flex-col flex-grow">
            <a href="{{ $project->location }}" target="_blank" rel="noopener noreferrer"
                class="inline-flex items-center text-sm font-semibold text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                Lihat Lokasi
            </a>
            <h3 class="text-xl font-bold mt-2 mb-2 text-gray-800">{{ $project->title }}</h3>
            <div>
                @php
                    $progress = min(
                        100,
                        $project->target_trees > 0 ? ($project->total_trees / $project->target_trees) * 100 : 0,
                    );
                @endphp
                <div class="flex justify-between mb-1">
                    <span class="text-sm font-medium text-green-700">Terkumpul</span>
                    <span class="text-sm font-medium text-green-700">{{ round($progress) }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $progress }}%"></div>
                </div>
                <div class="flex justify-between text-sm mt-2 text-gray-600">
                    <span>{{ number_format($project->total_trees ?? 0, 0, ',', '.') }} pohon</span>
                    <span class="text-gray-500">Target:
                        {{ number_format($project->target_trees, 0, ',', '.') }}</span>
                </div>
            </div>
            <p class="text-gray-600 text-sm h-16 flex-grow">{{ Str::limit($project->short_description, 120) }}</p>
            <div class="mt-6">
                <a href="{{ route('projects.show', $project->slug) }}"
                    class="inline-block bg-green-600 text-white font-semibold py-2 px-5 rounded-lg hover:bg-green-700 transition-colors duration-300">
                    Dukung Proyek Ini
                </a>
            </div>
        </div>
    </div>
@elseif ($project->status == 'completed')
    <div
        class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full transform hover:-translate-y-2 transition-transform duration-300">
        <div class="relative">
            <a href="{{ route('projects.show', $project->slug) }}" class="block">
                <img class="h-56 w-full object-cover" src="https://picsum.photos/seed/{{ $project->id }}/600/400"
                    alt="Foto Proyek {{ $project->title }}">
            </a>
            <span
                class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                SELESAI
            </span>
        </div>
        <div class="p-6 flex flex-col flex-grow">
            <a href="{{ $project->location }}" target="_blank" rel="noopener noreferrer"
                class="inline-flex items-center text-sm font-semibold text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                Lihat Lokasi
            </a>
            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $project->title }}</h3>
            <div>
                @php
                    $progress = min(
                        100,
                        $project->target_trees > 0 ? ($project->total_trees / $project->target_trees) * 100 : 0,
                    );
                @endphp
                <div class="flex justify-between mb-1">
                    <span class="text-sm font-medium text-green-700">Terkumpul</span>
                    <span class="text-sm font-medium text-green-700">{{ round($progress) }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $progress }}%"></div>
                </div>
                <div class="flex justify-between text-sm mt-2 text-gray-600">
                    <span>{{ number_format($project->total_trees ?? 0, 0, ',', '.') }} pohon</span>
                    <span class="text-gray-500">Target:
                        {{ number_format($project->target_trees, 0, ',', '.') }}</span>
                </div>
            </div>
            <p class="text-gray-600 text-sm h-16 flex-grow">{{ Str::limit($project->short_description, 120) }}</p>
            <div class="mt-6">
                <a href="{{ route('projects.show', $project->slug) }}"
                    class="inline-block bg-gray-800 text-white font-semibold py-2 px-5 rounded-lg hover:bg-gray-700 transition-colors duration-300">
                    Lihat Hasil Proyek
                </a>
            </div>
        </div>
    </div>
@elseif ($project->status == 'pending')
    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full">
        <div class="relative">
            <img class="h-56 w-full object-cover filter grayscale"
                src="https://picsum.photos/seed/{{ $project->id }}/600/400" alt="Foto Proyek {{ $project->title }}">
            <div class="absolute inset-0 bg-gray-700/60 flex items-center justify-center">
                <span class="text-white text-2xl font-bold tracking-widest">SEGERA HADIR</span>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-grow">
            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $project->title }}</h3>
            <p class="text-gray-600 text-sm h-16 flex-grow">{{ Str::limit($project->short_description, 120) }}</p>
            <div class="mt-6">
                <button disabled
                    class="w-full inline-block bg-gray-300 text-gray-500 font-semibold py-2 px-5 rounded-lg cursor-not-allowed">
                    Nantikan
                </button>
            </div>
        </div>
    </div>
@endif
