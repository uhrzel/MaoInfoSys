<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4  border-b bg-purple-500 hover:bg-purple-600 sm:px-6">
                    <h1 class="text-2xl font-bold text-white">
                        Create Ads
                    </h1>

                    <a href="{{ route('admin.advertisement') }}" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-yellow-200">
                        <i class="fas fa-arrow-alt-circle-left mr-1"></i>
                        Back
                    </a>
                </div>

                <form action="{{ route('admin.advertisementStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <table class="w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <tbody>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Ads title</th>
                                <td class="px-6 py-4">
                                    <input type="text" name="adsTitle" id="adsTitle" placeholder="Ads Title" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsTitle') border-0 @enderror" value="{{ old('adsTitle') }}">
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Ads Description</th>
                                <td class="px-6 py-4">
                                    <textarea name="adsDescription" id="adsDescription" placeholder="Ads Description" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsDescription') border-0 @enderror">{{ old('adsDescription') }}</textarea>
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Ads Image</th>
                                <td class="px-6 py-4">
                                    <input type="file" name="adsImage" id="adsImage" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsImage') border-0 @enderror">
                                    @error('adsImage')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
                                <th scope="col" class="px-6 py-3">Ads Video</th>
                                <td class="px-6 py-4">
                                    <input type="file" name="adsVideo" id="adsVideo" class="bg-dark-100 w-full p-4 text-black rounded-lg @error('adsVideo') border-0 @enderror">
                                    @error('adsVideo')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="bg-gray-700 ">
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