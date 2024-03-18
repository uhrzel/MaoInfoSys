<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
    </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        Update Report
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.statisticsShow', $report->id) }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                            Back
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.reportUpdate', $report->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>

                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        1
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">Title</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="title" id="title" placeholder="Your title" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('title') border-0 @enderror" value="Title Sample">
                                    @error('title')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">Description</th>

                                <td class="px-6 py-4">
                                    <textarea name="description" id="description" placeholder="Description" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('description') border-0 @enderror">{{ old('description') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">Status</th>

                                <td class="px-6 py-4">
                                    <select name="status" id="status" class="bg-dark-100 text-black w-full p-4 rounded-lg @error('status') border-0 @enderror">
                                        <option value="cancel" @if($report->status == 'cancel') selected @endif>Cancel</option>
                                        <option value="approve" @if($report->status == 'approve') selected @endif>Approve</option>
                                    </select>
                                    @error('status')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
</x-app-layout>