@extends('layouts.layout')

@section('content')
    <div class="flex container-index w-full py-0">
        <div class=" flex-1">
            <div class="py-5 pr-5">
                <div class="mb-10 flex flex-col gap-3">
                    <label class="text-2xl">Title</label>
                    <input type="text" class="border-b max-w-xl">
                </div>
                <div class="mb-10 flex flex-col gap-3">
                    <label class="text-2xl">Deskripsi</label>
                    <textarea id="deskripsi" class="border-b max-w-xl" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="min-w-72 max-w-md sticky top-32 h-5/6">
            <div class="border-l pl-5 flex h-full flex-col gap-10 py-5">
                <div class="mb-6 w-full">
                    <h1 class="text-2xl mb-4">Due</h1>
                    <input type="date" id="dueDate" class="w-full px-3 py-2 rounded-lg bg-grayScale-100"
                        placeholder="Tidak ada Deadline">
                </div>
                <div class="h-1/2 flex flex-col gap-5">
                    <div class="w-full">
                        <h1 class="text-2xl mb-4">Kriteria Penilaian</h1>
                        <div class="flex flex-wrap gap-3">
                            {{-- <div class="py-2 px-3 bg-blue-50 text-primary rounded-lg relative group">
                                <div
                                    class="absolute p-1 rounded-full bg-grayScale-100 border -top-2 -right-2 scale-0 group-hover:scale-100 transition-all ease-in-out cursor-pointer delete-criteria">
                                    <i data-feather="x" class="w-4 h-4 aspect-square font-semibold"></i>
                                </div>
                                <p>Detail Tulisan</p>
                            </div> --}}
                            <div
                                class="py-2 px-3 ring-1 ring-primary text-primary rounded-lg flex items-center gap-2 hover:bg-primary hover:text-white transition-all ease-in-out cursor-pointer add-criteria">
                                <i data-feather="plus" class="w-5"></i>Tambah
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-end">
                        <button
                            class="py-3 px-5 text-lg w-full bg-primary text-white rounded-lg hover:ring transition-all ease-in-out">Unggah</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal Kriteria Penilaian -->
    <div id="criteriaModal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Tambah Kriteria Penilaian</h2>
            <form id="criteriaForm">
                <div class="mb-4">
                    <label for="criteriaInput" class="block text-gray-700 my-2">Kriteria</label>
                    <input type="text" id="criteriaInput" name="criteriaInput"
                        class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg outline-none focus:border-primary"
                        placeholder="Masukkan kriteria penilaian" required>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" id="closeCriteriaModal"
                        class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        CKEDITOR.ClassicEditor.create(document.querySelector('#deskripsi'), {
            toolbar: {
                items: [
                    "findAndReplace", "selectAll", "|",
                    "heading", "|",
                    "fontSize", "fontFamily", "fontColor", "fontBackgroundColor", "highlight", "|",
                    "bulletedList", "numberedList", "todoList", "|",
                    "outdent", "indent", "|",
                    "undo", "redo", "|",
                    "specialCharacters", "horizontalLine", "|",
                    "link", "insertImage", "blockQuote", "insertTable", "mediaEmbed",
                    "-",
                    "alignment", "|",
                    "bold", "italic", "strikethrough", "underline", "code", "subscript", "superscript",
                    "removeFormat", "|",
                    "exportPDF", "exportWord", "|",
                ],
                shouldNotGroupWhenFull: true
            },
            removePlugins: [
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType',
                'ExportPdf',
                'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType',
                'WebSocketGateway'
            ],
            ckfinder: {
                uploadUrl: "#",
                options: {
                    resourceType: 'Images'
                }
            },
            mediaEmbed: {
                previewsInData: true
            }
        }).then(editor => {
            editor.ui.view.editable.element.style.minHeight = "200px";
        }).catch(error => {
            console.error(error);
        });

        $(document).ready(function() {
            // Placeholder date input
            const dateInput = $('input[type="date"]');
            dateInput.on('input', function() {
                const placeholderText = 'Tidak ada Deadline';
                if (!$(this).val()) {
                    $(this).addClass('placeholder-active');
                    $(this).attr('placeholder', placeholderText);
                } else {
                    $(this).removeClass('placeholder-active');
                    $(this).attr('placeholder', '');
                }
            }).trigger('input');

            // Display modal for adding criteria
            const addCriteriaButton = $('.add-criteria');
            const criteriaModal = $('#criteriaModal');
            const criteriaForm = $('#criteriaForm');

            addCriteriaButton.on('click', function() {
                criteriaModal.removeClass('opacity-0 pointer-events-none');
                criteriaModal.addClass('opacity-100');
                criteriaModal.find('> div').removeClass('translate-y-10');
                criteriaModal.find('> div').addClass('translate-y-0');
            });

            $('#closeCriteriaModal').on('click', function() {
                criteriaModal.addClass('opacity-0 pointer-events-none');
                criteriaModal.removeClass('opacity-100');
                criteriaModal.find('> div').addClass('translate-y-10');
                criteriaModal.find('> div').removeClass('translate-y-0');
            });

            // Add new criteria
            criteriaForm.on('submit', function(event) {
                event.preventDefault();
                const criteriaInput = $('#criteriaInput').val();
                const newCriteriaHtml = $(`
                    <div class="py-2 px-3 bg-blue-50 text-primary rounded-lg relative group opacity-0 blur-sm transition-all duration-300 ease-in-out">
                        <div class="absolute p-1 rounded-full bg-grayScale-100 border -top-2 -right-2 scale-0 group-hover:scale-100 transition-all ease-in-out cursor-pointer delete-criteria">
                            <i data-feather="x" class="w-4 h-4 aspect-square font-semibold"></i>
                        </div>
                        <p>${criteriaInput}</p>
                    </div>
                `);
                $('.flex.flex-wrap.gap-3').prepend(newCriteriaHtml);
                setTimeout(() => {
                    newCriteriaHtml.removeClass('opacity-0 blur-sm');
                    newCriteriaHtml.addClass('opacity-100 blur-0');
                }, 10);
                feather.replace();
                criteriaModal.addClass('opacity-0 pointer-events-none');
                criteriaModal.removeClass('opacity-100');
                criteriaModal.find('> div').addClass('translate-y-10');
                criteriaModal.find('> div').removeClass('translate-y-0');
                $('#criteriaInput').val('');
            });

            // Remove criteria
            $(document).on('click', '.delete-criteria', function(event) {
                event.preventDefault();
                const criteriaElement = $(this).closest('.py-2.px-3');
                criteriaElement.addClass('opacity-0 blur-sm transition-all duration-300 ease-in-out');
                setTimeout(() => {
                    criteriaElement.remove();
                }, 300);
            });

            // Feather icons replacement
            feather.replace();
        });
    </script>

    <style>
        .ck-editor__editable {
            border-bottom-left-radius: 15px !important;
            border-bottom-right-radius: 15px !important;
            min-height: 300px;
        }

        .ck-toolbar {
            background: #F2F4F7 !important;
            border-top-left-radius: 15px !important;
            border-top-right-radius: 15px !important;
        }

        input[type="date"].placeholder-active::before {
            content: 'Tidak ada Deadline';
            color: #9ca3af;
        }

        input[type="date"].placeholder-active::-webkit-input-placeholder {
            color: #9ca3af;
        }

        input[type="date"].placeholder-active:-ms-input-placeholder {
            color: #9ca3af;
        }

        input[type="date"].placeholder-active::placeholder {
            color: #9ca3af;
        }
    </style>
@endsection
