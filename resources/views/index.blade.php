@extends('layouts.layout')

@section('content')
    <div class="container-index w-full">
        <div class="flex flex-col gap-9">
            <a href="{{ route('classwork.topic.index', 'prinsip') }}"
                class="rounded-3xl flex flex-col shadow-md hover:shadow-sm hover:scale-[1.02] transition-all ease-in-out">
                <img src="{{ asset('assets/images/class/prinsip.png') }}" class="w-full" alt="">
                <div class="p-5 flex flex-col gap-3">
                    <h1 class="text-primary text-xl font-semibold">Prinsip Pengajaran</h1>
                    <h4 class="text-grayScale-600">2 Modul, 2 Materi</h4>
                </div>
            </a>
            <a href="{{ route('classwork.topic.index', 'pengembangan') }}"
                class="rounded-3xl flex flex-col shadow-md hover:shadow-sm hover:scale-[1.02] transition-all ease-in-out">
                <img src="{{ asset('assets/images/class/pengembangan.png') }}" class="w-full" alt="">
                <div class="p-5 flex flex-col gap-3">
                    <h1 class="text-primary text-xl font-semibold">Pengembangan Asesmen</h1>
                    <h4 class="text-grayScale-600">2 Modul, 2 Materi</h4>
                </div>
            </a>
            <a href="{{ route('ptk') }}"
                class="rounded-3xl flex flex-col shadow-md hover:shadow-sm hover:scale-[1.02] transition-all ease-in-out">
                <img src="{{ asset('assets/images/class/ptk.png') }}" class="w-full" alt="">
                <div class="p-5 flex flex-col gap-3">
                    <h1 class="text-primary text-xl font-semibold">PTK</h1>
                    <h4 class="text-grayScale-600">3 Berkas Telah Kumpul</h4>
                </div>
            </a>
        </div>
    </div>
@endsection
