<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }} ({{ $user->name }})
    </h2>
    </x-slot> --}}


    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4 bg-purple-500 hover:bg-purple-600 dark:border-gray-700 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        {{ $user->name }}
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('dashboard') }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                            <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                            Back
                        </a>

                        <a href="{{ route('admin.userEdit', $user->id) }}" class="inline-block bg-green-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-green-200">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>

                        <form action="{{ route('admin.userDestroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="inline-block bg-red-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-red-200" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash mr-1"></i>
                                Delete

                            </button>
                        </form>
                    </div>
                </div>

                <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                    <tbody>
                        <tr class="bg-white hover:bg-gray-100  dark:bg-gray-800 dark:hover:bg-gray-700">
                            <th scope="col" class="px-6 py-3">ID</th>

                            <td class="px-6 py-4">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $user->id }}
                                </span>
                            </td>
                        </tr>
                        <tr class="bg-white hover:bg-gray-100  dark:bg-gray-800 dark:hover:bg-gray-700">
                            <th scope="col" class="px-6 py-3">Name</th>

                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr class="bg-white hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <th scope="col" class="px-6 py-3">Email</th>

                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr class="bg-white hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <th scope="col" class="px-6 py-3">Role</th>

                            <td class="px-6 py-4">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $user->type }}
                                </span>
                            </td>
                        </tr>
                        <tr class="bg-white hover:bg-gray-100  dark:bg-gray-800 dark:hover:bg-gray-700">
                            <th scope="col" class="px-6 py-3">Created At</th>

                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($user->created_at)) }}
                            </td>
                        </tr>
                        <tr class="bg-white hover:bg-gray-100  dark:bg-gray-800 dark:hover:bg-gray-700">
                            <th scope="col" class="px-6 py-3">Updated At</th>

                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($user->updated_at)) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>