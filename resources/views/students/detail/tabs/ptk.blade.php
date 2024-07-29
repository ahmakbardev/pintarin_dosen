<div id="tab-ptk" class="tab-pane hidden max-h-[75vh]" data-simplebar>
    <div class="grid grid-cols-2 bg-info-50 px-6 py-5 rounded-xl">
        <div class="flex flex-col gap-3">
            <div class="grid grid-cols-3">
                <p class="text-grayScale-700 font-medium">Tanggal Pengajuan:</p>
                <p class="text-grayScale-800 font-medium col-span-2">6 Januari 2024</p>
            </div>
            <div class="grid grid-cols-3">
                <p class="text-grayScale-700 font-medium">Tanggal dan Waktu:</p>
                <p class="text-grayScale-800 font-medium col-span-2">4 Februari 2024, 12.00 WIB</p>
            </div>
            <div class="grid grid-cols-3">
                <p class="text-grayScale-700 font-medium">Tempat Pelaksanaan:</p>
                <p class="text-grayScale-800 font-medium col-span-2">Zoom</p>
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <div class="grid grid-cols-3">
                <p class="text-grayScale-700 font-medium">Judul:</p>
                <p class="text-grayScale-800 font-medium col-span-2">Analisis Dan Perancangan UI/UX Pada Perpustakaan
                    Berjalan</p>
            </div>
            <div class="grid grid-cols-3">
                <p class="text-grayScale-700 font-medium">Persetujuan:</p>
                <p class="px-3 py-2 w-fit rounded-lg bg-success-600 text-white font-medium col-span-2 uppercase">
                    Disetujui</p>
            </div>
            <div class="grid grid-cols-3">
                <p class="text-grayScale-700 font-medium">Link Meeting:</p>
                <p class="text-grayScale-800 font-medium col-span-2">https://meet.google.com/tel/dwc-gwiq-nen?hs=1</p>
            </div>
        </div>
    </div>
    <div class="my-8 flex flex-col gap-5">
        <div class="flex justify-between">
            <h1 class="text-2xl font-medium">Berkas Seminar</h1>
            <!-- Button Disetujui -->
            <div class="relative">
                <!-- Button Disetujui -->
                <div id="approvalButton"
                    class="px-3 py-2 w-fit flex gap-3 items-center rounded-lg bg-success-600 text-white font-medium col-span-2 uppercase hover:ring transition-all ease-in-out cursor-pointer">
                    <img src="{{ asset('assets/icons/check.svg') }}" alt="">
                    <p>Disetujui</p>
                </div>

                <!-- Select Option untuk Disetujui -->
                <div id="approvalOptions"
                    class="hidden absolute mt-1 w-48 rounded-md bg-white right-0 shadow-lg z-10 animate-out">
                    <ul tabindex="-1" role="listbox"
                        class="max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                        <li role="option"
                            class="text-gray-900 cursor-default select-none relative py-2 pl-10 pr-4 hover:bg-primary hover:text-white"
                            id="option-1" data-value="Disetujui">
                            <span class="font-normal block truncate">Disetujui</span>
                        </li>
                        <li role="option"
                            class="text-gray-900 cursor-default select-none relative py-2 pl-10 pr-4 hover:bg-primary hover:text-white"
                            id="option-2" data-value="Ditolak">
                            <span class="font-normal block truncate">Ditolak</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 w-1/2">
            <div
                class="bg-info-50 rounded-xl py-4 flex flex-col gap-6 items-center hover:scale-105 transition-all ease-in-out group hover:ring-1 hover:ring-inset hover:ring-info">
                <img src="{{ asset('assets/icons/PDF.png') }}" class="w-10 aspect-square object-cover" alt="">
                <h1 class="group-hover:font-medium">File 1</h1>
            </div>
            {{-- <div
                class="bg-info-50 rounded-xl py-4 flex flex-col gap-6 items-center hover:scale-105 transition-all ease-in-out group hover:ring-1 hover:ring-inset hover:ring-info-400">
                <img src="{{ asset('assets/icons/DOC.png') }}" class="w-10 aspect-square object-cover" alt="">
                <h1 class="group-hover:font-medium">File 1</h1>
            </div> --}}
            <div
                class="bg-info-50 rounded-xl py-4 flex flex-col gap-6 items-center hover:scale-105 transition-all ease-in-out group hover:ring-1 hover:ring-inset hover:ring-info-400">
                <img src="{{ asset('assets/icons/PPT.png') }}" class="w-10 aspect-square object-cover" alt="">
                <h1 class="group-hover:font-medium">File 1</h1>
            </div>
        </div>
        <div class="w-full h-full rounded-lg">
            <embed src="{{ asset('assets/pdf/default-pdf.pdf') }}" type="application/pdf" width="100%"
                class="rounded-lg h-screen max-h-screen" />
        </div>
    </div>
