<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Advertisements') }}
    </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4  border-b bg-purple-500 hover:bg-purple-600 sm:px-6">
                    <h3 class="text-lg font-medium text-white">
                        Update Advertisment
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.advertisementShow', $advertisement->id) }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                            <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                            Back
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.advertisementUpdate', $advertisement->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <tbody>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Advertisement ID</th>

                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $advertisement->id }}
                                    </span>
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Advertisement title</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="adsTitle" id="adsTitle" placeholder="Ads title" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsTitle') border-0 @enderror" value="{{ $advertisement->ads_title}}">
                                    @error('title')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Ads Description</th>

                                <td class="px-6 py-4">
                                    <input type="text" name="adsDescription" id="adsDescription" placeholder="Ads Description" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsDescription') border-0 @enderror" value="{{ $advertisement->ads_description }}">
                                    @error('adsDescription')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Ads Image</th>
                                <td class="px-6 py-4">
                                    <input type="file" name="adsImage" id="adsImage" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsImage') border-0 @enderror">
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Ads Video</th>
                                <td class="px-6 py-4">
                                    <input type="file" name="adsVideo" id="adsVideo" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsVideo') border-0 @enderror">
                                </td>
                            </tr>

                            <tr class="bg-gray-700 ">
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