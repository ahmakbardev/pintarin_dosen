<div class="relative inline-block w-full">
    <div class="relative">
        <button id="select-button"
            class="w-full bg-grayScale-100 rounded-2xl shadow-md pl-3 pr-10 py-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
            <span id="selected-value">Pilih opsi</span>
            <span class="absolute inset-y-0 right-0 top-1/2 -translate-y-1/2 flex items-center pr-2 pointer-events-none">
                <i data-feather="chevron-down"></i>
            </span>
        </button>
        <div id="options" class="hidden absolute mt-1 w-full rounded-md bg-white shadow-lg z-10">
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
</div>

<script>
    document.getElementById('select-button').addEventListener('click', function() {
        const options = document.getElementById('options');
        options.classList.toggle('hidden');
        if (!options.classList.contains('hidden')) {
            options.classList.remove('animate-out');
            options.classList.add('animate-in');
        } else {
            options.classList.remove('animate-in');
            options.classList.add('animate-out');
        }
    });

    document.querySelectorAll('#options li').forEach(option => {
        option.addEventListener('click', function() {
            document.getElementById('selected-value').textContent = this.getAttribute('data-value');
            document.getElementById('options').classList.add('hidden');
        });
    });

    document.addEventListener('click', function(e) {
        const options = document.getElementById('options');
        const button = document.getElementById('select-button');
        if (!button.contains(e.target) && !options.contains(e.target)) {
            options.classList.add('hidden');
        }
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
