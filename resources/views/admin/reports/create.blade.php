<x-app-layout>
    {{-- <x-slot name="header">
        <div class="flex bg-white">
            <h2 class="font-semibold text-xl text-white leading-tight w-full">
                {{ __('Reports from Users') }}
    </h2>

    <a href="{{ route('admin.reportCreate') }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
        Create
    </a>
    </div>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4 bg-purple-500 hover:bg-purple-600 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        Create Report
                    </h3>

                    <a href="{{ route('admin.reports') }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                        <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                        Back
                    </a>
                </div>

                <form action="{{ route('admin.reportStore') }}" method="POST">
                    @csrf
                    @method('POST')
                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <tbody>
                            <tr class="bg-white hover:bg-gray-100  dark:bg-gray-800 ">
                                <th scope="col" class="px-6 py-3">Title</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="reportTitle" id="reportTitle" placeholder="Report Title" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('reportTitle') border-0 @enderror" value="{{ old('reportTitle') }}">
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-100  dark:bg-gray-800 ">
                                <th scope="col" class="px-6 py-3">Description</th>
                                <td class="px-6 py-4">
                                    <textarea name="reportDescription" id="reportDescription" placeholder="Report Description" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('reportDescription') border-0 @enderror">{{ old('reportDescription') }}</textarea>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-100  dark:bg-gray-800 ">
                                <td colspan="2" class="px-6 py-4 text-right">
                                    <button type="submit" class="button px-4 py-2 font-semibold ">
                                        <span class=" text-gray-700 dark:text-white">Create</span>
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