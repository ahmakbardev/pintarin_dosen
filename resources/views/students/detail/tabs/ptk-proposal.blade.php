<div id="tab-ptk-proposal" class="tab-pane hidden max-h-[75vh] px-4" data-simplebar>
    @if ($ptkProposalData)
        <!-- Button to toggle bg-info-50 content -->
        <button id="toggle-bg-info-50-proposal"
            class="px-4 py-2 w-full bg-primary text-white text-xs font-medium rounded-t-lg">
            Sembunyikan Informasi
        </button>

        <div id="bg-info-50-content-proposal" class="bg-info-50 px-6 py-5 rounded-b-xl hidden">
            <div class="grid grid-cols-2">
                <!-- Existing content details -->
                <div class="flex flex-col gap-3">
                    <div class="grid grid-cols-3 items-center">
                        <p class="text-grayScale-700 relative font-medium">
                            Judul:
                            <span
                                class="absolute -top-2 right-[5.4rem] bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">BARU</span>
                        </p>
                        <div class="relative grid w-fit">
                            <p class="text-grayScale-800 font-medium col-span-2">{{ $ptkProposalData['judul']->judul }}
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 items-center">
                        <p class="text-grayScale-700 font-medium w-fit">Status Judul:</p>
                        <div class="relative col-span-2">
                            <!-- Button untuk update status judul -->
                            <div class="relative">
                                <button id="updateStatusJudulButton"
                                    class="px-3 py-2 w-fit flex gap-3 items-center rounded-lg bg-{{ $ptkProposalData['judul']->status == 'diterima' ? 'green' : ($ptkProposalData['judul']->status == 'ditolak' ? 'red' : 'yellow') }}-500 capitalize text-white font-medium hover:ring transition-all ease-in-out cursor-pointer">
                                    <p>{{ $ptkProposalData['judul']->status }}</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="grid grid-cols-3">
                        <p class="text-grayScale-700 font-medium">Tanggal Pengajuan:</p>
                        <p class="text-grayScale-800 font-medium col-span-2">{{ $ptkProposalData['judul']->created_at }}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="my-8 flex flex-col gap-5">
            <div class="flex justify-between">
                <h1 class="text-2xl font-medium">Berkas Proposal</h1>
                <!-- Button Disetujui -->
                <div class="relative">
                    <!-- Button untuk membuka options -->
                    <div class="flex items-center gap-3">
                        <p class="text-grayScale-700 font-medium">Persetujuan Proposal:</p>
                        <div id="approvalButtonProposal"
                            class="px-3 py-2 w-fit flex gap-3 items-center rounded-lg bg-{{ $ptkProposalData['proposal']->status == 'diterima' ? 'green' : ($ptkProposalData['proposal']->status == 'ditolak' ? 'red' : 'yellow') }}-500 text-white font-medium col-span-2 uppercase hover:ring transition-all ease-in-out cursor-pointer">
                            <img src="{{ asset('assets/icons/check.svg') }}" alt="">
                            <p> {{ ucfirst($ptkProposalData['proposal']->status) }}</p>
                        </div>
                    </div>

                    <!-- Select Option untuk Disetujui/Ditolak -->
                    <div id="approvalOptionsProposal"
                        class="hidden absolute mt-1 w-48 rounded-md bg-white right-0 shadow-lg z-10">
                        <ul tabindex="-1" role="listbox"
                            class="max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                            <li role="optionProposal"
                                class="text-gray-900 cursor-default select-none relative py-2 pl-10 pr-4 hover:bg-primary hover:text-white"
                                id="option-proposal-1" data-value="diterima">
                                <span class="font-normal block truncate">Diterima</span>
                            </li>
                            <li role="optionProposal"
                                class="text-gray-900 cursor-default select-none relative py-2 pl-10 pr-4 hover:bg-primary hover:text-white"
                                id="option-proposal-2" data-value="ditolak">
                                <span class="font-normal block truncate">Ditolak</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Fullscreen Button for PDF -->
            <div class="flex justify-end mb-4">
                <button id="fullscreenButtonProposal"
                    class="-mb-5 py-2 bg-blue-600 flex justify-center items-center gap-3 w-full text-white font-medium rounded-lg hover:ring hover:ring-blue-300">
                    Fullscreen PDF
                    <img src="{{ asset('assets/icons/PDF.png') }}" class="w-6 aspect-square object-contain"
                        alt="">
                </button>
            </div>

            <!-- PDF Embed -->
            <div class="w-full h-full rounded-lg" id="pdfContainerProposal">
                <embed src="{{ asset('storage/' . $ptkProposalData['proposal']->file_path) }}" type="application/pdf"
                    width="100%" class="rounded-lg h-screen max-h-screen" />
            </div>
        </div>
    @else
        <div class="text-center py-10">
            <h3 class="text-lg font-semibold">No Proposal Data Available</h3>
        </div>
    @endif
