<!DOCTYPE html>
<html lang="en" class="h-[100vh]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/logo/logo_fix.png') }}" type="image/x-icon">

    <title>Pintarin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css?v=1.01') }}">
    <link rel="preload" href="{{ asset('css/app.css?v=1.01') }}" as="style" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    @yield('assets')
</head>

<body class="box-border">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js"
        integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <main class="flex flex-col h-screen">
        @if (!in_array(Route::currentRouteName(), ['login', 'welcome']))
            @include('layouts.components.navbar.navbar')
        @endif
        <div class="flex">
            @if (in_array(Route::currentRouteName(), ['students.detail']))
                @include('layouts.components.sidebar.sidebar')
            @endif
            @yield('content')
        </div>
        @include('layouts.components.toast')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        feather.replace();
        const dosenId = {{ Auth::id() }};
        const pusher = new Pusher('acd4ddbbe09a210bb25e', {
            cluster: 'ap1',
            authEndpoint: '/pusher/auth',
            auth: {
                params: {
                    dosen_id: dosenId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        });

        const channel = pusher.subscribe('private-chat.' + dosenId);

        channel.bind('App\\Events\\MessageSent', function(data) {
            updateDiscussionList(data.chat);
            showToast('New message received!');
        });

        function updateDiscussionList(chat) {
            const discussionItem = $(`.discussion-item[data-dosen-id="${chat.dosen_id}"][data-user-id="${chat.user_id}"]`);

            if (discussionItem.length) {
                discussionItem.find('.text-xl').text(chat.message);
                discussionItem.find('.text-grayScale-400').text(new Date(chat.created_at).toLocaleString());
                discussionItem.find('p:contains("Pembahasan")').text(function(i, text) {
                    const count = parseInt(text.match(/\d+/)[0], 10) + 1;
                    return `${count} Pembahasan`;
                });
            } else {
                // Add new discussion item if it does not exist
                $('#discussionList').prepend(`
                    <a href="/diskusi/chat/${chat.dosen_id}/${chat.user_id}"
                        class="discussion-item shadow-md py-5 px-5 rounded-lg hover:scale-[1.01] hover:shadow-lg transition-all ease-in-out"
                        data-dosen-id="${chat.dosen_id}" data-user-id="${chat.user_id}">
                        <div class="flex flex-col gap-5">
                            <div class="flex gap-5 items-center">
                                <div class="flex gap-4">
                                    <img src="/assets/images/profile/default.png" alt="">
                                    <div class="flex justify-between items-center w-full">
                                        <div class="flex flex-col">
                                            <h1 class="text-lg font-semibold">${chat.user_id}</h1>
                                        </div>
                                    </div>
                                </div>
                                <img src="/assets/icons/ellipse.png" class="w-fit h-fit object-contain" alt="">
                                <p class="text-sm text-grayScale-400">${new Date(chat.created_at).toLocaleString()}</p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h1 class="text-xl font-semibold">${chat.message}</h1>
                                <p>${chat.message}</p>
                            </div>
                            <div class="flex gap-3 items-center">
                                <img src="/assets/icons/bx_chat.svg" alt="">
                                <p>1 Pembahasan</p>
                            </div>
                        </div>
                    </a>
                `);
            }
        }

        @if (!in_array(Route::currentRouteName(), ['diskusi.chat']))
            function showToast(message) {
                var toast = $('<div class="fixed bottom-4 right-4 bg-red-500 text-white py-2 px-4 rounded-md">' + message +
                    '</div>');
                $('body').append(toast);
                setTimeout(() => {
                    toast.fadeOut(function() {
                        toast.remove();
                    });
                }, 3000);
            }
        @endif
    </script>
</body>

</html>
