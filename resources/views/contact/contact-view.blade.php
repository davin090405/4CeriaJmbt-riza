<x-app-layout>
    <body>
        <div class="px-4">
        <form method="POST" action="{{ route('contact.edit', $contact->id) }}" class="px-4 py-6 text-gray-800 dark:text-white" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="name">Name</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="name" value="{{$contact->name}}">
                @error('name')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="url">url</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="url" value="{{$contact->url}}">
                @error('url')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="banner">Banner</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
                            dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file" name="banner" value="{{$contact->banner_dir}}">
                @error('banner')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
                <!-- Displaying the previous file image preview -->
                @if ($contact->banner_dir)
                <img src="{{ asset('storage/'.$contact->banner_dir) }}" alt="Banner Image" class="mt-2 w-32 h-32 object-cover">
                @endif
            </div>
    
            <button class="my-2  rounded-md border border-2 border-primary-800 py-2 px-4 hover:bg-gray-800 dark:hover:bg-gray-800 text-gray-900 dark:text-white"
            type="submit">Submit</button>
    
        </form>
    </div>
    
    </body>
    
    </x-app-layout>