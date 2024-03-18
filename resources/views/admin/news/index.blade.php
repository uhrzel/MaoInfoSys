<x-app-layout>
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-white leading-tight w-full">
                {{ __('News List') }}
            </h2>
            <div class="relative pr-4"> <!-- Adjust the padding as needed -->
                <input type="text" id="searchInput" class="w-full border rounded-full px-4 py-2 pl-10 focus:outline-none focus:ring focus:border-blue-300" placeholder="Search...">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
            <a href="{{ route('admin.newsCreate') }}" class="inline-flex items-center bg-blue-500 text-white rounded-full px-4 py-2 leading-none text-sm dark:hover:text-green-200">

                <i class="fas fa-plus mr-1"></i>
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-black">
                        <thead class="text-xs text-white uppercase bg-indigo-700 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">News Title</th>
                                <th scope="col" class="px-6 py-3">News Content</th>
                                <th scope="col" class="px-6 py-3">News Image</th>
                                <th scope="col" class="px-6 py-3">News Date</th>
                                <th scope="col" class="px-6 py-3">News Time</th>
                                <th scope="col" class="px-6 py-3">

                                    Action

                                </th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach($news as $News)
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200"">
                                <td scope=" row" class="px-6 py-4 font-medium whitespace-nowrap text-black news-title">{{ $News->news_title }}</td>
                                <td class="px-6 py-4 news-content">{{ $News->news_content}}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/news_images/' . basename($News->news_image)) }}" class="max-w-full h-20 w-20">
                                </td>
                                <td class="px-6 py-4 news-date">
                                    {{ \Carbon\Carbon::parse($News->news_date   )->format('F j, Y') }}
                                </td>
                                <td class="px-6 py-4 news-time">
                                    {{ \Carbon\Carbon::parse($News->news_time)->format('h:i A') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.newsShow', $News->id) }}" class="w-24  inline-block bg-indigo-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-blue-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $news->links() }}
            </div>
        </div>
    </div>
    <script>
        // Real-time search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#searchResults tr');

            tableRows.forEach(row => {
                const newsTitle = row.querySelector('.news-title').textContent.toLowerCase();
                const newsContent = row.querySelector('.news-content').textContent.toLowerCase();
                const newsDate = row.querySelector('.news-date').textContent.toLowerCase();
                const newsTime = row.querySelector('.news-time').textContent.toLowerCase();
                if (newsTitle.includes(searchTerm) || newsContent.includes(searchTerm) || newsDate.includes(searchTerm) || newsTime.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>