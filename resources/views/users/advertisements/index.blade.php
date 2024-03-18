<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-white leading-tight">
            {{ __('News Feed and Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Display Events --}}
            <div class="bg-blue-600 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-white">
                    <h3 class="text-lg font-semibold mb-2">Events</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @php
                        // Sort events by event_date
                        $sortedEvents = $events->sortBy('event_date');
                        @endphp
                        @forelse($sortedEvents as $event)
                        @if($event->status == 'private')
                        @php
                        // Convert event date string to a DateTime object
                        $eventDate = new DateTime($event->event_date);
                        // Get current date
                        $currentDate = new DateTime();
                        @endphp

                        {{-- Check if event date has not passed --}}
                        @if($eventDate >= $currentDate)
                        <div class="flex items-center mb-2">
                            @if($event->event_image)
                            <div class="relative mb-6 mr-4 overflow-hidden rounded-lg bg-no-repeat shadow-lg dark:shadow-black/20" data-te-ripple-init data-te-ripple-color="light">
                                <img src="{{ asset('storage/events_images/' . basename($event->event_image)) }}" class="h-20 w-25">
                                <a href="#" onclick="openModal2('{{ $event->event_name }}', '{{ $event->event_date }}', '{{ $event->event_time }}','{{ $event->event_description }}',  '{{ asset('storage/events_images/' . basename($event->event_image)) }}')">
                                    <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]"></div>
                                </a>
                            </div>
                            @else
                            {{-- Placeholder image or default image --}}
                            <img src="{{ asset('path-to-default-image') }}" class="mr-2 w-10 h-10 rounded-full" alt="Default Image">
                            @endif
                            <div>
                                <p class="text-base font-bold event-title">{{ $event->event_name }}</p><br>
                                <small> <strong>{{ $event->created_at->diffForHumans() }}</strong> </small><br>
                                <p class="text-sm text-gray-300">Event Date: {{ date('F j, Y', strtotime($event->event_date)) }}</p>
                                <p class="text-sm text-gray-300">Event Time: {{ date('g:i A', strtotime($event->event_time)) }}</p>

                            </div>
                        </div>
                        @endif
                        @endif
                        @empty
                        <p>No private events available.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Display News --}}
            <div class="bg-green-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="text-lg font-semibold mb-2">News</h3>
                    @php
                    // Sort news by news_date
                    $sortedNews = $news->sortBy('news_date');
                    // Get current date
                    $currentDate = now();
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($sortedNews as $singleNews)
                        @if($singleNews->status == 'private')
                        @php
                        // Convert news date string to a DateTime object
                        $newsDate = new DateTime($singleNews->news_date);
                        // Calculate 3 days after news date
                        $threeDaysAfter = $newsDate->modify('+3 days');
                        @endphp

                        {{-- Check if news is within 3 days from news date --}}
                        @if($currentDate <= $threeDaysAfter) <div class="flex items-center mb-2">
                            @if($singleNews->news_image)
                            <div class="relative mb-6 mr-4 overflow-hidden rounded-lg bg-no-repeat shadow-lg dark:shadow-black/20 news-image-container" data-te-ripple-init data-te-ripple-color="light">
                                <img src="{{ asset('storage/news_images/' . basename($singleNews->news_image)) }}" class="h-20 w-22">

                                <a href="#" onclick="openModal('{{ $singleNews->news_title }}', '{{ $singleNews->news_date }}', '{{ $singleNews->news_time }}','{{ $singleNews->news_content }}','{{ asset('storage/news_images/' . basename($singleNews->news_image)) }}')">
                                    <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]"></div>
                                </a>

                            </div>

                            @else
                            {{-- Placeholder image or default image --}}

                            <img src="{{ asset('path-to-default-image') }}" class="mr-2 w-10 h-10 rounded-full" alt="Default Image">
                            @endif
                            <div>
                                <p class="text-base font-bold news-title">{{ $singleNews->news_title }}</p> <br>
                                <small> <strong>{{ $singleNews->created_at->diffForHumans() }}</strong> </small><br>
                                <p class="text-sm text-gray-300">News Date: {{ date('F j, Y', strtotime($singleNews->news_date)) }}</p>
                                <p class="text-sm text-gray-300">News Time: {{ date('g:i A', strtotime($singleNews->news_time)) }}</p>

                            </div>
                    </div>
                    @endif
                    @endif
                    @empty
                    <p>No private news available.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- EVENT MODAL -->
    <div id="eventModal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center hidden">
        <div class="absolute w-full h-full bg-gray-900 opacity-70"></div>
        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <h2 class="text-2xl font-bold text-gray-800">Event Details</h2>
                    <button id="close2Modal" class="text-gray-600 hover:text-gray-800">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="modal2Body"></div>
            </div>
        </div>
    </div>

    <!-- NEWS MODAL -->
    <div id="newsModal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center hidden">
        <div class="absolute w-full h-full bg-gray-900 opacity-70"></div>
        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <h2 class="text-2xl font-bold text-gray-800">News Details</h2>
                    <button id="closeModal" class="text-gray-600 hover:text-gray-800">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="modalBody"></div>
            </div>
        </div>
    </div>
    <style>
        .event-title,
        .news-title {
            display: inline-block;
            position: relative;
        }

        .event-title::before,
        .news-title::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: yellow;
            /* Adjust color as needed */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out;
        }

        .event-title:hover::before,
        .news-title:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .hover-underline:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function openModal2(title, date, time, content, imageSrc) {
            console.log('Opening event modal with data:', title, date, time, imageSrc);

            const modal = document.getElementById('eventModal');
            const modalBody = document.getElementById('modal2Body');
            const eventDate = new Date(date);
            const eventTime = new Date(`1970-01-01T${time}`);
            const formattedDate = eventDate.toLocaleDateString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });

            // Format time to "hh:mm AM/PM" format
            const formattedTime = eventTime.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit'
            });

            modalBody.innerHTML = `
                <h5 class="mb-3 text-lg text-gray-800 font-bold event-name"><strong>Event Name: </strong>${title}</h5>
                <div class="mb-3 flex items-center text-yellow-400 text-sm font-medium text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                    </svg>
                    Event
                </div>
                <img src="${imageSrc}" class="w-full mb-4 rounded-lg">
                <p class="mb-6 text-gray-800">
                    <small>Event Date: <u>${formattedDate}</u></small> <br>
                    <small>Event Time: <u>${formattedTime}</u></small>
                </p>
                <p class="text-gray-800">
                    <strong> Event Description:</strong> ${content}
                </p>
            `;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function openModal(title, date, time, content, imageSrc) {
            const modal = document.getElementById('newsModal');
            const modalBody = document.getElementById('modalBody');
            const newsDate = new Date(date);
            const newsTime = new Date(`1970-01-01T${time}`);

            // Format date to "Month Day, Year" format
            const formattedDate = newsDate.toLocaleDateString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });

            // Format time to "hh:mm AM/PM" format
            const formattedTime = newsTime.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit'
            });

            modalBody.innerHTML = `
                <h5 class="mb-3 text-lg text-gray-800 font-bold news-title"><strong>News Title: </strong>${title}</h5>
                <div class="mb-3 flex items-center text-yellow-400 text-sm font-medium text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                    </svg>
                    News
                </div>
                <img src="${imageSrc}" class="w-full mb-4 rounded-lg">
                <p class="mb-6 text-gray-800">
                    <small>News Date: <u>${formattedDate}</u></small> <br>
                    <small>News Time: <u>${formattedTime}</u></small>
                </p>
                <p class="text-gray-800">
                    <strong> News Content:</strong> ${content}
                </p>
            `;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal1 = document.getElementById('eventModal');
            const modal2 = document.getElementById('newsModal');
            modal1.classList.add('hidden');
            modal2.classList.add('hidden');
            document.body.style.overflow = '';
        }

        document.getElementById('close2Modal').addEventListener('click', closeModal);
        document.getElementById('closeModal').addEventListener('click', closeModal);
    </script>
</x-app-layout>