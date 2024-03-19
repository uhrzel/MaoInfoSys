<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Events') }}
    </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4  border-b bg-purple-500 hover:bg-purple-600 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        Update Events
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.eventsShow', $event->id) }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                            <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                            Back
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.eventsUpdate', $event->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <tbody>
                            <tr class="bg-gray-700">
                                <th scope="col" class="px-6 py-3">Events ID</th>

                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $event->id }}
                                    </span>
                                </td>
                            </tr>
                            <tr class="bg-gray-700">
                                <th scope="col" class="px-6 py-3">Events Name</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="event_name" id="event_name" placeholder="Event Name" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('event_name') border-0 @enderror" value="{{ $event->event_name}}">
                                    @error('event_name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700">
                                <th scope="col" class="px-6 py-3">Events Description</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="event_description" id="event_description" placeholder="Events Description" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('event_description') border-0 @enderror" value="{{ $event->event_description }}">
                                    @error('event_description')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700">
                                <th scope="col" class="px-6 py-3">Events Image</th>
                                <td class="px-6 py-4">
                                    <input type="file" name="eventImage" id="eventImage" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('eventImage') border-0 @enderror">


                                </td>
                            </tr>

                            <tr class="bg-gray-700">
                                <th scope="col" class="px-6 py-3">Events Date</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="eventDate" id="eventDate" placeholder="Select date" class="bg-dark-100 w-full p-4 text-black rounded-lg datepicker @error('eventDate') border-0 @enderror" value="{{ $event->event_date }}">
                                    @error('eventDate')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700">
                                <th scope="col" class="px-6 py-3">Event Time</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="eventTime" id="eventTime" placeholder="Select time" class="bg-dark-100 w-full p-4 text-black rounded-lg timepicker @error('eventTime') border-0 @enderror" value="{{ $event->event_time}}">
                                    @error('eventTime')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700">
                                <th scope="col" class="px-6 py-3">Event Visibility</th>
                                <td class="px-6 py-4">
                                    <select name="event_visibility" id="event_visibility" class="bg-dark-100 w-full p-4 text-black rounded-lg">
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                </td>
                            </tr>

                            <tr class="bg-gray-700">
                                <td colspan="2" class="px-6 py-4 text-right">
                                    <button type="submit" class="button px-4 py-2 font-semibold text-white rounded">
                                        Update
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Include Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Include Pikaday CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">

    <!-- Include Pikaday JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>

    <style>
        /* Add this style block in the head or your CSS file */
        /* Style for the modal */
        .modal {
            display: none;
        }

        .modal.show {
            display: flex;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var picker = new Pikaday({
                field: document.getElementById('eventDate'),
                format: 'YYYY-MM-DD',
                toString(date, format) {
                    const day = date.getDate();
                    const month = date.getMonth() + 1;
                    const year = date.getFullYear();

                    // Ensure leading zeros
                    const formattedDay = day < 10 ? '0' + day : day;
                    const formattedMonth = month < 10 ? '0' + month : month;

                    if (format === 'YYYY-MM-DD') {
                        return `${year}-${formattedMonth}-${formattedDay}`;
                    }

                    return '';
                },
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('#eventTime', {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
            });
        });
    </script>
</x-app-layout>