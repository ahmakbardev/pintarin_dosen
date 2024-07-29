@extends('layouts.layout')

@section('content')
    <div class="flex px-20 w-full py-0">
        <div class="border-r flex-1 max-h-[90vh] p-4" data-simplebar>
            <div class="py-5 pr-5 flex flex-col gap-3" id="questionsContainer">
                <!-- Initial question -->
                <div class="bg-white rounded-lg border border-grayScale-400 flex flex-col gap-3 w-full max-w-[50%] p-5 question-item"
                    data-index="1">
                    <div class="flex gap-2 items-start">
                        <p class="text-lg">1.</p>
                        <textarea style="resize: none" class="text-lg pb-2 outline-none focus:outline-none h-fit overflow-hidden question-text"
                            rows="1" placeholder="Soal 1"></textarea>
                    </div>
                    <div class="flex flex-col gap-3 optionsContainer">
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text"
                                class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary"
                                placeholder="Jawaban A">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text"
                                class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary"
                                placeholder="Jawaban B">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text"
                                class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary"
                                placeholder="Jawaban C">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text"
                                class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary"
                                placeholder="Jawaban D">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text"
                                class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary"
                                placeholder="Jawaban E">
                        </div>
                    </div>
                    <div class="border-t-2 border-grayScale-200 pt-4 flex justify-between gap-5">
                        <div
                            class="toggleEditMode py-2 px-4 rounded-md bg-grayScale-100 flex gap-2 w-full items-center hover:ring transition-all ease-in-out cursor-pointer">
                            <img src="{{ asset('assets/icons/pembahasan.svg') }}" alt="">
                            <p class="text-sm font-medium">Kunci Jawaban</p>
                        </div>
                        <textarea
                            class="description-textarea border border-primary w-full h-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary transition-transform transform scale-95 opacity-0"
                            style="resize: none;" placeholder="Deskripsi jawaban benar"></textarea>
                    </div>
                </div>
            </div>
            <div id="addQuestionButton"
                class="flex py-3 px-5 bg-grayScale-100 rounded-lg w-full max-w-[50%] hover:ring transition-all ease-in-out cursor-pointer">
                Tambah Soal
            </div>
        </div>
        <div class="max-w-md px-5 py-5 flex flex-col gap-5">
            <div class="grid grid-cols-4 gap-4" id="questionList">
                <div class="question-list-item bg-grayScale-100 rounded-lg flex justify-center items-center px-3 py-2 aspect-square hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out cursor-pointer"
                    data-index="1">1</div>
            </div>
            <button
                class="py-2 px-5 text-base w-full bg-primary text-white rounded-lg hover:ring transition-all ease-in-out">Unggah</button>
        </div>
    </div>

    <!-- Tambahkan ini dalam <body> untuk modal -->
    <div id="uploadModal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-10">
        <div id="modalContent"
            class="bg-white p-8 rounded-lg transform translate-y-10 transition-transform duration-300 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-center">Konfirmasi Unggah</h2>
            <p class="mb-4 text-center">Apakah Anda yakin ingin mengunggah?</p>
            <div class="flex justify-end gap-3 mt-8">
                <button type="button" id="closeUploadModal"
                    class="px-4 py-2 bg-white hover:ring rounded-lg transition-all ease-in-out">Batal</button>
                <button type="button" id="confirmUploadButton"
                    class="px-4 py-2 bg-primary text-white hover:bg-blue-600 hover:ring transition-all ease-in-out rounded-lg">Unggah</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadButton = document.querySelector('button.bg-primary');
            const uploadModal = document.getElementById('uploadModal');
            const modalContent = document.getElementById('modalContent');
            const closeUploadModalButton = document.getElementById('closeUploadModal');
            const confirmUploadButton = document.getElementById('confirmUploadButton');

            uploadButton.addEventListener('click', function() {
                uploadModal.classList.remove('opacity-0', 'pointer-events-none');
                uploadModal.classList.add('opacity-100', 'pointer-events-auto');
                modalContent.classList.remove('translate-y-10');
                modalContent.classList.add('translate-y-0');
            });

            function closeModal() {
                uploadModal.classList.remove('opacity-100', 'pointer-events-auto');
                uploadModal.classList.add('opacity-0', 'pointer-events-none');
                modalContent.classList.remove('translate-y-0');
                modalContent.classList.add('translate-y-10');
            }

            closeUploadModalButton.addEventListener('click', closeModal);

            confirmUploadButton.addEventListener('click', function() {
                // Tambahkan logika untuk konfirmasi unggah
                console.log("Unggah dikonfirmasi");
                closeModal();
            });
        });
    </script>


    <script>
        function initializeEditModeToggle(toggleEditModeButton, questionIndex) {
            toggleEditModeButton.addEventListener('click', function() {
                const questionItem = toggleEditModeButton.closest('.question-item');
                const editableElements = questionItem.querySelectorAll('.editable, .answer-wrapper');
                const descriptionTextarea = questionItem.querySelector('.description-textarea');
                const isEditMode = toggleEditModeButton.classList.toggle('edit-mode');

                const editModeText = isEditMode ? "Selesai Mengedit" : "Kunci Jawaban";
                toggleEditModeButton.querySelector('p').textContent = editModeText;

                // Always show the description textarea if it has value
                if (descriptionTextarea && descriptionTextarea.value.trim() !== '') {
                    descriptionTextarea.classList.add('scale-100', 'opacity-100');
                    descriptionTextarea.classList.remove('scale-95', 'opacity-0');
                }

                editableElements.forEach((element) => {
                    if (isEditMode && element.tagName.toLowerCase() === 'input') {
                        const textContent = element.value;
                        const wrapperDiv = document.createElement('div');
                        wrapperDiv.className =
                            'answer-wrapper relative flex flex-col items-start w-full py-2 px-4 rounded-md transition-colors';

                        const label = document.createElement('label');
                        label.className = 'relative flex items-center w-full';
                        label.innerHTML = `
                        <input type="radio" name="radio${questionIndex}" class="hidden peer">
                        <span class="w-5 h-5 border-2 border-gray-300 rounded-full peer-checked:border-green-500 peer-checked:bg-green-500 flex items-center justify-center">
                            <span class="w-4 h-4 border-2 border-white rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                        </span>
                        <span class="ml-3 text-gray-700 peer-checked:text-green-600">${textContent}</span>
                        <svg class="w-5 h-5 text-green-600 hidden peer-checked:block ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    `;

                        label.querySelector('input[type="radio"]').addEventListener('change', function() {
                            document.querySelectorAll(`.question-item .answer-wrapper`).forEach(l =>
                                l.classList.remove('bg-green-50'));
                            wrapperDiv.classList.add('bg-green-50');

                            // Set the description value for the new selected answer
                            const selectedInput = wrapperDiv.querySelector('input[type="radio"]');
                            if (selectedInput && descriptionTextarea) {
                                descriptionTextarea.value = selectedInput.dataset.description || '';
                                descriptionTextarea.classList.add('scale-100', 'opacity-100');
                                descriptionTextarea.classList.remove('scale-95', 'opacity-0');
                            }
                        });

                        // Check if the element was previously selected
                        if (element.dataset.selected === 'true') {
                            label.querySelector('input[type="radio"]').checked = true;
                            wrapperDiv.classList.add('bg-green-50');
                            if (descriptionTextarea) {
                                descriptionTextarea.value = element.dataset.description || '';
                                descriptionTextarea.classList.add('scale-100', 'opacity-100');
                                descriptionTextarea.classList.remove('scale-95', 'opacity-0');
                            }
                        }

                        wrapperDiv.appendChild(label);
                        element.replaceWith(wrapperDiv);
                    } else if (!isEditMode && element.classList.contains('answer-wrapper')) {
                        const wrapperDiv = element;
                        const label = wrapperDiv.querySelector('label');
                        const textContent = label.querySelector('.ml-3').textContent;
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.value = textContent;
                        input.classList.add('editable', 'w-full', 'py-2', 'px-4', 'rounded-md',
                            'outline-none', 'focus:ring', 'focus:border-primary');

                        // Store the description value in the dataset
                        if (descriptionTextarea) {
                            input.dataset.description = descriptionTextarea.value;
                        }

                        if (label.querySelector('input[type="radio"]').checked) {
                            input.dataset.selected = 'true';
                            input.classList.add('bg-green-50');
                        }

                        wrapperDiv.replaceWith(input);

                        // Preserve the description textarea value and do not remove it
                        if (descriptionTextarea && descriptionTextarea.value.trim() !== '') {
                            descriptionTextarea.classList.add('scale-100', 'opacity-100');
                            descriptionTextarea.classList.remove('scale-95', 'opacity-0');
                        }
                    }
                });
            });
        }


        document.addEventListener('DOMContentLoaded', function() {
            const questionsContainer = document.getElementById('questionsContainer');
            const addQuestionButton = document.getElementById('addQuestionButton');
            const questionList = document.getElementById('questionList');
            let questionCount = 1;

            addQuestionButton.addEventListener('click', function() {
                questionCount++;
                if (questionCount >= 10) {
                    addQuestionButton.style.display = 'none';
                }

                const newQuestion = document.createElement('div');
                newQuestion.className =
                    'bg-white rounded-lg border border-grayScale-400 flex flex-col gap-3 w-full max-w-[50%] p-5 question-item transition-transform transform scale-95 opacity-0';
                newQuestion.dataset.index = questionCount;
                newQuestion.innerHTML = `
                        <div class="flex gap-2 items-start">
                            <p class="text-lg">${questionCount}.</p>
                            <textarea style="resize: none" class="text-lg pb-2 outline-none focus:outline-none h-fit overflow-hidden question-text" rows="1" placeholder="Soal ${questionCount}"></textarea>
                        </div>
                        <div class="flex flex-col gap-3 optionsContainer">
                            <div class="relative flex items-center rounded-md transition-colors">
                                <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" placeholder="Jawaban A">
                            </div>
                            <div class="relative flex items-center rounded-md transition-colors">
                                <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" placeholder="Jawaban B">
                            </div>
                            <div class="relative flex items-center rounded-md transition-colors">
                                <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" placeholder="Jawaban C">
                            </div>
                            <div class="relative flex items-center rounded-md transition-colors">
                                <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" placeholder="Jawaban D">
                            </div>
                            <div class="relative flex items-center rounded-md transition-colors">
                                <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" placeholder="Jawaban E">
                            </div>
                        </div>
                        <div class="border-t-2 border-grayScale-200 pt-4 flex justify-between gap-5">
                            <div class="toggleEditMode py-2 px-4 rounded-md bg-grayScale-100 flex gap-2 w-full items-center hover:ring transition-all ease-in-out cursor-pointer">
                                <img src="{{ asset('assets/icons/pembahasan.svg') }}" alt="">
                                <p class="text-sm font-medium">Kunci Jawaban</p>
                            </div>
                            <textarea class="description-textarea border border-primary w-full h-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary transition-transform transform scale-95 opacity-0" style="resize: none;" placeholder="Deskripsi jawaban benar"></textarea>
                        </div>
                    `;
                questionsContainer.appendChild(newQuestion);

                const questionListItem = document.createElement('div');
                questionListItem.className =
                    'question-list-item bg-grayScale-100 rounded-lg flex justify-center items-center px-3 py-2 aspect-square hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out cursor-pointer';
                questionListItem.dataset.index = questionCount;
                questionListItem.textContent = questionCount;
                questionList.appendChild(questionListItem);

                setTimeout(() => {
                    newQuestion.classList.remove('scale-95', 'opacity-0');
                    newQuestion.classList.add('scale-100', 'opacity-100');
                }, 100);

                initializeTextarea(newQuestion.querySelector('textarea'));
                initializeEditModeToggle(newQuestion.querySelector('.toggleEditMode'), questionCount);
                initializeQuestionListItem(questionListItem);
            });

            function initializeTextarea(textarea) {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });

                textarea.style.height = 'auto';
                textarea.style.height = (textarea.scrollHeight) + 'px';
            }

            function initializeQuestionListItem(questionListItem) {
                questionListItem.addEventListener('click', function() {
                    const questionIndex = questionListItem.dataset.index;
                    const questionItem = document.querySelector(
                        `.question-item[data-index="${questionIndex}"]`);

                    questionItem.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('highlight');
                                setTimeout(() => {
                                    entry.target.classList.remove('highlight');
                                }, 2000); // 1.5s delay + 0.5s animation duration
                                observer.unobserve(entry.target);
                            }
                        });
                    }, {
                        root: null,
                        threshold: 0.5 // Adjust as needed to define "center"
                    });

                    observer.observe(questionItem);

                    document.querySelectorAll('.question-list-item').forEach(item => {
                        item.classList.remove('bg-white', 'ring-1', 'ring-primary');
                        item.classList.add('bg-grayScale-100');
                    });

                    questionListItem.classList.add('bg-white', 'ring-1', 'ring-primary');
                    questionListItem.classList.remove('bg-grayScale-100');
                });
            }

            initializeEditModeToggle(document.querySelector('.toggleEditMode'), 1);
            initializeQuestionListItem(document.querySelector('.question-list-item[data-index="1"]'));
        });
    </script>
    <style>
        .description {
            transition: all 0.3s ease-in-out;
        }

        .highlight {
            animation: highlight-animation 0.5s ease-in-out;
        }

        @keyframes highlight-animation {
            0% {
                transform: scale(1.05);
                box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
            }

            100% {
                transform: scale(1);
                box-shadow: none;
            }
        }
    </style>
@endsection
