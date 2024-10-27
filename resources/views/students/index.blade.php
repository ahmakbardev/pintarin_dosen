@extends('layouts.layout')

@section('content')
    <div class="container-index w-full h-[100vh] overflow-hidden">
        <div class="flex flex-col gap-5 ">
            @foreach ($users as $user)
                <a href="{{ route('students.detail', $user->id) }}"
                    class="shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out">
                    <div class="flex gap-4">
                        <img src="{{ asset('assets/images/profile/default.png') }}" alt="Profile Image"
                            class="w-16 h-16 rounded-full">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex flex-col">
                                <h1 class="text-lg font-semibold">{{ $user->name }}</h1>
                                <p class="text-sm text-grayScale-400">{{ $user->nim }}</p>
                            </div>
                            <img src="{{ asset('assets/icons/leaderboard.png') }}" alt="Leaderboard Icon">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
