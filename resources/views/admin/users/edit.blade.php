<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
    </h2>
    </x-slot> --}}


    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4 bg-purple-500 hover:bg-purple-600 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        Update User
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.userShow', $user->id) }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                            <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                            Back
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.userUpdate', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <tbody>
                            <tr class="bg-gray-700 ">

                                <th scope="col" class="px-6 py-3">ID</th>

                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $user->id }}
                                    </span>
                                </td>
                            </tr>
                            <tr class="bg-gray-700">

                                <th scope="col" class="px-6 py-3">Name</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('name') border-0 @enderror" value="{{ $user->name }}">
                                    @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700">

                                <th scope="col" class="px-6 py-3">Email</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('email') border-0 @enderror" value="{{ $user->email }}">
                                    @error('email')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">

                                <th scope="col" class="px-6 py-3">Role</th>

                                <td class="px-6 py-4">
                                    <select name="type" id="type" class="bg-dark-100 text-black w-full p-4 rounded-lg @error('type') border-0 @enderror">
                                        <option value="user" @if($user->type == 'user') selected @endif>User</option>
                                        <option value="admin" @if($user->type == 'admin') selected @endif>Admin</option>
                                    </select>
                                    @error('type')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700  ">
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
</x-app-layout>