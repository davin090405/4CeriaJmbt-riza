<x-app-layout>
    <body>
        <div class="px-4">
        <form method="POST" action="{{ route('permission.create') }}" class="px-4 py-6 text-gray-800 dark:text-white">
            @csrf
            @method('POST')
            <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="name">Role Name</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
            
            <button class="my-2  rounded-md border border-2 border-primary-800 py-2 px-4 hover:bg-gray-800 dark:hover:bg-gray-800 text-gray-900 dark:text-white"
            type="submit">Submit</button>
    
        </form>
    </div>
    
    </body>
    
    </x-app-layout>