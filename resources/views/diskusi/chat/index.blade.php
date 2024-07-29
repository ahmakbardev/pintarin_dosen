@extends('layouts.layout')

@section('content')
    <div class="container-index w-full">
        <div class="flex flex-col h-full justify-between">

            <div class="flex flex-col gap-5 pb-10 max-h-[75vh] relative" data-simplebar="">
                <div class="py-10 border-b border-grayScale-500 sticky top-0 bg-white">
                    <div class="shadow-md bg-white py-5 px-5 rounded-lg transition-all ease-in-out">
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
                                <p>Saya masih bingung untuk memahami perbedaan antara prinsip Liskov dengan Interface
                                    Segregation.
                                    Bisa...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-5 py-3">
                    <div class="shadow-md py-5 px-5 rounded-lg transition-all ease-in-out">
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
                                <p>Saya masih bingung untuk memahami perbedaan antara prinsip Liskov dengan Interface
                                    Segregation.
                                    Bisa...</p>
                                <p>Saya masih bingung untuk memahami perbedaan antara prinsip Liskov dengan Interface
                                    Segregation.
                                    Bisa...</p>
                                <p>Saya masih bingung untuk memahami perbedaan antara prinsip Liskov dengan Interface
                                    Segregation.
                                    Bisa...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-3 rounded-lg shadow-md flex justify-between items-end gap-3 relative">
                <div id="editor"
                    class="bg-grayScale-200 w-full py-1 px-3 focus:bg-white outline-none focus:outline-none rounded-lg overflow-hidden"
                    contenteditable="true" placeholder="Tulis Pesan disini..."></div>
                <button class="px-3 py-2 bg-primary text-white rounded-lg h-fit">Balas</button>
            </div>

            <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                CKEDITOR.InlineEditor.create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            "findAndReplace", "selectAll", "|",
                            "heading", "|",
                            "fontSize", "fontFamily", "fontColor", "highlight", "|",
                            "bulletedList", "numberedList", "|",
                            "undo", "redo", "|",
                            "link", "insertImage", "blockQuote", "mediaEmbed",
                            "-",
                            "alignment", "|",
                            "bold", "italic", "strikethrough", "underline", "code", "subscript", "superscript",
                            "removeFormat", "|",
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
                    console.log(editor);
                }).catch(error => {
                    console.error(error);
                });
            </script>

        </div>

    </div>
    <style>
        .ck-rounded-corners .ck.ck-editor__editable:not(.ck-editor__nested-editable),
        .ck.ck-editor__editable.ck-rounded-corners:not(.ck-editor__nested-editable) {
            border-radius: 10px !important;
        }
    </style>
@endsection
