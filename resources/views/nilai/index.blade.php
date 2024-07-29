@extends('layouts.layout')

@section('content')
    <div class="container-index w-full h-[100vh] overflow-hidden">
        <div class="flex flex-col gap-5 ">
            <a href="{{ route('nilai.modul') }}"
                class="shadow-md py-3 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                <div class="flex gap-4">
                    <img src="{{ asset('assets/icons/prinsip.png') }}" class="w-52 object-contain" alt="">
                    <div class="flex justify-between items-center w-full">
                        <div class="flex flex-col">
                            <p class="text-base text-grayScale-400">Modul Prinsip Pengajaran</p>
                            <h1 class="text-xl font-semibold">Modul 1: Praktik Coaching di Satuan Pendidikan</h1>
                        </div>
                        <div class="flex relative">
                            <div class="group relative">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Raisa Andriani</p>
                                </div>
                            </div>
                            <div class="group relative -ml-2">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Ahmad Akbar</p>
                                </div>
                            </div>
                            <div class="group relative -ml-2">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Ahmad Akbar</p>
                                </div>
                            </div>
                            <div class="group relative -ml-2">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Ahmad Akbar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('nilai.prinsip') }}"
                class="shadow-md py-3 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                <div class="flex gap-4">
                    <img src="{{ asset('assets/icons/prinsip.png') }}" class="w-52 object-contain" alt="">
                    <div class="flex justify-between items-center w-full">
                        <div class="flex flex-col">
                            <p class="text-base text-grayScale-400">Modul Prinsip Pengajaran</p>
                            <h1 class="text-xl font-semibold">Modul 2: Praktik Coaching di Satuan Pendidikan</h1>
                        </div>
                        <div class="flex relative">
                            <div class="group relative">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Raisa Andriani</p>
                                </div>
                            </div>
                            <div class="group relative -ml-2">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Ahmad Akbar</p>
                                </div>
                            </div>
                            <div class="group relative -ml-2">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Ahmad Akbar</p>
                                </div>
                            </div>
                            <div class="group relative -ml-2">
                                <img src="{{ asset('assets/images/profile/default.png') }}"
                                    class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                    alt="">
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                    <p class="text-xs">Ahmad Akbar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