</div>

<!-- Modal for Rejection -->
<div id="rejectModal"
    class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center hidden opacity-0 transition-opacity duration-300 z-10">
    <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4 text-center">Tolak Pengajuan</h2>
        <form id="rejectForm">
            <div class="mb-4">
                <label for="rejectReason" class="block text-gray-700 my-2">Alasan Penolakan</label>
                <textarea id="rejectReason" name="rejectReason" rows="4"
                    class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                    placeholder="Masukkan alasan penolakan" required></textarea>
            </div>
            <div class="flex justify-end gap-3 mt-8">
                <button type="button" id="closeRejectModal"
                    class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                <button type="submit"
                    class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const approvalButton = document.getElementById('approvalButton');
        const approvalOptions = document.getElementById('approvalOptions');
        const rejectOption = document.getElementById('option-2'); // Assuming "Ditolak" is option 2
        const rejectModal = document.getElementById('rejectModal');
        const closeRejectModal = document.getElementById('closeRejectModal');

        approvalButton.addEventListener('click', function() {
            if (approvalOptions.classList.contains('hidden')) {
                approvalOptions.classList.remove('hidden', 'animate-out');
                requestAnimationFrame(() => {
                    approvalOptions.classList.add('animate-in');
                });
            } else {
                approvalOptions.classList.remove('animate-in');
                approvalOptions.classList.add('animate-out');
                setTimeout(() => {
                    approvalOptions.classList.add('hidden');
                }, 300); // Duration should match the transition duration
            }
        });

        rejectOption.addEventListener('click', function() {
            rejectModal.classList.remove('hidden', 'animate-out');
            requestAnimationFrame(() => {
                rejectModal.classList.add('animate-in');
            });
            approvalOptions.classList.add('hidden');
        });

        closeRejectModal.addEventListener('click', function() {
            rejectModal.classList.remove('animate-in');
            rejectModal.classList.add('animate-out');
            setTimeout(() => {
                rejectModal.classList.add('hidden');
            }, 300); // Duration should match the transition duration
        });

        document.querySelectorAll('#approvalOptions li').forEach(option => {
            option.addEventListener('click', function() {
                console.log('Selected value:', this.getAttribute('data-value'));
                approvalOptions.classList.remove('animate-in');
                approvalOptions.classList.add('animate-out');
                setTimeout(() => {
                    approvalOptions.classList.add('hidden');
                }, 300); // Duration should match the transition duration
            });
        });

        document.addEventListener('click', function(e) {
            if (!approvalButton.contains(e.target) && !approvalOptions.contains(e.target) && !
                approvalOptions.classList.contains('hidden')) {
                approvalOptions.classList.remove('animate-in');
                approvalOptions.classList.add('animate-out');
                setTimeout(() => {
                    approvalOptions.classList.add('hidden');
                }, 300); // Duration should match the transition duration
            }
        });
    });
</script>

<style>
    .animate-in {
        transform: translateY(0) scale(1);
        opacity: 1;
        filter: blur(0);
        transition: transform 0.3s ease, opacity 0.3s ease, filter 0.3s ease;
    }

    .animate-out {
        transform: translateY(-10px) scale(0.95);
        opacity: 0;
        filter: blur(5px);
        transition: transform 0.3s ease, opacity 0.3s ease, filter 0.3s ease;
    }

    #approvalOptions.hidden,
    #rejectModal.hidden {
        display: none;
    }
</style>
