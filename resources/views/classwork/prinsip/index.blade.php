@extends('layouts.layout')
{{-- Halaman Listing --}}
@section('content')
    <div class="container-index w-full">
        <div id="header" class="w-full relative shadow-xl rounded-xl">
            <img src="{{ asset('assets/images/modul/cover.png') }}" class="w-full h-full object-cover" alt="">
            <div class="absolute inset-0 flex items-start justify-end p-5 flex-col">
                <h1 class=" z-[1] text-2xl font-medium">Pemimpin yang Memberdayakan</h1>
                <h4 class=" z-[1] text-lg">2 Materi</h4>
            </div>
        </div>
        <div class="mt-6">
            <div class="flex justify-between items-center pb-5 border-b">
                <h1 class="text-xl">Materi</h1>
                <a href="{{ route('classwork.topic.materi.create') }}"
                    class="px-3 py-2 flex gap-1 items-center rounded-lg hover:ring-2 hover:ring-primary/25 transition-all ease-in-out">
                    <i data-feather="plus" class="text-xs"></i>Tambah
                </a>
            </div>

            <div class="ifEmpty flex flex-col h-full justify-center items-center">
                <img src="{{ asset('assets/images/empty/materi.png') }}" class="max-h-56 object-contain my-20"
                    alt="">
            </div>
            <div class="flex flex-col gap-5 my-5 hidden">
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
            </div>
        </div>
        <div class="mt-6">
            <div class="flex justify-between items-center pb-5 border-b">
                <h1 class="text-xl">Post Test</h1>
                <a href="{{ route('classwork.prinsip.post-test') }}"
                    class="px-3 py-2 flex gap-1 items-center rounded-lg hover:ring-2 hover:ring-primary/25 transition-all ease-in-out">
                    <i data-feather="plus" class="text-xs"></i>Tambah
                </a>
            </div>

            <div class="ifEmpty flex flex-col h-full justify-center items-center">
                <img src="{{ asset('assets/images/empty/post_test.png') }}" class="max-h-56 object-contain my-20"
                    alt="">
            </div>
            <div class="flex flex-col gap-5 my-5 hidden">
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
            </div>
        </div>
        <div class="mt-6">
            <div class="flex justify-between items-center pb-5 border-b">
                <h1 class="text-xl">Tugas</h1>
                <a href="{{ route('classwork.prinsip.tugas') }}"
                    class="px-3 py-2 flex gap-1 items-center rounded-lg hover:ring-2 hover:ring-primary/25 transition-all ease-in-out">
                    <i data-feather="plus" class="text-xs"></i>Tambah
                </a>
            </div>

            <div class="ifEmpty flex flex-col h-full justify-center items-center">
                <img src="{{ asset('assets/images/empty/tugas.png') }}" class="max-h-56 object-contain my-20"
                    alt="">
            </div>
            <div class="flex flex-col gap-5 my-5 hidden">
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
                <a href="#"
                    class="py-7 px-10 shadow-md rounded-lg transition-all flex justify-between items-center ease-in-out hover:shadow-lg hover:scale-[1.02]">
                    <div class="flex flex-col">
                        <p>Modul</p>
                        <h1 class="text-2xl font-medium text-primary">Pemimpin yang Memberdayakan</h1>
                    </div>
                    <button class="relative group openModalEditBtn">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="fill-black group-hover:fill-primary transition-all ease-in-out">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.4862 4.18686C22.8299 3.53071 21.9398 3.16211 21.0117 3.16211C20.0836 3.16211 19.1935 3.53071 18.5372 4.18686L17.7124 5.01286L23.4874 10.7879L24.311 9.96303C24.6361 9.63802 24.894 9.25215 25.0699 8.82747C25.2458 8.4028 25.3364 7.94762 25.3364 7.48795C25.3364 7.02827 25.2458 6.5731 25.0699 6.14842C24.894 5.72374 24.6361 5.33788 24.311 5.01286L23.4862 4.18686ZM21.8365 12.4375L16.0615 6.66253L5.45653 17.2687C5.22446 17.5008 5.06234 17.7935 4.9887 18.1134L3.7882 23.3109C3.74347 23.5038 3.7486 23.705 3.80311 23.8954C3.85762 24.0858 3.95971 24.2592 4.09977 24.3993C4.23982 24.5394 4.41323 24.6414 4.60365 24.696C4.79408 24.7505 4.99524 24.7556 5.1882 24.7109L10.3869 23.5115C10.7063 23.4377 10.9986 23.2756 11.2304 23.0437L21.8365 12.4375Z"
                                fill="" class="" />
                        </svg>
                        <div
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden w-fit group-hover:block bg-black text-white text-xs rounded py-1 px-2">
                            Edit
                        </div>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div id="myModalAdd"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Tambah Modul Baru</h2>
            <form>
                <div class="mb-4">
                    <label for="modulName" class="block text-gray-700 my-2">Nama Modul</label>
                    <input type="text" id="modulNameAdd" name="modulName"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Nama Modul" required>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeModalAddBtn"
                        class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                    <button type="button" id="saveModalAddBtn"
                        class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="myModalEdit"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Edit Modul</h2>
            <form>
                <div class="mb-4">
                    <label for="modulName" class="block text-gray-700 my-2">Nama Modul</label>
                    <input type="text" id="modulNameEdit" name="modulName"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Nama Modul" required>
                </div>
                <div class="flex justify-between mt-8">
                    <button type="button" id="closeModalEditBtn"
                        class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                    <div class="flex gap-3">
                        <button type="button"
                            class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 hover:ring rounded-lg transition-all ease-in-out">
                            <i data-feather="trash-2" class="w-5"></i>
                        </button>
                        <button type="button" id="saveModalEditBtn"
                            class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const openModalAddBtn = $('#openModalAddBtn');
            const closeModalAddBtn = $('#closeModalAddBtn');
            const saveModalAddBtn = $('#saveModalAddBtn');
            const myModalAdd = $('#myModalAdd');

            const openModalEditBtns = $('.openModalEditBtn');
            const closeModalEditBtn = $('#closeModalEditBtn');
            const saveModalEditBtn = $('#saveModalEditBtn');
            const myModalEdit = $('#myModalEdit');

            function openModal(modal) {
                modal.removeClass('opacity-0 pointer-events-none');
                modal.addClass('opacity-100');
                modal.find('> div').removeClass('translate-y-10');
                modal.find('> div').addClass('translate-y-0');
            }

            function closeModal(modal) {
                modal.addClass('opacity-0 pointer-events-none');
                modal.removeClass('opacity-100');
                modal.find('> div').addClass('translate-y-10');
                modal.find('> div').removeClass('translate-y-0');
            }

            openModalAddBtn.on('click', function() {
                openModal(myModalAdd);
            });

            closeModalAddBtn.on('click', function() {
                closeModal(myModalAdd);
            });

            saveModalAddBtn.on('click', function() {
                closeModal(myModalAdd);
            });

            openModalEditBtns.on('click', function() {
                openModal(myModalEdit);
            });

            closeModalEditBtn.on('click', function() {
                closeModal(myModalEdit);
            });

            saveModalEditBtn.on('click', function() {
                closeModal(myModalEdit);
            });
        });
    </script>
@endsection
