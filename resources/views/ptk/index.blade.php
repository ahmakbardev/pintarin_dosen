@extends('layouts.layout')

@section('content')
    <div class="container-index w-full h-[100vh] overflow-hidden">
        <div class="relative inline-block w-full">
            <div class="relative">
                <input type="text" id="search-input"
                    class="w-full bg-grayScale-100 rounded-2xl shadow-md pl-3 pr-10 py-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                    placeholder="Cari nama atau nomor">
            </div>
            <div id="options" class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-10 hidden animate-out">
                <ul tabindex="-1" role="listbox"
                    class="max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                    <li role="option"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-10 pr-4 hover:bg-primary hover:text-white"
                        id="option-1" data-value="Opsi 1">
                        <span class="font-normal block truncate">Opsi 1</span>
                    </li>
                    <li role="option"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-10 pr-4 hover:bg-primary hover:text-white"
                        id="option-2" data-value="Opsi 2">
                        <span class="font-normal block truncate">Opsi 2</span>
                    </li>
                    <li role="option"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-10 pr-4 hover:bg-primary hover:text-white"
                        id="option-3" data-value="Opsi 3">
                        <span class="font-normal block truncate">Opsi 3</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col gap-5 mt-5" id="list-container">
            <div
                class="list-item list-none shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                <div class="flex gap-4">
                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="">
                    <div class="flex justify-between items-center w-full">
                        <div class="flex flex-col">
                            <h1 class="text-lg font-semibold">Raisa Andriani</h1>
                            <p class="text-sm text-grayScale-400">139009287</p>
                        </div>
                        <img src="{{ asset('assets/icons/leaderboard.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div
                class="list-item list-none shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                <a href="{{ route('students.detail') }}#tab-ptk" class="flex gap-4">
                    <img src="{{ asset('assets/images/profile/default.png') }}" alt="">
                    <div class="flex justify-between items-center w-full">
                        <div class="flex flex-col">
                            <h1 class="text-lg font-semibold">Ahmad Akbar</h1>
                            <p class="text-sm text-grayScale-400">139009287</p>
                        </div>
                        <img src="{{ asset('assets/icons/leaderboard.png') }}" alt="">
                    </div>
                </a>
            </div>
            <!-- Tambahkan item lainnya di sini -->
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const listContainer = document.getElementById('list-container');

            searchInput.addEventListener('input', function() {
                const searchValue = searchInput.value.toLowerCase();
                const items = listContainer.getElementsByClassName('list-item');

                Array.from(items).forEach(item => {
                    const name = item.querySelector('h1').textContent.toLowerCase();
                    const number = item.querySelector('p').textContent.toLowerCase();

                    if (name.includes(searchValue) || number.includes(searchValue)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <style>
        @keyframes blob-in {
            0% {
                transform: scale(0.95);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes blob-out {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(0.95);
                opacity: 0;
            }
        }

        .animate-in {
            animation: blob-in 0.3s ease-out forwards;
        }

        .animate-out {
            animation: blob-out 0.3s ease-out forwards;
        }
    </style>
@endsection
