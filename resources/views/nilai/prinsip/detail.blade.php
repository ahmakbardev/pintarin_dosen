@extends('layouts.layout')

@section('content')
    <div class="flex container-index w-full py-0">
        <div class="flex-1 p-8">
            <div class="flex items-center mb-4">
                <button class="text-primary font-semibold flex items-center">
                    <i data-feather="arrow-left" class="mr-2"></i> Kembali
                </button>
                <div class="flex flex-col items-start ml-10">
                    <p>Tugas 2<br></p>
                    <h1 class="text-2xl font-bold">Tugas Kepemimpinan</h1>
                </div>
            </div>
            <div class="flex flex-col gap-3 mb-4">
                <label class="text-lg">Nama</label>
                <p class="text-lg font-semibold">Raisa Andriani</p>
            </div>
            <div class="flex flex-col gap-3 mb-10">
                <label class="text-lg">NIM</label>
                <p class="text-lg font-semibold">139009287</p>
                <p class="text-sm text-gray-500"></p>
            </div>
            <div class="mb-10 flex flex-col gap-3">
                <embed src="{{ asset('assets/pdf/default-pdf.pdf') }}" type="application/pdf" width="100%" height="600px"
                    class="rounded-lg shadow-md" />
            </div>
        </div>
        <div class="min-w-72 max-w-md sticky top-32 h-full p-8 border-l">
            <div class="flex flex-col gap-10 py-5">
                <div class="mb-6 w-full">
                    <h1 class="text-xl font-bold">Kriteria Penilaian</h1>
                    <div class="mt-4 flex flex-col gap-4">
                        <div>
                            <label class="text-sm">Detail Tulisan</label>
                            <input type="text" class="w-full px-3 py-2 bg-gray-100 border-b focus:outline-none number-input"
                                placeholder="Masukkan nilai">
                        </div>
                        <div>
                            <label class="text-sm">Tata Bahasa</label>
                            <input type="text" class="w-full px-3 py-2 bg-gray-100 border-b focus:outline-none number-input"
                                placeholder="Masukkan nilai">
                        </div>
                        <div>
                            <label class="text-sm">Originalitas</label>
                            <input type="text" class="w-full px-3 py-2 bg-gray-100 border-b focus:outline-none number-input"
                                placeholder="Masukkan nilai">
                        </div>
                    </div>
                </div>
                <div class="w-full text-end">
                    <button
                        class="py-3 px-5 text-lg w-full bg-primary text-white rounded-lg hover:ring transition-all ease-in-out"
                        id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Simpan -->
    <div id="saveModal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Simpan Nilai</h2>
            <p class="text-center mb-4">Apakah Anda yakin ingin menyimpan nilai ini?</p>
            <div class="flex justify-end gap-3">
                <button type="button" id="closeSaveModal"
                    class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                <button type="button"
                    class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numberInputs = document.querySelectorAll('.number-input');
            const saveButton = document.getElementById('saveButton');
            const saveModal = document.getElementById('saveModal');
            const closeSaveModal = document.getElementById('closeSaveModal');

            numberInputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            });

            saveButton.addEventListener('click', function() {
                saveModal.classList.remove('opacity-0', 'pointer-events-none');
                requestAnimationFrame(() => {
                    saveModal.classList.add('opacity-100');
                    saveModal.querySelector('> div').classList.remove('translate-y-10');
                    saveModal.querySelector('> div').classList.add('translate-y-0');
                });
            });

            closeSaveModal.addEventListener('click', function() {
                saveModal.classList.add('opacity-0', 'pointer-events-none');
                saveModal.classList.remove('opacity-100');
                saveModal.querySelector('> div').classList.add('translate-y-10');
                saveModal.querySelector('> div').classList.remove('translate-y-0');
            });
        });
    </script>
@endsection
