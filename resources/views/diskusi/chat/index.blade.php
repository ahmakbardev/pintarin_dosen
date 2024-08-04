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
                                    <img src="{{ asset('assets/images/profile/' . ($user->profile_pic ?? 'default.png')) }}"
                                        alt="">
                                    <div class="flex justify-between items-center w-full">
                                        <div class="flex flex-col">
                                            <h1 class="text-lg font-semibold">{{ $user->name }}</h1>
                                            <p class="text-sm text-grayScale-400">{{ $user->id }}</p>
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
                        </div>
                    </div>
                </div>
                <div id="chatContainer" class="flex flex-col gap-5 py-3">
                    <!-- Messages will be appended here -->
                </div>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-md flex justify-between items-end gap-3 relative">
                <div id="editor"
                    class="bg-grayScale-200 w-full py-1 px-3 focus:bg-white outline-none focus:outline-none rounded-lg overflow-hidden"
                    contenteditable="true" placeholder="Tulis Pesan disini..."></div>
                <button id="sendMessageButton" class="px-3 py-2 bg-primary text-white rounded-lg h-fit">Balas</button>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
            <script>
                var dosenId = {{ $dosen_id }};
                var userId = {{ $user_id }};
                var chatContainer = $('#chatContainer');
                var lastMessageId = null;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                const pusher = new Pusher('b13119368dad85510365', {
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
                    validateAndAddMessage(data.chat);
                    showToast('New message received!');
                });

                function fetchMessages() {
                    $.ajax({
                        url: `/fetch-messages/${dosenId}/${userId}`,
                        method: 'GET',
                        success: function(messages) {
                            chatContainer.empty();
                            messages.forEach(function(message) {
                                addMessage(message);
                            });
                            if (messages.length > 0) {
                                lastMessageId = messages[messages.length - 1].id;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching messages:', error);
                        }
                    });
                }

                function validateAndAddMessage(message) {
                    if (lastMessageId !== message.id) {
                        addMessage(message);
                        lastMessageId = message.id;
                    }
                }

                function addMessage(message) {
                    var sender = message.sender === 'dosen' ? 'Dosen' : 'User';
                    chatContainer.append(`
                        <div class="shadow-md py-5 px-5 rounded-lg transition-all ease-in-out">
                            <div class="flex flex-col gap-5">
                                <div class="flex gap-5 items-center">
                                    <div class="flex gap-4">
                                        <img src="{{ asset('assets/images/profile/default.png') }}" alt="">
                                        <div class="flex justify-between items-center w-full">
                                            <div class="flex flex-col">
                                                <h1 class="text-lg font-semibold">${sender}</h1>
                                                <p class="text-sm text-grayScale-400">${message.user_id}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/icons/ellipse.png') }}" class="w-fit h-fit object-contain" alt="">
                                    <p class="text-sm text-grayScale-400">${new Date(message.created_at).toLocaleString()}</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <p>${message.message}</p>
                                </div>
                            </div>
                        </div>
                    `);
                }

                $('#sendMessageButton').on('click', function() {
                    var message = $('#editor').text();
                    if (message.trim() === '') {
                        showToast('Pesan tidak boleh kosong');
                        return;
                    }

                    $.ajax({
                        url: '/send-message',
                        method: 'POST',
                        data: {
                            message: message,
                            dosen_id: dosenId,
                            user_id: userId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#editor').text('');
                            fetchMessages();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error sending message:', error);
                        }
                    });
                });

                // function showToast(message) {
                //     var toast = $('<div class="fixed bottom-4 right-4 bg-red-500 text-white py-2 px-4 rounded-md">' + message +
                //         '</div>');
                //     $('body').append(toast);
                //     setTimeout(() => {
                //         toast.fadeOut(function() {
                //             toast.remove();
                //         });
                //     }, 3000);
                // }

                fetchMessages();
            </script>
        </div>
    </div>
@endsection
