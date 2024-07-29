@extends('layouts.layout')

@section('content')
    <div class="flex px-20 w-full py-0">
        <div class="border-r flex-1 max-h-[90vh] p-4" data-simplebar>
            <form id="postTestForm"
                action="{{ route('classwork.prinsip.post-test.update', ['topic' => $topic, 'modul' => $modul->id, 'id' => $postTests->first()->id ?? 0]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="py-5 pr-5 flex flex-col gap-3" id="questionsContainer">
                    @foreach ($postTests as $index => $postTest)
                        <div class="bg-white rounded-lg border border-grayScale-400 flex flex-col gap-3 w-full max-w-[50%] p-5 question-item"
                            data-index="{{ $index }}">
                            <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $postTest->id }}">
                            <div class="flex gap-2 items-start">
                                <p class="text-lg">{{ $index + 1 }}.</p>
                                <textarea style="resize: none" class="text-lg pb-2 outline-none focus:outline-none h-fit overflow-hidden question-text"
                                    rows="1" name="questions[{{ $index }}][question]" placeholder="Soal {{ $index + 1 }}">{{ $postTest->question }}</textarea>
                            </div>
                            <div class="flex flex-col gap-3 optionsContainer">
                                @if (is_array($postTest->answers))
                                    @foreach ($postTest->answers as $answerIndex => $answer)
                                        <div
                                            class="relative flex items-center rounded-md transition-colors @if ($answer == $postTest->correct_answer) bg-green-50 @endif">
                                            <input type="text"
                                                class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary"
                                                name="questions[{{ $index }}][answers][]"
                                                placeholder="Jawaban {{ chr(65 + $answerIndex) }}"
                                                value="{{ $answer }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="border-t-2 border-grayScale-200 pt-4 flex justify-between gap-5">
                                <div class="toggleEditMode py-2 px-4 rounded-md bg-grayScale-100 flex gap-2 w-full items-center hover:ring transition-all ease-in-out cursor-pointer"
                                    data-toggle-index="{{ $index }}">
                                    <img src="{{ asset('assets/icons/pembahasan.svg') }}" alt="">
                                    <p class="text-sm font-medium">Kunci Jawaban</p>
                                </div>
                                <textarea
                                    class="description-textarea border border-primary w-full h-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary transition-transform transform scale-95 opacity-0"
                                    style="resize: none;" name="questions[{{ $index }}][description]" placeholder="Deskripsi jawaban benar">{{ $postTest->description }}</textarea>
                                <input type="hidden" class="correct-answer"
                                    name="questions[{{ $index }}][correct_answer]"
                                    value="{{ $postTest->correct_answer }}">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="addQuestionButton"
                    class="flex py-3 px-5 bg-grayScale-100 rounded-lg w-full max-w-[50%] hover:ring transition-all ease-in-out cursor-pointer">
                    Tambah Soal
                </div>
            </form>
        </div>
        <div class="max-w-md px-5 py-5 flex flex-col gap-5">
            <div class="grid grid-cols-4 gap-4" id="questionList">
                @foreach ($postTests as $index => $postTest)
                    <div class="question-list-item bg-grayScale-100 rounded-lg flex justify-center items-center px-3 py-2 aspect-square hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out cursor-pointer"
                        data-index="{{ $index }}">{{ $index + 1 }}</div>
                @endforeach
            </div>
            <button type="button" id="uploadButton"
                class="py-2 px-5 text-base w-full bg-primary text-white rounded-lg hover:ring transition-all ease-in-out">Unggah</button>
        </div>
    </div>

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

    <div id="toastReminder" class="fixed bottom-4 right-4 space-y-2 z-50 hover:-translate-y-2 transition-all ease-in-out">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadButton = document.getElementById('uploadButton');
            const uploadModal = document.getElementById('uploadModal');
            const modalContent = document.getElementById('modalContent');
            const closeUploadModalButton = document.getElementById('closeUploadModal');
            const confirmUploadButton = document.getElementById('confirmUploadButton');
            const postTestForm = document.getElementById('postTestForm');

            // Function to add bg-green-50 to correct answers on page load
            function highlightCorrectAnswers() {
                document.querySelectorAll('.question-item').forEach(question => {
                    const correctAnswer = question.querySelector('.correct-answer').value;
                    question.querySelectorAll('.editable').forEach(input => {
                        if (input.value === correctAnswer) {
                            input.classList.add('bg-green-50');
                        }
                    });
                });
            }

            highlightCorrectAnswers(); // Call this function when the page loads

            uploadButton.addEventListener('click', function() {
                if (isAnyQuestionInEditMode()) {
                    showEditModeReminder();
                    return;
                }
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
                const questions = document.querySelectorAll('.question-item');
                const formData = [];

                questions.forEach((question, index) => {
                    const questionText = question.querySelector('.question-text').value.trim();
                    const description = question.querySelector('.description-textarea').value
                        .trim();
                    const correctAnswer = question.querySelector('.correct-answer').value.trim();
                    const options = question.querySelectorAll('.optionsContainer .editable');

                    const answers = [];
                    options.forEach(option => {
                        if (option.value.trim() !== '') {
                            answers.push(option.value.trim());
                        }
                    });

                    // Validasi jika semua field ada isinya
                    if (questionText !== '' && description !== '' && correctAnswer !== '' && answers
                        .length > 0) {
                        const questionData = {
                            question: questionText,
                            description: description,
                            correct_answer: correctAnswer,
                            answers: answers
                        };

                        const questionId = question.querySelector(
                            `input[name="questions[${index}][id]"]`);
                        if (questionId) {
                            questionData.id = questionId.value;
                        }

                        formData.push(questionData);
                    }
                });

                // Clear previous hidden inputs
                const previousInputs = postTestForm.querySelectorAll('input[type="hidden"]');
                previousInputs.forEach(input => input.remove());

                // Add CSRF token and PUT method
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const tokenInput = document.createElement('input');
                tokenInput.type = 'hidden';
                tokenInput.name = '_token';
                tokenInput.value = csrfToken;
                postTestForm.appendChild(tokenInput);

                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                postTestForm.appendChild(methodInput);

                formData.forEach((questionData, validIndex) => {
                    Object.keys(questionData).forEach(key => {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = `questions[${validIndex}][${key}]`;
                        hiddenInput.value = Array.isArray(questionData[key]) ? JSON
                            .stringify(questionData[key]) : questionData[key];
                        postTestForm.appendChild(hiddenInput);
                    });
                });

                postTestForm.submit();
                closeModal();
            });

            const questionsContainer = document.getElementById('questionsContainer');
            const addQuestionButton = document.getElementById('addQuestionButton');
            const questionList = document.getElementById('questionList');
            let questionCount = {{ count($postTests) }};

            addQuestionButton.addEventListener('click', function() {
                const newIndex = questionCount++;
                const newQuestion = document.createElement('div');
                newQuestion.className =
                    'bg-white rounded-lg border border-grayScale-400 flex flex-col gap-3 w-full max-w-[50%] p-5 question-item';
                newQuestion.dataset.index = newIndex;
                newQuestion.innerHTML = `
                    <div class="flex gap-2 items-start">
                        <p class="text-lg">${newIndex + 1}.</p>
                        <textarea style="resize: none" class="text-lg pb-2 outline-none focus:outline-none h-fit overflow-hidden question-text" rows="1" name="questions[${newIndex}][question]" placeholder="Soal ${newIndex + 1}"></textarea>
                    </div>
                    <div class="flex flex-col gap-3 optionsContainer">
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" name="questions[${newIndex}][answers][]" placeholder="Jawaban A">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" name="questions[${newIndex}][answers][]" placeholder="Jawaban B">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" name="questions[${newIndex}][answers][]" placeholder="Jawaban C">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" name="questions[${newIndex}][answers][]" placeholder="Jawaban D">
                        </div>
                        <div class="relative flex items-center rounded-md transition-colors">
                            <input type="text" class="editable w-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary" name="questions[${newIndex}][answers][]" placeholder="Jawaban E">
                        </div>
                    </div>
                    <div class="border-t-2 border-grayScale-200 pt-4 flex justify-between gap-5">
                        <div class="toggleEditMode py-2 px-4 rounded-md bg-grayScale-100 flex gap-2 w-full items-center hover:ring transition-all ease-in-out cursor-pointer" data-toggle-index="${newIndex}">
                            <img src="{{ asset('assets/icons/pembahasan.svg') }}" alt="">
                            <p class="text-sm font-medium">Kunci Jawaban</p>
                        </div>
                        <textarea class="description-textarea border border-primary w-full h-full py-2 px-4 rounded-md outline-none focus:ring focus:border-primary transition-transform transform scale-95 opacity-0" style="resize: none;" name="questions[${newIndex}][description]" placeholder="Deskripsi jawaban benar"></textarea>
                        <input type="hidden" class="correct-answer" name="questions[${newIndex}][correct_answer]" value="">
                    </div>
                `;
                questionsContainer.appendChild(newQuestion);

                const questionListItem = document.createElement('div');
                questionListItem.className =
                    'question-list-item bg-grayScale-100 rounded-lg flex justify-center items-center px-3 py-2 aspect-square hover:bg-white hover:ring-1 hover:ring-primary transition-all ease-in-out cursor-pointer';
                questionListItem.dataset.index = newIndex;
                questionListItem.textContent = newIndex + 1;
                questionList.appendChild(questionListItem);

                setTimeout(() => {
                    newQuestion.classList.add('scale-100', 'opacity-100');
                }, 100);

                initializeTextarea(newQuestion.querySelector('textarea'));
                initializeEditModeToggle(newQuestion.querySelector('.toggleEditMode'), newIndex);
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
                                }, 2000);
                                observer.unobserve(entry.target);
                            }
                        });
                    }, {
                        root: null,
                        threshold: 0.5
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

            function initializeEditModeToggle(toggleEditModeButton, questionIndex) {
                toggleEditModeButton.addEventListener('click', function() {
                    const questionItem = toggleEditModeButton.closest('.question-item');
                    const editableElements = questionItem.querySelectorAll('.editable, .answer-wrapper');
                    const descriptionTextarea = questionItem.querySelector('.description-textarea');
                    const correctAnswerInput = questionItem.querySelector('.correct-answer');
                    const isEditMode = toggleEditModeButton.classList.toggle('edit-mode');

                    const editModeText = isEditMode ? "Selesai Mengedit" : "Kunci Jawaban";
                    toggleEditModeButton.querySelector('p').textContent = editModeText;

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
                                <input type="radio" name="radio${questionIndex}" class="hidden peer" data-answer="${textContent}">
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

                            label.querySelector('input[type="radio"]').addEventListener('change',
                                function() {
                                    document.querySelectorAll(`.question-item .answer-wrapper`)
                                        .forEach(l => l.classList.remove('bg-green-50'));
                                    wrapperDiv.classList.add('bg-green-50');

                                    const selectedInput = wrapperDiv.querySelector(
                                        'input[type="radio"]');
                                    if (selectedInput && descriptionTextarea) {
                                        descriptionTextarea.value = selectedInput.dataset
                                            .description || '';
                                        descriptionTextarea.classList.add('scale-100',
                                            'opacity-100');
                                        descriptionTextarea.classList.remove('scale-95',
                                            'opacity-0');
                                        correctAnswerInput.value = selectedInput.dataset
                                            .answer || '';
                                    }
                                });

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

                            if (descriptionTextarea) {
                                input.dataset.description = descriptionTextarea.value;
                            }

                            if (label.querySelector('input[type="radio"]').checked) {
                                input.dataset.selected = 'true';
                                input.classList.add('bg-green-50');
                            }

                            wrapperDiv.replaceWith(input);

                            if (descriptionTextarea && descriptionTextarea.value.trim() !== '') {
                                descriptionTextarea.classList.add('scale-100', 'opacity-100');
                                descriptionTextarea.classList.remove('scale-95', 'opacity-0');
                            }
                        }
                    });
                });
            }

            function isAnyQuestionInEditMode() {
                const questions = document.querySelectorAll('.question-item');
                let inEditMode = false;

                questions.forEach((question) => {
                    const toggleEditModeButton = question.querySelector('.toggleEditMode');
                    if (toggleEditModeButton && toggleEditModeButton.classList.contains('edit-mode')) {
                        inEditMode = true;
                    }
                });

                return inEditMode;
            }

            function showEditModeReminder() {
                const toastContainer = document.getElementById('toastReminder');
                const toast = document.createElement('div');
                toast.className =
                    'bg-red-500 text-white p-4 rounded-lg shadow-lg flex items-center space-x-2 custom-animate';
                toast.innerHTML = `
                    <i data-feather="info" class="text-xs"></i>
                    <span>Ada soal yang masih dalam mode edit. Selesaikan pengeditan sebelum mengunggah.</span>
                    <button id="closeEditModeReminder" class="ml-2 bg-transparent text-white focus:outline-none">OK</button>
                `;

                toastContainer.appendChild(toast);

                feather.replace();

                const closeReminderButton = toast.querySelector('#closeEditModeReminder');
                closeReminderButton.addEventListener('click', function() {
                    toast.remove();
                });

                setTimeout(() => {
                    toast.remove();
                }, 5000);
            }

            document.querySelectorAll('.toggleEditMode').forEach((toggleEditModeButton, index) => {
                initializeEditModeToggle(toggleEditModeButton, index);
            });
            document.querySelectorAll('.question-list-item').forEach((questionListItem) => {
                initializeQuestionListItem(questionListItem);
            });
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

        .custom-animate {
            animation: fadeInOut 5s ease-in-out;
        }

        @keyframes fadeInOut {

            0%,
            100% {
                opacity: 0;
                transform: translateY(20px);
            }

            10%,
            90% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
