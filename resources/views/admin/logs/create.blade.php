<x-app-layout>
    {{-- <x-slot name="header">
        <div class="flex bg-white dark:bg-gray-800 dark:border-gray-700">
            <h2 class="font-semibold text-xl text-white leading-tight w-full">
                {{ __('Logs from Users') }} (10)
    </h2>

    <a href="{{ route('admin.LogsCreate') }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
        Create
    </a>
    </div>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        Create Logs
                    </h3>

                    <a href="{{ route('admin.logs') }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                        Back
                    </a>
                </div>

                <form action="{{ route('admin.logsCreate') }}" method="POST">
                    @csrf
                    @method('POST')
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr>
                                <th scope="col" class="px-6 py-3">Email</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="email" id="title" placeholder="Title" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('title') border-0 @enderror" value="{{ old('title') }}">
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">Logs</th>

                                <td class="px-6 py-4">
                                    <textarea name="logs" id="description" placeholder="Description" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('description') border-0 @enderror">{{ old('description') }}</textarea>
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
</x-app-layout>