@extends('layouts.layout')

@section('content')
    <div class="container-index w-full h-[100vh] overflow-hidden" data-simplebar>
        <div class="flex flex-col gap-5">
            <div class="flex justify-between items-center px-6 py-4 border-b border-grayScale-300">
                <a href="{{ route('nilai.index') }}" class="text-primary font-semibold flex items-center">
                    <i data-feather="arrow-left" class="mr-2"></i> Kembali
                </a>
                <h1 class="text-xl font-bold capitalize">Progres Belajar - {{ $modul->name ?? 'Modul Dinamis' }}</h1>
            </div>
            <div class="overflow-auto">
                @if ($progress->isEmpty())
                    <div class="text-center py-10">
                        <p class="text-gray-500 text-lg">Belum ada pengguna yang mengumpulkan tugas untuk modul ini.</p>
                    </div>
                @else
                    <table class="min-w-full bg-white border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-3 px-6 bg-grayScale-100 border-b border-grayScale-300 text-left text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th
                                    class="py-3 px-6 text-center bg-grayScale-100 border-b border-grayScale-300 text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                    Rata-rata
                                </th>

                                <!-- Kolom Tugas -->
                                @foreach ($tasks as $task)
                                    <th
                                        class="py-3 px-6 text-center bg-grayScale-100 border-b border-grayScale-300 text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                        Tugas {{ $task->title }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($filteredProgress as $row)
                                <tr>
                                    <td class="py-4 px-6 border-b border-grayScale-300">{{ $row->user_name }}</td>
                                    <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                        {{ $row->average_score ?? 'N/A' }}
                                    </td>

                                    <!-- Kolom Nilai Tugas -->
                                    @foreach ($tasks as $task)
                                        <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                            @if ($row->tugas_progress_id)
                                                <a href="{{ route('nilai.detail', ['modul_id' => $modul->id, 'tugas_progress_id' => $row->tugas_progress_id]) }}"
                                                    class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">
                                                    Lihat Tugas
                                                </a>
                                            @else
                                                <p class="text-xs text-red-500">Belum Ada Tugas</p>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ 2 + $tasks->count() }}" class="py-4 text-center text-gray-500">
                                        Belum ada pengguna yang mengumpulkan tugas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
