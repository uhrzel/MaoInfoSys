<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit News') }}
    </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4  border-b bg-indigo-700 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        Update News
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.newsShow', $news->id) }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">

                            <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                            Back
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.newsUpdate', $news->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <table class="w-full text-sm text-left text-gray-600">
                        <tbody>
                            <tr>
                                <th scope="col" class="px-6 py-3">News ID</th>

                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $news->id }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News title</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="title" id="title" placeholder="News title" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('news_title') border-0 @enderror" value="{{ $news->news_title}}">
                                    @error('title')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Contents</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="newsContent" id="newsContent" placeholder="News Content" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('newsContent') border-0 @enderror" value="{{ $news->news_content }}">
                                    @error('newsContent')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Image</th>
                                <td class="px-6 py-4">
                                    <input type="file" name="newsImage" id="newsImage" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('newsImage') border-0 @enderror">

                                </td>
                            </tr>



                            <tr>
                                <th scope="col" class="px-6 py-3">News Date</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="newsDate" id="newsDate" placeholder="Select date" class="bg-dark-100 w-full p-4 text-black rounded-lg datepicker @error('newsDate') border-0 @enderror" value="{{ $news->news_date }}">
                                    @error('newsDate')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Time</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="newsTime" id="newsTime" placeholder="Select time" class="bg-dark-100 w-full p-4 text-black rounded-lg timepicker @error('newsTime') border-0 @enderror" value="{{ $news->news_time}}">
                                    @error('newsTime')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Visibility</th>
                                <td class="px-6 py-4">
                                    <select name="news_visibility" id="news_visibility" class="bg-dark-100 w-full p-4 text-black rounded-lg">
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="px-6 py-4 text-right">
                                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
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

    <!-- Initialize Pikaday -->
    <!-- Initialize Pikaday -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var picker = new Pikaday({
                field: document.getElementById('newsDate'),
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
            flatpickr('#newsTime', {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
            });
        });
    </script>
</x-app-layout>