<x-app-layout>
    <x-slot name="header">

        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-white leading-tight w-full">
                {{ __('User Logs') }}
            </h2>
            <div class="relative pr-4"> <!-- Adjust the padding as needed -->
                <input type="text" id="searchInput" class="text-black w-full border rounded-full px-4 py-2 pl-10 focus:outline-none focus:ring focus:border-blue-300" placeholder="Search...">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>

        </div>

    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <thead class="text-xs text-white uppercase bg-purple-500 hover:bg-purple-600 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Logs</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach($logs as $user)
                            <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                                <td class="px-6 py-4 user-email">{{ $user->email }}</td>
                                <td class="px-6 py-4 user-date">{{ \Carbon\Carbon::parse($user->date)->format('F j, Y') }}</td>
                                <td class="px-6 py-4 user-logs">{{ $user->logs }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
    <script>
        // Real-time search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#searchResults tr');

            tableRows.forEach(row => {
                const userEmail = row.querySelector('.user-email').textContent.toLowerCase();
                const userLogs = row.querySelector('.user-logs').textContent.toLowerCase();
                const userDate = row.querySelector('.user-date').textContent.toLowerCase();

                if (userEmail.includes(searchTerm) || userLogs.includes(searchTerm) || userDate.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>