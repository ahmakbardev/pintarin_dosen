@if (in_array(Route::currentRouteName(), ['students.detail']))
    <div id="sidebar" class="shadow-md sticky top-24 z-[1] px-12 bg-blackMain latihan-sidebar-expanded">
        {{-- <div class="sticky top-24">
            <div class="relative">
                <button id="btn-sidebar"
                    class="absolute top-20 -right-[4.2rem] bg-primary flex justify-center items-center w-10 aspect-square rounded-full text-white">
                    <svg id="btn-icon" class="transition-transform duration-300" width="8" height="14"
                        viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.156006 6.70368C0.156006 6.96735 0.253941 7.19336 0.464879 7.38923L6.32593 13.1297C6.49166 13.2955 6.7026 13.3859 6.95121 13.3859C7.44842 13.3859 7.84769 12.9941 7.84769 12.4894C7.84769 12.2408 7.74222 12.0223 7.57649 11.8491L2.29551 6.70368L7.57649 1.55831C7.74222 1.38504 7.84769 1.15904 7.84769 0.917969C7.84769 0.413225 7.44842 0.0214844 6.95121 0.0214844C6.7026 0.0214844 6.49166 0.111886 6.32593 0.277623L0.464879 6.0106C0.253941 6.21401 0.156006 6.44001 0.156006 6.70368Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
        </div> --}}
        <div class="sticky top-24 py-10 h-[55.1rem] flex flex-col justify-between">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col p-3 items-center">
                    <img src="{{ asset('assets/images/profile/default_big.png') }}" class="w-2/3" alt="">
                </div>
                <div class="grid grid-cols-1 gap-3 text-white">
                    <div class="">
                        <h4 class="text-base font-light">Nama</h4>
                        <h2 class="text-lg font-medium">Raisa Andriani</h2>
                    </div>
                    <div class="">
                        <h4 class="text-base font-light">NIM</h4>
                        <h2 class="text-lg font-medium">200535626862</h2>
                    </div>
                    <div class="">
                        <h4 class="text-base font-light">Program Studi</h4>
                        <h2 class="text-lg font-medium">Pendidikan Profesi Guru</h2>
                    </div>
                    <div class="">
                        <h4 class="text-base font-light">Fakultas</h4>
                        <h2 class="text-lg font-medium">Fakultas Ilmu Pendidikan</h2>
                    </div>
                    <div class="">
                        <h4 class="text-base font-light">Dosen PA</h4>
                        <h2 class="text-lg font-medium">Dyah Lestari, S.T., M.Eng.</h2>
                    </div>
                    <div class="">
                        <h4 class="text-base font-light">NIM</h4>
                        <h2 class="text-lg font-medium">200535626862</h2>
                    </div>
                    <div class="">
                        <h4 class="text-base font-light">Jalur Masuk</h4>
                        <h2 class="text-lg font-medium">Besiswa PPG Kemdikbud</h2>
                    </div>
                    <div class="">
                        <h4 class="text-base font-light">Angkatan</h4>
                        <h2 class="text-lg font-medium">2020</h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[6.5rem] relative">
                <!-- Item pertama -->
            </div>
        </div>
    </div>
@endif
