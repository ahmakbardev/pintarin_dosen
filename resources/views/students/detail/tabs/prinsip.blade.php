<div id="tab-prinsip" class="tab-pane active pb-10 h-screen">
    <div class="accordion" id="accordionPrinsip">
        @foreach ($progressPrinsip as $prog)
            <div class="accordion-item mb-3" id="accordion-item-{{ $prog->module_id }}-prinsip">
                <h2 class="accordion-header bg-primary text-white rounded-t-xl" id="headingOnePrinsip">
                    <button
                        class="accordion-button flex justify-between items-center w-full p-4 text-left bg-gray-100 border-b transition-all ease-in-out focus:outline-none"
                        type="button" data-toggle="collapse" data-target="#collapseOnePrinsip-{{ $prog->module_id }}"
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                        <div class="flex flex-col w-full">
                            <span>Modul {{ $loop->iteration }}</span>
                            <span class="text-lg font-medium">{{ $prog->module_name }}</span>
                            <div class="flex items-center mt-2 w-1/3">
                                <div class="w-full bg-gray-300 rounded-full bg-white h-2.5 dark:bg-gray-700 relative">
                                    <div class="bg-blue-600 h-2.5 rounded-full"
                                        style="width: {{ $prog->completion_percentage }}%;"></div>
                                </div>
                                <span class="ml-2 text-sm font-medium">{{ $prog->completion_percentage }}%</span>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down transition-transform"
                            id="iconOnePrinsip">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                </h2>
                <div id="collapseOnePrinsip-{{ $prog->module_id }}"
                    class="accordion-collapse rounded-b-xl border-x border-b border-grayScale-300 collapse {{ $loop->first ? 'show' : '' }} text-black"
                    aria-labelledby="headingOnePrinsip">
                    <div class="accordion-body p-4 flex flex-col">
                        <div class="flex flex-col gap-3">
                            @foreach ($prog->materis as $materi)
                                <div class="flex justify-between items-center group hover:ring-1 p-2 rounded-lg">
                                    <div class="flex flex-col">
                                        <h4>Materi {{ $loop->iteration }}</h4>
                                        <h2 class="text-lg font-medium">{{ $materi->title }}</h2>
                                    </div>
                                    <div class="relative">
                                        @if ($materi->completed)
                                            <img src="{{ asset('assets/icons/check_circle.svg') }}" alt="Check Circle"
                                                class="cursor-pointer">
                                            <div
                                                class="absolute left-1/2 bottom-full mb-2 w-max px-2 py-1 text-xs text-white bg-black rounded opacity-0 group-hover:opacity-100 transform -translate-x-1/2 transition-opacity duration-300">
                                                Selesai
                                                <div
                                                    class="absolute left-1/2 top-full w-0 h-0 border-t-8 border-t-black border-r-8 border-r-transparent border-l-8 border-l-transparent transform -translate-x-1/2">
                                                </div>
                                            </div>
                                        @else
                                            <div
                                                class="absolute left-1/2 bottom-full mb-2 w-max px-2 py-1 text-xs text-white bg-black rounded opacity-0 group-hover:opacity-100 transform -translate-x-1/2 transition-opacity duration-300">
                                                Belum Selesai
                                                <div
                                                    class="absolute left-1/2 top-full w-0 h-0 border-t-8 border-t-black border-r-8 border-r-transparent border-l-8 border-l-transparent transform -translate-x-1/2">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="px-2 py-4">
                                <div class="border-b border-grayScale-400"></div>
                            </div>

                            {{-- Display Post Test Score only if Post Test exists --}}
                            @if ($prog->post_test_exists)
                                <div class="flex justify-between items-center group hover:ring-1 px-2 py-4 rounded-lg">
                                    <div class="flex flex-col">
                                        <h2 class="text-lg font-medium">Post Test</h2>
                                    </div>
                                    <div class="relative">
                                        <p class="text-lg">{{ $prog->post_test_score }} / 100</p>
                                    </div>
                                </div>

                                <div class="px-2 py-4">
                                    <div class="border-b border-grayScale-400"></div>
                                </div>
                            @endif

                            {{-- Display Task Progress --}}
                            <div class="flex flex-col">
                                @foreach ($prog->tasks as $task)
                                    <a href="{{ route('nilai.detail', ['modul_id' => $prog->module_id, 'tugas_progress_id' => $task->tugas_progress_id]) }}"
                                        class="block">
                                        <div
                                            class="flex justify-between items-center group hover:ring-1 px-2 py-4 rounded-lg relative">
                                            <div class="flex flex-col">
                                                <h2 class="text-lg font-medium">Tugas {{ $loop->iteration }}</h2>
                                                <p>{!! $task->description !!}</p>
                                            </div>
                                            <div class="relative">
                                                @if ($task->pdf_path || $task->ppt_path)
                                                    @if ($task->nilai)
                                                        {{-- Tampilkan rata-rata nilai jika sudah dinilai --}}
                                                        <p class="text-sm inline text-green-500 font-semibold">
                                                            Rata-rata Nilai:
                                                            @php
                                                                $nilaiData = json_decode($task->nilai, true);
                                                                $totalNilai = array_sum(
                                                                    array_column($nilaiData, 'nilai'),
                                                                );
                                                                $jumlahKriteria = count($nilaiData);
                                                                $average =
                                                                    $jumlahKriteria > 0
                                                                        ? round($totalNilai / $jumlahKriteria, 2)
                                                                        : 'N/A';
                                                            @endphp
                                                            {{ $average }}
                                                        </p>
                                                    @else
                                                        {{-- Tampilkan pesan jika belum dinilai --}}
                                                        <p class="text-sm inline text-yellow-500 font-semibold">Belum
                                                            Dinilai
                                                        </p>
                                                    @endif

                                                    <img src="{{ asset('assets/icons/check_circle.svg') }}"
                                                        alt="Check Circle" class="cursor-pointer inline ml-3">
                                                    <div
                                                        class="absolute left-1/2 bottom-full mb-2 w-max px-2 py-1 text-xs text-white bg-black rounded opacity-0 group-hover:opacity-100 transform -translate-x-1/2 transition-opacity duration-300">
                                                        Cek Tugas
                                                        <div
                                                            class="absolute left-1/2 top-full w-0 h-0 border-t-8 border-t-black border-r-8 border-r-transparent border-l-8 border-l-transparent transform -translate-x-1/2">
                                                        </div>
                                                    </div>
                                                @else
                                                    <p>Belum Mengumpulkan</p>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



