<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl  dark:text-gray-200 leading-tight">
            {{ __('Advertisement Details') }}
    </h2>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4 border-b bg-indigo-700 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        {{ $advertisement->ads_title }}
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.advertisement') }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                            <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                            Back
                        </a>

                        <a href="{{ route('admin.advertisementEdit', $advertisement->id) }}" class="inline-block bg-green-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-green-200">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>

                        <form action="{{ route('admin.advertisementDestroy', $advertisement->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="inline-block bg-red-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-red-200" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash mr-1"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <table class="w-full text-sm text-left text-gray-600">
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <th scope="col" class="px-6 py-3">ID</th>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $advertisement->id }}
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <th scope="col" class="px-6 py-3">Ads Title</th>
                            <td class="px-6 py-4">
                                {{ $advertisement->ads_title }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 ">
                            <th scope="col" class="px-6 py-3">Ads Description</th>
                            <td class="px-6 py-4">
                                {{ $advertisement->ads_description }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 ">
                            <th scope="col" class="px-6 py-3">Ads Image</th>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/ads_images/' .basename($advertisement->ads_images))}}" class="w-32 h-32 object-cover">
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-500">
                            <th scope="col" class="px-6 py-3">Ads Video</th>
                            <td class="px-6 py-4">
                                <video width="200" height="200" controls>
                                    <source src="{{ asset('storage/ads_videos/' . basename($advertisement->ads_video)) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50 ">
                            <th scope="col" class="px-6 py-3">Created At</th>
                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($advertisement->created_at)) }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <th scope="col" class="px-6 py-3">Updated At</th>
                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($advertisement->updated_at)) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>