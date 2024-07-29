@extends('layouts.layout')

@section('content')
    <div class="container-index mx-auto py-6 grid grid-cols-2 gap-3 h-fit">
        <div class="grid grid-cols-2 h-fit gap-6">
            <!-- Info Cards -->
            <div class="bg-blue-50 p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold text-gray-700">MODUL</h2>
                <p class="text-4xl font-bold text-blue-600 mt-2">10</p>
                <a href="#" class="text-blue-600 underline mt-4 block">Cek seluruh modul</a>
            </div>
            <div class="bg-blue-50 p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold text-gray-700">POST-TEST</h2>
                <p class="text-4xl font-bold text-blue-600 mt-2">10</p>
                <a href="#" class="text-blue-600 underline mt-4 block">Cek seluruh post-test</a>
            </div>
            <div class="bg-blue-50 p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold text-gray-700">MATERI</h2>
                <p class="text-4xl font-bold text-blue-600 mt-2">23</p>
                <a href="#" class="text-blue-600 underline mt-4 block">Cek seluruh materi</a>
            </div>
            <div class="bg-blue-50 p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold text-gray-700">LATIHAN</h2>
                <p class="text-4xl font-bold text-blue-600 mt-2">23</p>
                <a href="#" class="text-blue-600 underline mt-4 block">Cek seluruh latihan</a>
            </div>
        </div>

        <!-- Active Students -->
        <div class="bg-white p-6 rounded-lg shadow-md h-full" data-simplebar style="max-height: 300px;">
            <h2 class="text-lg font-bold text-gray-700 mb-4">Mahasiswa Teraktif</h2>
            <div class="space-y-4 overflow-y-auto">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                        class="w-12 h-12 rounded-full">
                    <div>
                        <p class="text-sm font-bold">Itamara Shofinia Weladis Aini</p>
                        <p class="text-xs text-gray-500">8 Modul 5 Post-Test 16 Materi 12 Latihan</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                        class="w-12 h-12 rounded-full">
                    <div>
                        <p class="text-sm font-bold">Itamara Shofinia Weladis Aini</p>
                        <p class="text-xs text-gray-500">8 Modul 5 Post-Test 16 Materi 12 Latihan</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                        class="w-12 h-12 rounded-full">
                    <div>
                        <p class="text-sm font-bold">Itamara Shofinia Weladis Aini</p>
                        <p class="text-xs text-gray-500">8 Modul 5 Post-Test 16 Materi 12 Latihan</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile"
                        class="w-12 h-12 rounded-full">
                    <div>
                        <p class="text-sm font-bold">Itamara Shofinia Weladis Aini</p>
                        <p class="text-xs text-gray-500">8 Modul 5 Post-Test 16 Materi 12 Latihan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lecturer Activity -->
        <div class="bg-white p-6 rounded-lg shadow-md col-span-2">
            <h2 class="text-lg font-bold text-gray-700 mb-4">Aktivitas Dosen</h2>
            <!-- Content for lecturer activity can be added here -->
        </div>
    </div>
@endsection