</div>

@if ($ptkProposalData)
    <!-- Modal for Rejection/Acceptance -->
    <div id="rejectProposalModal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center hidden opacity-0 transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center" id="modalTitleProposal">Perbarui Status Pengajuan</h2>
            <form id="rejectFormProposal" method="POST"
                action="{{ route('proposal.update-status', $ptkProposalData['judul']->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="statusInputProposal">
                <div class="mb-4">
                    <label for="rejectReasonProposal" class="block text-gray-700 my-2">Catatan</label>
                    <textarea id="rejectReasonProposal" name="catatan" rows="4"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Masukkan catatan" required></textarea>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeRejectProposalModal"
                        class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal untuk update status judul -->
    <div id="updateStatusJudulModal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center hidden opacity-0 transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Update Status Judul</h2>
            <form id="updateStatusJudulForm" method="POST"
                action="{{ route('judul.update-status', $ptkProposalData['judul']->id) }}">
                @csrf
                @method('PUT')
                <select name="status"
                    class="px-3 py-2 w-fit flex gap-3 items-center rounded-lg bg-{{ $ptkProposalData['judul']->status == 'diterima' ? 'green' : ($ptkProposalData['judul']->status == 'ditolak' ? 'red' : 'yellow') }}-500 capitalize text-white font-medium hover:ring transition-all ease-in-out cursor-pointer"
                    id="statusInputJudul" required>
                    <option value="" class="capitalize">{{ $ptkProposalData['judul']->status }}</option>
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                </select>
                <div class="mb-4">
                    <label for="catatanJudul" class="block text-gray-700 my-2">Catatan</label>
                    <textarea id="catatanJudul" name="catatan" rows="4"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Masukkan catatan" required></textarea>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeUpdateStatusJudulModal"
                        class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const approvalButtonProposal = document.getElementById('approvalButtonProposal');
            const approvalOptionsProposal = document.getElementById('approvalOptionsProposal');
            const rejectModalProposal = document.getElementById('rejectProposalModal');
            const closeRejectModalProposal = document.getElementById('closeRejectProposalModal');
            const statusInputProposal = document.getElementById('statusInputProposal');
            const modalTitleProposal = document.getElementById('modalTitleProposal');

            // Show/hide approval options using display: block/none
            approvalButtonProposal.addEventListener('click', function(event) {
                approvalOptionsProposal.classList.toggle('hidden');
                event.stopPropagation(); // Prevent click from propagating to document
            });

            // Hide approval options if clicking outside
            document.addEventListener('click', function(event) {
                if (!approvalOptionsProposal.contains(event.target) && !approvalButtonProposal.contains(
                        event.target)) {
                    approvalOptionsProposal.classList.add('hidden');
                }
            });

            document.querySelectorAll('#approvalOptionsProposal li').forEach(option => {
                option.addEventListener('click', function() {
                    const selectedStatus = this.getAttribute('data-value');
                    statusInputProposal.value = selectedStatus;

                    // Only update modal title if the element exists
                    if (modalTitleProposal) {
                        modalTitleProposal.textContent = selectedStatus === 'diterima' ?
                            'Terima Pengajuan' : 'Tolak Pengajuan';
                    }

                    // Show modal for both acceptance and rejection
                    rejectModalProposal.classList.remove('hidden');
                    rejectModalProposal.style.opacity = "1";
                    rejectModalProposal.style.transform = "translateY(0)";

                    // Hide approval options after selection
                    approvalOptionsProposal.classList.add('hidden');
                });
            });

            // Close the modal
            closeRejectModalProposal.addEventListener('click', function() {
                rejectModalProposal.style.opacity = "0";
                rejectModalProposal.style.transform = "translateY(10px)";
                setTimeout(() => {
                    rejectModalProposal.classList.add('hidden');
                }, 300);
            });

            // Fullscreen button logic
            const fullscreenButton = document.getElementById('fullscreenButtonProposal');
            const pdfContainer = document.getElementById('pdfContainerProposal');

            fullscreenButton.addEventListener('click', function() {
                if (pdfContainer.requestFullscreen) {
                    pdfContainer.requestFullscreen();
                } else if (pdfContainer.mozRequestFullScreen) { // Firefox
                    pdfContainer.mozRequestFullScreen();
                } else if (pdfContainer.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                    pdfContainer.webkitRequestFullscreen();
                } else if (pdfContainer.msRequestFullscreen) { // IE/Edge
                    pdfContainer.msRequestFullscreen();
                }
            });
        });

        $(document).ready(function() {
            const contentProposal = $('#bg-info-50-content-proposal');
            const toggleButtonProposal = $('#toggle-bg-info-50-proposal');

            // Show content by default on page load
            contentProposal.slideDown("ease-in-out").addClass('grid');
            toggleButtonProposal.removeClass('rounded-t-lg').addClass('rounded-t-lg');

            // Toggle visibility for the bg-info-50 div like an accordion
            toggleButtonProposal.click(function() {
                const isExpanded = contentProposal.hasClass('grid');

                if (isExpanded) {
                    contentProposal.slideUp("ease-in-out").removeClass('grid');
                    toggleButtonProposal.removeClass('rounded-t-lg').addClass('rounded-lg').text(
                        'Tampilkan Informasi');
                } else {
                    contentProposal.slideDown("ease-in-out").addClass('grid');
                    toggleButtonProposal.removeClass('rounded-lg').addClass('rounded-t-lg').text(
                        'Sembunyikan Informasi');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const updateStatusJudulButton = document.getElementById('updateStatusJudulButton');
            const updateStatusJudulModal = document.getElementById('updateStatusJudulModal');
            const closeUpdateStatusJudulModal = document.getElementById('closeUpdateStatusJudulModal');
            const statusInputJudul = document.getElementById('statusInputJudul');
            const approvalOptionsJudul = document.getElementById('approvalOptionsJudul');

            // Handle button click to open modal
            updateStatusJudulButton.addEventListener('click', function() {
                updateStatusJudulModal.classList.remove('hidden');
                setTimeout(() => {
                    updateStatusJudulModal.style.opacity = "1";
                    updateStatusJudulModal.style.transform = "translateY(0)";
                }, 10);
            });

            // Close modal
            closeUpdateStatusJudulModal.addEventListener('click', function() {
                updateStatusJudulModal.style.opacity = "0";
                updateStatusJudulModal.style.transform = "translateY(10px)";
                setTimeout(() => {
                    updateStatusJudulModal.classList.add('hidden');
                }, 300);
            });

            // Handle approval option click (for Judul)
            document.querySelectorAll('#approvalOptionsJudul li').forEach(option => {
                option.addEventListener('click', function() {
                    const selectedStatus = this.getAttribute('data-value');
                    statusInputJudul.value = selectedStatus; // Set the status in hidden input

                    // Show the modal for confirmation
                    updateStatusJudulModal.classList.remove('hidden');
                    updateStatusJudulModal.style.opacity = "1";
                    updateStatusJudulModal.style.transform = "translateY(0)";

                    // Hide approval options after selection
                    approvalOptionsJudul.classList.add('hidden');
                });
            });
        });
    </script>
@endif
