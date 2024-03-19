<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Event List') }}
            </h2>
            <div class="flex items-center"> <!-- Added container for alignment -->
                <div class="relative pr-4">
                    <x-form.input id="searchInput" class="w-full text-black px-4 py-2 pl-10" placeholder="Search..." :withicon="true" />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>

                <a href="{{ route('admin.eventsCreate') }}" class="button inline-flex items-center rounded-full px-4 py-2 leading-none text-sm ">
                    <i class="fas fa-plus mr-1  text-gray-700 dark:text-white"></i>
                    <span class="text-gray-700 dark:text-white">Create</span>
                </a>

            </div>
    </x-slot>



    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-whiteoverflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <thead class="text-xs text-white uppercase bg-purple-500 hover:bg-purple-600">
                            <tr>
                                <th scope="col" class="px-6 py-3">Event Name</th>
                                <th scope="col" class="px-6 py-3">Event Description</th>
                                <th scope="col" class="px-6 py-3">Event Image</th>
                                <th scope="col" class="px-6 py-3">Event Date</th>
                                <th scope="col" class="px-6 py-3">Event Time</th>
                                <th scope="col" class="px-6 py-3">

                                    Action

                                </th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach($events as $Events)
                            <tr class="bg-white hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap event-name">{{ $Events->event_name }}</td>
                                <td class=" px-6 py-4 event-description">{{ $Events->event_description}}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/events_images/' . basename($Events->event_image)) }}" class="max-w-full h-20 w-20">
                                </td>
                                <td class="px-6 py-4 event-created">{{\Carbon\Carbon::parse($Events->event_date)->format('F j, Y') }}</td>
                                <td class="px-6 py-4 event-time">
                                    {{ \Carbon\Carbon::parse($Events->event_time)->format('h:i A') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.eventsShow', $Events->id) }}" class="button w-24 inline-block rounded-full px-4 py-2 leading-none ">
                                        <i class="fas fa-eye mr-1 text-gray-700 dark:text-white"></i>
                                        <span class="text-gray-700 dark:text-white">View</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            {{ $events->links() }}
        </div>
    </div>
    <script>
        // Real-time search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#searchResults tr');

            tableRows.forEach(row => {
                const eventName = row.querySelector('.event-name').textContent.toLowerCase();
                const eventDescription = row.querySelector('.event-description').textContent.toLowerCase();
                const eventCreated = row.querySelector('.event-created').textContent.toLowerCase();
                const eventTime = row.querySelector('.event-time').textContent.toLowerCase();
                if (eventName.includes(searchTerm) || eventDescription.includes(searchTerm) || eventTime.includes(searchTerm) || eventCreated.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>