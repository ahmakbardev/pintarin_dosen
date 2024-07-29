@if (in_array(Route::currentRouteName(), ['materi']))
    <div id="sidebar" class="shadow-md sticky top-24 z-40 px-12 bg-blackMain materi-sidebar-expanded">
        <div class="sticky top-24">
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
        </div>
        <div class="sticky top-24 pt-10 h-[55.1rem] flex flex-col gap-32">
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('post-test') }}" class="bg-white py-2 px-4 rounded-xl flex flex-col gap-1 items-center">
                    <img src="{{ asset('assets/icons/post-test.png') }}" class="w-12 object-fill" alt="">
                    <p class="feature">Post Test</p>
                </a>
                <div class="bg-white py-2 px-4 rounded-xl flex flex-col gap-1 items-center">
                    <img src="{{ asset('assets/icons/saling-review.png') }}" class="w-12 object-fill" alt="">
                    <p class="feature text-center">Saling Review</p>
                </div>
            </div>
            <div class="flex flex-col gap-[6.5rem] relative">
                <!-- Garis vertikal yang menghubungkan lingkaran -->
                <div class="text-feature absolute left-1.5 top-10 bottom-10 w-0.5 bg-white"></div>

                <!-- Item pertama -->
                <div class="flex gap-3 items-center relative">
                    <div
                        class="circle-trigger w-3 aspect-square rounded-full bg-primary relative flex items-center justify-center">
                        <!-- Garis di dalam lingkaran -->
                    </div>
                    <div class="flex flex-col gap-5 items-center flex-1">
                        <div
                            class="bg-primary text-white py-4 px-4 rounded-xl flex flex-col max-w-80 gap-1 items-center relative">
                            <img src="{{ asset('assets/images/thumbnail-exam.png') }}"
                                class="max-w-40 object-fill absolute -top-[4.5rem]" alt="">
                            <p class="text-feature text-center">Materi 1: Peran Pemimpin dalam Pemberdayaan</p>
                        </div>
                    </div>
                </div>

                <!-- Item kedua -->
                <div class="flex gap-3 items-center relative">
                    <div
                        class="circle-trigger w-3 aspect-square rounded-full bg-white relative flex items-center justify-center">
                        <!-- Garis di dalam lingkaran -->
                    </div>
                    <div class="flex flex-col gap-5 items-center flex-1">
                        <div class="bg-white py-4 px-4 rounded-xl flex flex-col max-w-80 gap-1 items-center relative">
                            <img src="{{ asset('assets/images/thumbnail-exam.png') }}"
                                class="max-w-40 object-fill absolute -top-[4.5rem]" alt="">
                            <p class="text-feature text-center">Materi 2: Peran Pemimpin dalam Pemberdayaan</p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3 items-center relative">
                    <div
                        class="circle-trigger w-3 aspect-square rounded-full bg-white relative flex items-center justify-center">
                        <!-- Garis di dalam lingkaran -->
                    </div>
                    <div class="flex flex-col gap-5 items-center flex-1">
                        <div class="bg-white py-4 px-4 rounded-xl flex flex-col max-w-80 gap-1 items-center relative">
                            <img src="{{ asset('assets/images/thumbnail-exam.png') }}"
                                class="max-w-40 object-fill absolute -top-[4.5rem]" alt="">
                            <p class="text-feature text-center">Materi 3: Peran Pemimpin dalam Pemberdayaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('btn-sidebar').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var btnIcon = document.getElementById('btn-icon');
            sidebar.classList.toggle('materi-sidebar-expanded');
            sidebar.classList.toggle('materi-sidebar-collapsed');
            btnIcon.classList.toggle('own-rotate-180');

            // Additional logic for sidebar visibility on small screens
            if (window.innerWidth <= 1200) {
                document.body.classList.toggle('sidebar-visible');
            }
        });

        // Additional logic for responsive sidebar
        function checkWidth() {
            var sidebar = document.getElementById('sidebar');
            var btnIcon = document.getElementById('btn-icon');
            if (window.innerWidth <= 1024) {
                sidebar.classList.add('sidebar-hidden');
                btnIcon.classList.add('own-rotate-180'); // Set icon rotation by default on small screens
            } else {
                sidebar.classList.remove('sidebar-hidden');
                btnIcon.classList.remove('own-rotate-180'); // Reset icon rotation on larger screens
            }

            // Ensure feature and text-feature are visible below 1024px width
            if (window.innerWidth <= 1024) {
                var features = document.querySelectorAll('.feature, .text-feature');
                features.forEach(function(feature) {
                    feature.style.display = 'inline';
                });
            } else {
                var features = document.querySelectorAll('.feature, .text-feature');
                features.forEach(function(feature) {
                    feature.style.display = '';
                });
            }
        }

        // Initial check
        checkWidth();

        // Check on resize
        window.addEventListener('resize', checkWidth);
    </script>
@endif
