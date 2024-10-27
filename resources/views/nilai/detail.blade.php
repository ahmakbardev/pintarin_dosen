@extends('layouts.layout')

@section('content')
    <div class="flex container-index w-full py-0">
        <div class="flex-1 p-8">
            <div class="flex items-center mb-4">
                <a href="javascript:history.back()" class="text-primary font-semibold flex items-center">
                    <i data-feather="arrow-left" class="mr-2"></i> Kembali
                </a>
                <div class="flex flex-col items-start ml-10">
                    <h1 class="text-2xl font-bold">Tugas {{ $taskDetail->user_name }}</h1>
                </div>
            </div>
            <div class="flex flex-col gap-3 mb-4">
                <label class="text-lg">Nama</label>
                <p class="text-lg font-semibold">{{ $taskDetail->user_name }}</p>
            </div>
            <div class="flex flex-col gap-3 mb-10">
                <label class="text-lg">NIM</label>
                <p class="text-lg font-semibold">{{ $taskDetail->nim }}</p>
            </div>
            <div class="mb-10 flex flex-col gap-3">
                <embed src="{{ asset('storage/' . $taskDetail->pdf_path) }}" type="application/pdf" width="100%"
                    height="600px" class="rounded-lg shadow-md" />
            </div>
        </div>
        <div class="min-w-72 max-w-md sticky top-32 h-full p-8 border-l">
            <form method="POST" action="{{ route('nilai.storeDetail', $taskDetail->id) }}">
                @csrf
                <div class="flex flex-col gap-10 py-5">
                    <div class="mb-6 w-full">
                        <h1 class="text-xl font-bold">Kriteria Penilaian</h1>
                        <div class="mt-4 flex flex-col gap-4">
                            @foreach ($kriteriaPenilaian as $index => $kriteria)
                                <div>
                                    <label class="text-sm">Kriteria ke-{{ $index + 1 }}: {{ $kriteria }}</label>
                                    <input type="hidden" name="kriteria_nilai[{{ $index }}][kriteria]"
                                        value="{{ $kriteria }}">
                                    <input type="number" name="kriteria_nilai[{{ $index }}][nilai]"
                                        class="w-full px-3 py-2 bg-gray-100 border-b focus:outline-none number-input"
                                        placeholder="Masukkan nilai"
                                        value="{{ isset($nilai[$index]['nilai']) ? $nilai[$index]['nilai'] : '' }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full text-end">
                        <button
                            class="py-3 px-5 text-lg w-full bg-primary text-white rounded-lg hover:ring transition-all ease-in-out"
                            type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(event) {
                var isValid = true;
                $('.number-input').each(function() {
                    var nilai = $(this).val();
                    if (nilai > 100) {
                        isValid = false;
                        alert('Nilai tidak boleh lebih dari 100!');
                        $(this).focus();
                        return false; // Break loop
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
