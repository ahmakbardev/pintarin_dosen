@extends('layouts.layout')

@section('content')
    <div class="container-index w-full h-fit overflow-hidden">
        <div class="flex flex-col gap-5 ">

            <!-- Bagian untuk Modul Prinsip -->
            <h2 class="text-2xl font-bold mb-4">Modul Prinsip</h2>
            @foreach ($prinsipModuls as $modul)
                <a href="{{ route('nilai.topic.index', [$modul->topic, $modul->id]) }}"
                    class="shadow-md py-3 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                    <div class="flex gap-4">
                        <img src="{{ asset('assets/icons/prinsip.png') }}" class="w-52 object-contain" alt="">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex flex-col">
                                <p class="text-base text-grayScale-400">Modul {{ ucfirst($modul->topic) }}</p>
                                <h1 class="text-xl font-semibold">{{ $modul->name }}</h1>
                            </div>
                            <div class="flex relative">
                                @foreach ($usersWithSubmission as $user)
                                    @if ($user->modul_id == $modul->id)
                                        <div class="group relative -ml-2">
                                            <img src="{{ asset('assets/images/profile/default.png') }}"
                                                class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                                alt="">
                                            <div
                                                class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                                <p class="text-xs">{{ $user->name }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            <!-- Bagian untuk Modul Pengembangan -->
            <h2 class="text-2xl font-bold mt-8 mb-4">Modul Pengembangan</h2>
            @foreach ($pengembanganModuls as $modul)
                <a href="{{ route('nilai.topic.index', [$modul->topic, $modul->id]) }}"
                    class="shadow-md py-3 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                    <div class="flex gap-4">
                        <img src="{{ asset('assets/icons/prinsip.png') }}" class="w-52 object-contain" alt="">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex flex-col">
                                <p class="text-base text-grayScale-400">Modul {{ ucfirst($modul->topic) }}</p>
                                <h1 class="text-xl font-semibold">{{ $modul->name }}</h1>
                            </div>
                            <div class="flex relative">
                                @foreach ($usersWithSubmission as $user)
                                    @if ($user->modul_id == $modul->id)
                                        <div class="group relative -ml-2">
                                            <img src="{{ asset('assets/images/profile/default.png') }}"
                                                class="w-10 ring ring-white rounded-full hover:scale-105 transition-all ease-in-out"
                                                alt="">
                                            <div
                                                class="absolute left-1/2 -translate-x-1/2 -top-12 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 transform translate-y-2 bg-black text-white p-2 rounded-lg">
                                                <p class="text-xs">{{ $user->name }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
