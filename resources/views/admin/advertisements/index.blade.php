<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Advertisement List') }}
            </h2>
            <div class="flex items-center"> <!-- Added container for alignment -->
                <div class="relative pr-4">
                    <x-form.input id="searchInput" class="w-full text-black px-4 py-2 pl-10" placeholder="Search..." :withicon="true" />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
                <a href="{{ route('admin.advertisementCreate') }}" class="inline-flex items-center bg-blue-500 text-white rounded-full px-4 py-2 leading-none text-sm dark:hover:text-green-200">
                    <i class="fas fa-plus mr-1"></i>
                    Create
                </a>
            </div>
        </div>
    </x-slot>


    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <thead class="text-xs uppercase bg-purple-500 hover:bg-purple-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">Advertisement Title</th>
                                <th scope="col" class="px-6 py-3">Advertisement Description</th>
                                <th scope="col" class="px-6 py-3">Advertisement Image</th>
                                <th scope="col" class="px-6 py-3">Advertisement Video</th>

                                <th scope="col" class="px-6 py-3">

                                    Action

                                </th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach($advertisements as $Ads)
                            <tr class="bg-white hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap ads-title">{{ $Ads->ads_title }}</td>
                                <td class="px-6 py-4 ads-description">{{ $Ads->ads_description}}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/ads_images/' . basename($Ads->ads_images)) }}" class="max-w-full h-20 w-20">
                                </td>

                                <td class="px-6 py-4">
                                    <video width="200" height="200" controls>
                                        <source src="{{ asset('storage/ads_videos/' . basename($Ads->ads_video)) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.advertisementShow', $Ads->id) }}" class="button w-24 inline-block  rounded-full px-4 py-2 leading-none ">
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
            {{ $advertisements->links() }}
        </div>
    </div>
    <script>
        // Real-time search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#searchResults tr');

            tableRows.forEach(row => {
                const adstitle = row.querySelector('.ads-title').textContent.toLowerCase();
                const adsDescription = row.querySelector('.ads-description').textContent.toLowerCase();

                if (adstitle.includes(searchTerm) || adsDescription.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>