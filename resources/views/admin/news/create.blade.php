<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4  border-b bg-indigo-700 sm:px-6">
                    <h1 class="text-2xl font-bold text-white">
                        Create News
                    </h1>

                    <a href="{{ route('admin.news') }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">

                        <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                        Back
                    </a>
                </div>

                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <table class="w-full text-sm text-left text-gray-600">
                        <tbody>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Title</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="title" id="title" placeholder="Title" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('title') border-0 @enderror" value="{{ old('title') }}">
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Content</th>
                                <td class="px-6 py-4">
                                    <textarea name="newsContent" id="newsContent" placeholder="content" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('description') border-0 @enderror">{{ old('description') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Image</th>
                                <td class="px-6 py-4">
                                    <input type="file" name="newsImage" id="newsImage" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('newsImage') border-0 @enderror">
                                    @error('newsImage')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Date</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="newsDate" id="newsDate" placeholder="Select date" class="bg-dark-100 w-full p-4 text-black rounded-lg datepicker @error('newsDate') border-0 @enderror">
                                    @error('newsDate')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">News Time</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="newsTime" id="newsTime" placeholder="Select time" class="bg-dark-100 w-full p-4 text-black rounded-lg timepicker @error('newsTime') border-0 @enderror">
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
                                        Create
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- Include Flatpickr CSS -->
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