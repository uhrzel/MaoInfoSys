<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muslim Affairs Office Information System</title>
    <link rel="icon" type="image/png" href="{{ asset('img/man.png') }}" />
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        .button {
            padding: 0.8em 1.8em;
            border: 2px solid #805AD5;
            position: relative;
            overflow: hidden;
            background-color: transparent;
            text-align: center;
            text-transform: uppercase;
            font-size: 16px;
            transition: .3s;
            z-index: 1;
            font-family: inherit;
            color: #805AD5;
        }

        .button::before {
            content: '';
            width: 0;
            height: 300%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
            background: #805AD5;
            transition: .5s ease;
            display: block;
            z-index: -1;
        }

        .button:hover::before {
            width: 105%;
        }

        .button:hover {
            color: #805AD5;
        }



        .drop-shadow-lg {
            filter: drop-shadow(0 0 0.75rem rgba(0, 0, 0, 0.1));
        }

        .news-image-container:hover::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.1);
            transition: background 0.3s ease-in-out;
        }



        .news-item:hover .news-content {
            opacity: 1;
        }

        .news-title {
            display: inline-block;
            position: relative;
        }

        .news-title::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #805AD5;
            /* Adjust color as needed */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out;
        }

        .news-title:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .event-title {
            display: inline-block;
            position: relative;
        }

        .event-title::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #805AD5;

            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out;
        }

        .event-title:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }


        .partnership-title {
            display: inline-block;
            position: relative;
        }

        .partnership-title::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #805AD5;
            /* Adjust color as needed */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out;
        }

        .partnership-title:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .contact-title {
            display: inline-block;
            position: relative;
        }

        .contact-title::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #805AD5;
            /* Adjust color as needed */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out;
        }

        .contact-title:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .useful-links-title {
            display: inline-block;
            position: relative;
        }

        .useful-links-title::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #805AD5;
            /* Adjust color as needed */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out;
        }

        .useful-links-title:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        /* Add this CSS for the hover effect */
        .social-icon:hover {
            transform: scale(1.2);
            /* Adjust the scale factor as needed */
            transition: transform 0.3s ease-in-out;
        }

        /* Add this CSS if you want to change the color on hover */
        .social-icon:hover svg {
            fill: #805AD5;
            /* Adjust the color as needed */
            transition: fill 0.3s ease-in-out;
        }

        .mobile-menu {
            display: none;
        }

        .mobile-title {
            display: none;
        }

        @media screen and (max-width: 768px) {
            .flex-mobile {
                display: flex;
                justify-content: flex-end;
                /* Align items to the right */
                align-items: center;
            }

            .mobile-menu {
                display: block;
                margin-right: 20px;
                /* Adjust margin as needed */
            }

            .nav-links {
                display: none;
                flex-direction: column;
                /* Align links vertically */
                align-items: flex-end;
                /* Align items to the right */
                position: fixed;
                top: 10 0px;
                right: 50px;
                /* Position on the right side */
                background-color: white;
                padding: 10px;
                z-index: 999;
                width: 20%;
                max-width: 300px;
                height: 30%;
                overflow-y: auto;
            }

            .nav-links a {
                display: block;
                color: #fff;
                margin-bottom: 10px;
                text-align: center;
            }

            .nav-links a:hover {
                text-decoration: underline;
            }

            .man-icon {
                display: none;
            }

            /* Hide desktop titles on mobile */
            .desktop-title {
                display: none;
            }

            /* Show mobile title on mobile devices */
            .mobile-title {
                display: inline;
                /* or display: block; depending on your layout */
            }
        }

        /* Show nav links for desktop */
        @media screen and (min-width: 769px) {
            .nav-links {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .nav-links a {
                margin: 0 10px;
                color: #fff;
                text-decoration: none;
            }
        }
    </style>
</head>

<body class="bg-green-fullscreen bg-gray-900">

    <nav class="flex items-center justify-between flex-wrap bg-transparent p-6">
        <div class="flex gap-4 items-center flex-shrink-0 text-white mr-6">
            <a href="#" class="flex items-center">
                <img src="img/logo1.png" alt="Muslim Affairs Office Logo" class="w-16 h-16 rounded-full">
            </a>
            <a href="#" class="flex items-center">
                <img src="img/logo2.png" alt="Muslim Affairs Office Logo" class="w-16 h-16 rounded-full">
            </a>
            <a href="#" class="flex items-center">
                <img src="img/logo3.png" alt="Muslim Affairs Office Logo" class="w-16 h-16 rounded-full">
            </a>
        </div>

        <div class="flex items-center flex-mobile"> <!-- Apply flex-mobile class here -->
            <div class="mobile-menu">
                <button id="mobileMenuButton" class="text-white focus:outline-none">
                    <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>

                <div id="mobileNavLinks" class="nav-links">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="font-bold py-2" style="color: #052e16;">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="font-bold py-2" style="color: #052e16;">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="font-bold py-2" style="color: #052e16;">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
            <div class="nav-links">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="button font-bold py-2 px-10 rounded-full" style="color: #fff;">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="button font-bold py-2 px-10 rounded-full mr-4" style="color: #fff;">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="button font-bold py-2 px-10 rounded-full" style="color: #fff;">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>

    </nav>
    <main class="flex flex-col justify-center items-center">
        <div class="w-full grid grid-cols-12 px-12 pt-8 mb-8">
            <div class="col-span-6 flex flex-col justify-center">
                <h1 class="title-header text-7xl font-bold text-white">
                    <span class="text-purple-500 desktop-title">Muslim</span>
                    <span class="text-white desktop-title">Affairs</span>
                    <span class="text-white desktop-title"> <br> Office</span>
                    <span class="text-purple-500 desktop-title"> Information System</span>
                    <span class="text-purple-500 mobile-title">Muslim</span>
                    <span class="text-white mobile-title">Affairs</span>
                    <span class="text-purple-500 mobile-title">InfoSys</span>
                </h1>

            </div>
            <div class="man-icon col-span-6 mb-8">
                <img src="img/logo7.png" alt="Picture of a man" class="w-96 object-cover mx-auto drop-shadow-lg">
            </div>
        </div>
        <!-- Modal -->
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

        <section class="text-center md:text-left">
            @php
            // Sort news by news_date
            $sortedNews = $news->sortBy('news_date');
            // Get current date
            $currentDate = now();
            @endphp
            <div class="flex justify-center items-center mb-10">
                <img src="img/news2.png" alt="about" class="w-20 h-15 rounded-full mr-10">
                <h1 class="text-2xl font-bold text-white news-title">Latest News</h1>
            </div>
            @forelse($sortedNews as $News)
            @if($News->status === 'public')
            @php
            $newsDate = new DateTime($News->news_date);
            $threeDaysAfter = $newsDate->modify('+3 days');
            @endphp

            {{-- Check if difference between news date and today is greater than 3 days --}}
            @if($currentDate <= $threeDaysAfter) <div class="mb-6 flex flex-wrap mt-10">
                <div class="mb-6 ml-auto w-full shrink-0 grow-0 basis-auto px-3 md:mb-0 md:w-3/12">
                    <div class="relative mb-6 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20 news-image-container" data-te-ripple-init data-te-ripple-color="light">
                        <img src="{{ asset('storage/news_images/' . basename($News->news_image)) }}" class="max-w-full">
                        <a href="#" onclick="openModal('{{ $News->news_title }}', '{{ $News->news_date }}', '{{ $News->news_time }}', '{{ $News->news_content }}', '{{ asset('storage/news_images/' . basename($News->news_image)) }}')">
                            <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]"></div>
                        </a>
                    </div>
                </div>
                <div class="mb-6 mr-auto w-full shrink-0 grow-0 basis-auto px-3 md:mb-0 md:w-9/12 xl:w-7/12 news-item">
                    <h5 class="mb-3 text-lg text-white font-bold news-title"><strong>News Title: </strong>{{ $News->news_title }}</h5>

                    <div class="mb-3 flex items-center justify-center text-yellow-400 text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                        <small> <strong>{{ $News->created_at->diffForHumans() }}</strong> </small><br>
                    </div>
                    <p class="mb-6 text-neutral-300">

                        <small>News Date: <u>{{ \Carbon\Carbon::parse($News->news_date)->format('F d, Y') }}</u></small><br>
                        <small>News Time: <u>{{ \Carbon\Carbon::parse($News->news_time)->format('h:i A') }}</u></small>

                    </p>
                    <p class="text-neutral-300 news-content">
                        <strong> News Content:</strong> {{$News->news_content}}
                    </p>
                </div>
                </div>
                @endif
                @endif
                @empty
                <p class="text-white">No public News available.</p>
                @endforelse
        </section>


        <script>
            function openModal(title, date, time, content, imageSrc) {

                if (window.innerWidth > 768) {
                    const modal = document.getElementById('newsModal');
                    const modalBody = document.getElementById('modalBody');

                    const newsDate = new Date(date);
                    // Format the date as "Month Day, Year"
                    const formattedDate = newsDate.toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });
                    // Format the time as "HH:MM AM/PM"
                    const formattedTime = new Date(`2000-01-01T${time}`).toLocaleTimeString('en-US', {
                        hour: '2-digit',
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
                    document.body.style.overflow = 'hidden'; // Disable scrolling on the main page
                }
            }

            function closeModal() {
                const modal = document.getElementById('newsModal');
                modal.classList.add('hidden');
                document.body.style.overflow = ''; // Enable scrolling on the main page
            }

            document.getElementById('closeModal').addEventListener('click', closeModal);
        </script>

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
        <section class="mb-32 text-center mt-20">
            @php

            $sortedEvent = $events->sortBy('event_date');
            // Get current date

            @endphp
            <div class="flex justify-center items-center mb-10">
                <img src="img/calendar.png" alt="about" class="w-20 h-15 rounded-full mr-10">
                <h1 class="text-2xl font-bold text-white event-title">Latest Events</h1>
            </div>
            <div class="flex flex-wrap justify-center">
                @forelse($sortedEvent as $Event)
                @if($Event->status === 'public')
                @php
                $eventDate = \Carbon\Carbon::parse($Event->event_date);
                $today = \Carbon\Carbon::today();
                @endphp
                {{-- Check if event date is in the future --}}
                @if($eventDate->gt($today))
                <div class="max-w-sm mb-6 mr-4">
                    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20" data-te-ripple-init data-te-ripple-color="light">
                        <img src="{{ asset('storage/events_images/' . basename($Event->event_image)) }}" class="w-full h-64 object-cover">
                        <a href="#" onclick="openModal2('{{ $Event->event_name }}', '{{ $Event->event_date }}', '{{ $Event->event_time }}', '{{ $Event->event_description }}', '{{ asset('storage/events_images/' . basename($Event->event_image)) }}')">
                            <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]"></div>
                        </a>
                    </div>
                    <h5 class="mt-3 mb-2 text-lg font-bold text-white event-title"><strong>Event Name: </strong>{{ $Event->event_name }}</h5>
                    <div class="mb-3 flex items-center justify-center text-sm font-medium text-yellow-400">
                        <small> <strong>{{ $Event->created_at->diffForHumans() }}</strong> </small><br>
                    </div>
                    <p class="text-neutral-300">

                        <small>Event Date: <u>{{ \Carbon\Carbon::parse($Event->event_date)->format('F d, Y') }}</u></small><br>
                        <small>Event Time: <u>{{ \Carbon\Carbon::parse($Event->event_time)->format('h:i A') }}</u></small>

                    </p>
                    <p class="text-neutral-300">
                        <strong>Event Description: </strong>{{ $Event->event_description }}
                    </p>
                </div>
                @endif
                @endif
                @empty
                <p class="text-white">No public events available.</p>
                @endforelse
            </div>
        </section>

        <script>
            function openModal2(title, date, time, content, imageSrc) {
                if (window.innerWidth > 768) {
                    const modal = document.getElementById('eventModal');
                    const modalBody = document.getElementById('modal2Body');
                    const eventDate = new Date(date);
                    // Format the date as "Month Day, Year"
                    const formattedDate = eventDate.toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });
                    // Format the time as "HH:MM AM/PM"
                    const formattedTime = new Date(`2000-01-01T${time}`).toLocaleTimeString('en-US', {
                        hour: '2-digit',
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
                    document.body.style.overflow = 'hidden'; // Disable scrolling on the main page
                }
            }




            function closeModal() {
                const modal = document.getElementById('eventModal');
                modal.classList.add('hidden');
                document.body.style.overflow = ''; // Enable scrolling on the main page
            }

            document.getElementById('close2Modal').addEventListener('click', closeModal);
        </script>


        <footer class="text-center text-neutral-600 dark:text-neutral-200 lg:text-left">
            <div class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-neutral-500 lg:justify-between">
                <div class="mr-12 hidden lg:block">
                    <span>Get connected with us on social networks:</span>
                </div>

                <div class="flex justify-center">
                    <a href="https://web.facebook.com/muslimaffairs.mce" class="mr-6 text-neutral-200 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                    </a>
                    <a href="#!" class="mr-6 text-neutral-200 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#!" class="mr-6 text-neutral-200 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z" fill-rule="evenodd" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#!" class="mr-6 text-neutral-200 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="https://github.com/uhrzel" class="text-neutral-200 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                </div>

            </div>

            <div class="mx-6 py-10 text-center md:text-left">
                <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">

                    <div class="">
                        <h6 class=" text-neutral-200 mb-4 flex justify-center font-semibold uppercase md:justify-start partnership-title">
                            Partnership
                        </h6>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-200 partnership-title">LGU/PLDU - South Cotabato
                            </a>
                        </p>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-200 partnership-title">None Government Organization (NGO)</a>
                        </p>
                        <p class="mb-4">
                            <a href="#!" class="text-neutral-200 partnership-title">PNP</a>
                        </p>
                        <p>
                            <a href="#!" class="text-neutral-200 partnership-title">SF-PA</a>
                        </p>
                    </div>
                    <!-- Useful links section -->
                    <div class="">
                        <h6 class="text-neutral-200 mb-4 flex justify-center font-semibold uppercase md:justify-start useful-links-title">
                            Useful links
                        </h6>
                        <p class="mb-4">
                            <a href="https://web.facebook.com/muslimaffairs.mce" class="text-neutral-200 useful-links-title">Facebook</a>
                        </p>
                        <p class="mb-4">
                            <a href="#" class="text-neutral-200 useful-links-title">Youtube</a>
                        </p>
                        <p class=" mb-4">
                            <a href="mailto:maoInfoSys@gmail.com" class="text-neutral-200 useful-links-title">Gmail</a>
                        </p>
                        <p>
                            <a href="#" class="text-neutral-200 useful-links-title">Linkedin</a>
                        </p>
                    </div>

                    <div>
                        <h6 class="text-neutral-200 mb-4 flex justify-center font-semibold uppercase md:justify-start contact-title">
                            Contact
                        </h6>
                        <p class="text-neutral-200 mb-4 flex items-center justify-center md:justify-start contact-title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-neutral-200 mr-3 h-5 w-5">
                                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                            </svg>
                            Tupi South Cotabato,
                            Philippines 9506
                        </p>
                        <p class="text-neutral-200 mb-4 flex items-center justify-center md:justify-start contact-title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-neutral-200 mr-3 h-5 w-5">
                                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                            </svg>
                            MaoInfoSys@gmail.com
                        </p>
                        <p class="text-neutral-200 mb-4 flex items-center justify-center md:justify-start contact-title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-neutral-200 mr-3 h-5 w-5">
                                <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                            </svg>
                            +639154138624
                        </p>

                    </div>
                </div>
        </footer>
    </main>
</body>
<script>
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileNavLinks = document.getElementById('mobileNavLinks');

    mobileMenuButton.addEventListener('click', () => {
        mobileNavLinks.style.display = (mobileNavLinks.style.display === 'block') ? 'none' : 'block';
    });

    const menuButton = document.getElementById('mobileMenuButton');
    const menuIcon = document.getElementById('menuIcon');

    menuButton.addEventListener('click', function() {
        // Toggle between hamburger and "x" icons
        if (menuIcon.classList.contains('open')) {
            // Change back to hamburger icon
            menuIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        `;
            menuIcon.classList.remove('open');
        } else {
            // Change to "x" icon
            menuIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        `;
            menuIcon.classList.add('open');
        }
    });
    // Get the existing header element
    var headerElement = document.getElementById("headerTitle");

    // Create a new element with the mobile title
    var mobileTitle = document.createElement("h1");
    mobileTitle.innerHTML = "Muslim Affairs InfoSys";

    // Insert the new mobile title before the existing header element
    headerElement.parentNode.insertBefore(mobileTitle, headerElement);
</script>

</html>