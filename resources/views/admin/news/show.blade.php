<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('News Details') }}
    </h2>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4  border-b bg-purple-500 hover:bg-purple-600 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        {{ $news->news_title }}
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.news') }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                            <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                            Back
                        </a>

                        <a href="{{ route('admin.newsEdit', $news->id) }}" class="inline-block bg-green-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-green-200">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>

                        <form action="{{ route('admin.newsDestroy', $news->id) }}" method="POST">
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
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">ID</th>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $news->id }}
                                </span>
                            </td>
                        </tr>
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">News Title</th>
                            <td class="px-6 py-4">
                                {{ $news->news_title }}
                            </td>
                        </tr>
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">News Content</th>
                            <td class="px-6 py-4">
                                {{ $news->news_content }}
                            </td>
                        </tr>
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">News Image</th>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/news_images/' .basename($news->news_image))}}" class="w-32 h-32 object-cover">
                            </td>
                        </tr>
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">News Date</th>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($news->news_date   )->format('F j, Y') }}
                            </td>
                        </tr>
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">News Time</th>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($news->news_time)->format('h:i A') }}
                            </td>
                        </tr>
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">Created At</th>
                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($news->created_at)) }}
                            </td>
                        </tr>
                        <tr class="bg-gray-700 hover:bg-gray-800 border-b dark:border-gray-700 ">
                            <th scope="col" class="px-6 py-3">Updated At</th>
                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($news->updated_at)) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>