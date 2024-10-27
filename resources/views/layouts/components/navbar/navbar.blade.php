<div id="navbar" class="shadow-sm sticky top-0 z-[2] container-nav flex justify-between items-center bg-primary">
    <a href="/" class="flex gap-3 items-center w-fit">
        <img src="{{ asset('assets/logo/logo_fix.png') }}" class="w-10 object-contain" alt="">
        <h1 class="text-lg font-bold text-white">Pintarin.edu</h1>
    </a>
    <div class="breadcrumb hidden md:flex gap-10 items-center justify-center w-full text-white">
        <a href="{{ route('home') }}" class="{{ request()->is('home*') ? 'font-bold' : '' }}">Classwork</a>
        <a href="{{ route('students') }}" class="{{ request()->is('students*') ? 'font-bold' : '' }}">Students</a>
        <a href="{{ route('diskusi') }}" class="{{ request()->is('diskusi*') ? 'font-bold' : '' }}">Diskusi</a>
        {{-- <a href="{{ route('track') }}" class="{{ request()->is('track*') ? 'font-bold' : '' }}">Track</a> --}}
        <a href="{{ route('nilai.index') }}" class="{{ request()->is('nilai*') ? 'font-bold' : '' }}">Nilai</a>
    </div>
    <div class="hidden md:flex search flex hover:cursor-pointer">
        <div class="w-14 aspect-square rounded-full relative" id="profile">
            <img src="{{ asset('assets/images/profile/default.png') }}"
                class="w-full object-cover hover:border-grayScale-500 transition-all ease-in-out rounded-full"
                alt="">
        </div>
        <div id="profile-menu"
            class="hidden absolute right-0 top-[75px] mt-2 w-48 bg-white rounded-md shadow-lg py-2 transition-opacity duration-300 ease-in-out transform opacity-0 translate-y-5">
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
            <form action="{{ route('logout') }}" method="POST"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                @csrf
                <button type="submit" class="w-full text-left">Logout</button>
            </form>
        </div>
    </div>
    <button id="burger" class="md:hidden flex flex-col gap-1.5 p-3">
        <div class="w-5 h-0.5 bg-white"></div>
        <div class="w-5 h-0.5 bg-white"></div>
        <div class="w-5 h-0.5 bg-white"></div>
    </button>
</div>

<div id="mobile-menu"
    class="fixed top-0 left-0 w-full h-full bg-primary text-white flex flex-col p-4 transition-transform duration-300 ease-in-out transform -translate-y-full md:hidden z-40">
    <a href="{{ route('home') }}" class="py-2 {{ request()->is('home*') ? 'font-bold underline' : '' }}">Classwork</a>
    <a href="{{ route('students') }}"
        class="py-2 {{ request()->is('students*') ? 'font-bold underline' : '' }}">Students</a>
    <a href="{{ route('diskusi') }}"
        class="py-2 {{ request()->is('diskusi*') ? 'font-bold underline' : '' }}">Diskusi</a>
    <a href="{{ route('nilai.index') }}" class="py-2 {{ request()->is('nilai*') ? 'font-bold underline' : '' }}">Nilai</a>
</div>

<script>
    document.getElementById('burger').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.classList.contains('-translate-y-full')) {
            mobileMenu.classList.remove('-translate-y-full');
            mobileMenu.classList.add('translate-y-0');
        } else {
            mobileMenu.classList.add('-translate-y-full');
            mobileMenu.classList.remove('translate-y-0');
        }
    });

    document.getElementById('profile').addEventListener('click', function() {
        var profileMenu = document.getElementById('profile-menu');
        if (profileMenu.classList.contains('hidden')) {
            profileMenu.classList.remove('hidden');
            setTimeout(() => {
                profileMenu.classList.remove('opacity-0', 'translate-y-5');
                profileMenu.classList.add('opacity-100', 'translate-y-0');
            }, 10);
        } else {
            profileMenu.classList.add('opacity-0', 'translate-y-5');
            profileMenu.classList.remove('opacity-100', 'translate-y-0');
            setTimeout(() => {
                profileMenu.classList.add('hidden');
            }, 300);
        }
    });

    document.addEventListener('click', function(event) {
        var profile = document.getElementById('profile');
        var profileMenu = document.getElementById('profile-menu');
        if (!profile.contains(event.target) && !profileMenu.contains(event.target)) {
            profileMenu.classList.add('opacity-0', 'translate-y-5');
            profileMenu.classList.remove('opacity-100', 'translate-y-0');
            setTimeout(() => {
                profileMenu.classList.add('hidden');
            }, 300);
        }
    });
</script>
