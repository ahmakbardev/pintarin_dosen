@extends('layouts.layout')

@section('content')
    <div class="container-index w-full">
        {{-- @include('diskusi.components.select')

        <div class="py-5 flex items-center gap-3">
            <p class="text-lg font-medium">Urutkan Berdasarkan :</p>
            @include('diskusi.components.select-urutan')
        </div> --}}

        <div id="discussionList" class="flex flex-col gap-5 pb-10">
            @foreach ($discussions as $discussion)
                <a href="{{ route('diskusi.chat', ['dosen_id' => $discussion->dosen_id, 'user_id' => $discussion->user_id]) }}"
                    class="discussion-item shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out"
                    data-dosen-id="{{ $discussion->dosen_id }}" data-user-id="{{ $discussion->user_id }}">
                    <div class="flex flex-col gap-5">
                        <div class="flex gap-5 items-center">
                            <div class="flex gap-4">
                                <img src="{{ $discussion->user_profile_pic ? asset('assets/images/profile/' . $discussion->user_profile_pic) : asset('assets/images/profile/default.png') }}"
                                    alt="">
                                <div class="flex justify-between items-center w-full">
                                    <div class="flex flex-col">
                                        <h1 class="text-lg font-semibold">{{ $discussion->user_name }}</h1>
                                        {{-- <p class="text-sm text-grayScale-400">{{ $discussion->user_id }}</p> --}}
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('assets/icons/ellipse.png') }}" class="w-fit h-fit object-contain"
                                alt="">
                            <p class="text-sm text-grayScale-400">
                                {{ \Carbon\Carbon::parse($discussion->created_at)->diffForHumans() }}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <h1 class="text-xl font-semibold">{{ Str::limit($discussion->message, 50) }}</h1>
                            <p>{{ Str::limit($discussion->message, 100) }}</p>
                        </div>
                        <div class="flex gap-3 items-center">
                            <img src="{{ asset('assets/icons/bx_chat.svg') }}" alt="">
                            <p>{{ DB::table('chats')->where('dosen_id', $discussion->dosen_id)->where('user_id', $discussion->user_id)->count() }}
                                Pembahasan</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
