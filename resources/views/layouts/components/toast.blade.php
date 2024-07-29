<div id="toast-container" class="fixed bottom-10 right-5 z-50 flex flex-col gap-2"></div>

<script>
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toast-container');
        const iconTypes = {
            success: 'check-circle',
            error: 'x-circle',
            warning: 'alert-circle',
            info: 'info'
        };

        const bgColorClasses = {
            success: 'bg-green-500',
            error: 'bg-red-500',
            warning: 'bg-yellow-500',
            info: 'bg-blue-500'
        };

        const toast = document.createElement('div');
        toast.className =
            `toast-${type} p-4 rounded-lg shadow-lg ${bgColorClasses[type]} text-white flex items-center justify-between transition-opacity duration-300 opacity-0 transform translate-y-5`;
        toast.innerHTML = `
        <div class="flex items-center">
            <i data-feather="${iconTypes[type]}" class="mr-2"></i>
            <span>${message}</span>
        </div>
    `;

        toastContainer.appendChild(toast);

        feather.replace();

        setTimeout(() => {
            toast.classList.add('opacity-100', 'translate-y-0');
        }, 100);

        setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }
</script>
