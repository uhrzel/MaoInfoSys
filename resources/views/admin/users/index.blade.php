<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User List') }}
            </h2>
            <div class="relative">
                <input type="text" id="searchInput" class="w-full text-black border rounded-full px-4 py-2 pl-10 focus:outline-none focus:ring focus:border-purple-600" placeholder="Search...">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <thead class="text-xs uppercase bg-purple-500 hover:bg-purple-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Role</th>
                                <th scope="col" class="px-6 py-3">Created At</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach($users as $user)
                            <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                                <td class="user-name px-6 py-4">{{ $user->name }}</td>
                                <td class="user-email px-6 py-4">{{ $user->email }}</td>
                                <td class="user-type px-6 py-4">{{ $user->type }}</td>
                                <td class="user-date px-6 py-4">
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y') }}<br>
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('h:i A') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.userShow', $user->id) }}" class="inline-flex items-center bg-purple-500 text-white rounded-full px-4 py-2 leading-none hover:bg-purple-600 ">
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
            {{ $users->links() }}
        </div>
    </div>


    <script>
        // Real-time search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#searchResults tr');

            tableRows.forEach(row => {
                /*  const userId = row.querySelector('.user-id').textContent.toLowerCase(); */
                const userName = row.querySelector('.user-name').textContent.toLowerCase();
                const userEmail = row.querySelector('.user-email').textContent.toLowerCase();
                const userType = row.querySelector('.user-type').textContent.toLowerCase();
                const usercreated = row.querySelector('.user-date').textContent.toLowerCase();

                if ( /* userId.includes(searchTerm) || */ userName.includes(searchTerm) || userEmail.includes(searchTerm) || userType.includes(searchTerm) || usercreated.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

</x-app-layout>