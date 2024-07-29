@extends('layouts.layout')

@section('content')
    <div class="container-index w-full">
        @include('diskusi.components.select')

        <div class="py-5 flex items-center gap-3">
            <p class="text-lg font-medium">Urutkan Berdasarkan :</p>
            @include('diskusi.components.select-urutan')
        </div>

        <div class="flex flex-col gap-5 pb-10">
            <a href="{{ route('diskusi.chat') }}" class="shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                <div class="flex flex-col gap-5">
                    <div class="flex gap-5 items-center">
                        <div class="flex gap-4">
                            <img src="{{ asset('assets/images/profile/default.png') }}" alt="">
                            <div class="flex justify-between items-center w-full">
                                <div class="flex flex-col">
                                    <h1 class="text-lg font-semibold">Raisa Andriani</h1>
                                    <p class="text-sm text-grayScale-400">139009287</p>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('assets/icons/ellipse.png') }}" class="w-fit h-fit object-contain"
                            alt="">
                        <p class="text-sm text-grayScale-400">4 Hari yang lalu</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1 class="text-xl font-semibold">Perbedaan prinsip LSP dan ISP</h1>
                        <p>Saya masih bingung untuk memahami perbedaan antara prinsip Liskov dengan Interface Segregation. Bisa...</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <img src="{{ asset('assets/icons/bx_chat.svg') }}" alt="">
                        <p>0 Pembahasan</p>
                    </div>
                </div>
            </a>
            <div class="shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                <div class="flex flex-col gap-5">
                    <div class="flex gap-5 items-center">
                        <div class="flex gap-4">
                            <img src="{{ asset('assets/images/profile/default.png') }}" alt="">
                            <div class="flex justify-between items-center w-full">
                                <div class="flex flex-col">
                                    <h1 class="text-lg font-semibold">Raisa Andriani</h1>
                                    <p class="text-sm text-grayScale-400">139009287</p>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('assets/icons/ellipse.png') }}" class="w-fit h-fit object-contain"
                            alt="">
                        <p class="text-sm text-grayScale-400">4 Hari yang lalu</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1 class="text-xl font-semibold">Perbedaan prinsip LSP dan ISP</h1>
                        <p>Saya masih bingung untuk memahami perbedaan antara prinsip Liskov dengan Interface Segregation. Bisa...</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <img src="{{ asset('assets/icons/bx_chat.svg') }}" alt="">
                        <p>0 Pembahasan</p>
                    </div>
                </div>
            </div>
            <div class="shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                <div class="flex flex-col gap-5">
                    <div class="flex gap-5 items-center">
                        <div class="flex gap-4">
                            <img src="{{ asset('assets/images/profile/default.png') }}" alt="">
                            <div class="flex justify-between items-center w-full">
                                <div class="flex flex-col">
                                    <h1 class="text-lg font-semibold">Raisa Andriani</h1>
                                    <p class="text-sm text-grayScale-400">139009287</p>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('assets/icons/ellipse.png') }}" class="w-fit h-fit object-contain"
                            alt="">
                        <p class="text-sm text-grayScale-400">4 Hari yang lalu</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1 class="text-xl font-semibold">Perbedaan prinsip LSP dan ISP</h1>
                        <p>Saya masih bingung untuk memahami perbedaan antara prinsip Liskov dengan Interface Segregation. Bisa...</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <img src="{{ asset('assets/icons/bx_chat.svg') }}" alt="">
                        <p>0 Pembahasan</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
