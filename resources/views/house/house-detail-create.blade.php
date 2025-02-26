<x-app-layout>
    <body>
        <div class="px-4">
        <form method="POST" action="{{ route('house.detail.create', $id) }}" class="px-4 py-6 text-gray-800 dark:text-white">
            @csrf
            @method('PUT')
            <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="width">Width</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="number" name="width" value="{{old('width')}}">
                @error('width')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="length">Length</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="number" name="length" value="{{old('length')}}">
                    @error('length')
                        <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="ba">Bath Room</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="number" name="ba" value="{{old('ba')}}">
                    @error('ba')
                        <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="br">Bed Room</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="number" name="br" value="{{old('br')}}">
                    @error('br')
                        <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="floors">Floors</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="number" name="floors" value="{{old('floors')}}">
                    @error('floors')
                        <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="hidden" name="id_house" value="{{$id}}">
                </div>
    
            <button class="my-2  rounded-md border border-2 border-primary-800 py-2 px-4 hover:bg-gray-800 dark:hover:bg-gray-800 text-gray-900 dark:text-white"
            type="submit">Submit</button>
    
        </form>
    </div>
    
    </body>
    
    </x-app-layout>