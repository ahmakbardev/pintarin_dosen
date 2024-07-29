@extends('layouts.layout')

@section('content')
    <div class="container-index w-full h-[100vh] overflow-hidden" data-simplebar>
        <div class="flex flex-col gap-5">
            <div class="flex justify-between items-center px-6 py-4 border-b border-grayScale-300">
                <button class="text-primary font-semibold flex items-center">
                    <i data-feather="arrow-left" class="mr-2"></i> Kembali
                </button>
                <h1 class="text-xl font-bold">Progres Belajar</h1>
            </div>
            <div class="overflow-auto">
                <table class="min-w-full bg-white border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-6 bg-grayScale-100 border-b border-grayScale-300 text-left text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                Nama</th>
                            <th
                                class="py-3 px-6 bg-grayScale-100 border-b border-grayScale-300 text-left text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                Rata-rata</th>
                            <th
                                class="py-3 px-6 bg-grayScale-100 border-b border-grayScale-300 text-left text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                Tugas 1<br>Tugas Kepemimpinan</th>
                            <th
                                class="py-3 px-6 bg-grayScale-100 border-b border-grayScale-300 text-left text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                Tugas 2<br>Tugas Kompetensi</th>
                            <th
                                class="py-3 px-6 bg-grayScale-100 border-b border-grayScale-300 text-left text-xs font-semibold text-grayScale-600 uppercase tracking-wider">
                                Tugas 3<br>Tugas Pendidikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4 px-6 border-b border-grayScale-300">
                                <div class="flex items-center">
                                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                                        class="w-10 h-10 rounded-full mr-4">
                                    <div>
                                        <p class="text-sm font-semibold text-grayScale-700">Raisa Andriani</p>
                                        <p class="text-xs text-grayScale-500">139009287</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-lg font-semibold text-primary">89.3</p>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">95/100</p>
                                <p class="text-xs text-green-500">Dikumpulkan Tepat Waktu</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">75/100</p>
                                <p class="text-xs text-red-500">Dikumpulkan Telat</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">0</p>
                                <p class="text-xs text-grayScale-500">Belum Mengumpulkan</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded" disabled>Lihat
                                    Tugas</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 border-b border-grayScale-300">
                                <div class="flex items-center">
                                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                                        class="w-10 h-10 rounded-full mr-4">
                                    <div>
                                        <p class="text-sm font-semibold text-grayScale-700">Putri Nabila</p>
                                        <p class="text-xs text-grayScale-500">139009287</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-lg font-semibold text-primary">89.3</p>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">95/100</p>
                                <p class="text-xs text-green-500">Dikumpulkan Tepat Waktu</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">75/100</p>
                                <p class="text-xs text-red-500">Dikumpulkan Telat</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-grayScale-500">Belum Dinilai</p>
                                <p class="text-xs text-green-500">Dikumpulkan Tepat Waktu</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded" disabled>Lihat
                                    Tugas</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 border-b border-grayScale-300">
                                <div class="flex items-center">
                                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                                        class="w-10 h-10 rounded-full mr-4">
                                    <div>
                                        <p class="text-sm font-semibold text-grayScale-700">Raisa Andriani</p>
                                        <p class="text-xs text-grayScale-500">139009287</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-lg font-semibold text-primary">89.3</p>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">95/100</p>
                                <p class="text-xs text-green-500">Dikumpulkan Tepat Waktu</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">75/100</p>
                                <p class="text-xs text-red-500">Dikumpulkan Telat</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">0</p>
                                <p class="text-xs text-grayScale-500">Belum Mengumpulkan</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded" disabled>Lihat
                                    Tugas</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 border-b border-grayScale-300">
                                <div class="flex items-center">
                                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                                        class="w-10 h-10 rounded-full mr-4">
                                    <div>
                                        <p class="text-sm font-semibold text-grayScale-700">Raisa Andriani</p>
                                        <p class="text-xs text-grayScale-500">139009287</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-lg font-semibold text-primary">89.3</p>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">95/100</p>
                                <p class="text-xs text-green-500">Dikumpulkan Tepat Waktu</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">75/100</p>
                                <p class="text-xs text-red-500">Dikumpulkan Telat</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded">Lihat
                                    Tugas</button>
                            </td>
                            <td class="py-4 px-6 border-b border-grayScale-300 text-center">
                                <p class="text-sm font-semibold text-primary">0</p>
                                <p class="text-xs text-grayScale-500">Belum Mengumpulkan</p>
                                <button class="mt-2 text-xs py-1 px-3 bg-grayScale-200 text-grayScale-700 hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out hover:font-medium rounded" disabled>Lihat
                                    Tugas</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