<script>
    $(document).ready(function() {
        // Accordion functionality for Prinsip Pembelajaran
        $('#accordionPrinsip .accordion-button').click(function() {
            const target = $(this).data('target');
            const $target = $(target);
            const isExpanded = $target.hasClass('show');

            // Close all accordions except the one being clicked
            $('#accordionPrinsip .accordion-collapse').not($target).slideUp("ease-in-out").removeClass(
                    'show').prev()
                .find('svg')
                .removeClass('rotate-180');

            $('#accordionPrinsip .accordion-header').not($(this).closest('.accordion-header')).addClass(
                'rounded-b-xl');

            if (isExpanded) {
                $target.slideUp("ease-in-out").removeClass('show');
                $(this).closest('.accordion-header').addClass('rounded-b-xl');
            } else {
                $target.slideDown("ease-in-out").addClass('show');
                $(this).closest('.accordion-header').removeClass('rounded-b-xl');
            }
        });

        // Ensure all accordion items are closed on page load, except the first one
        $('#accordionPrinsip .accordion-collapse').not('#collapseOnePrinsip').removeClass('show');
        $('#accordionPrinsip .accordion-collapse').not('#collapseOnePrinsip').prev().find('svg').removeClass(
            'rotate-180');
        $('#accordionPrinsip .accordion-header').not('#headingOnePrinsip').addClass('rounded-b-xl');

        feather.replace();
    });
</script>
