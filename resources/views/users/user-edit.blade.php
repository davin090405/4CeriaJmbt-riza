<x-app-layout>
    <body>
        <div class="px-4">
        <form method="POST" action="{{ route('user.edit',$users->id) }}" class="px-4 py-6 text-gray-800 dark:text-white">
            @csrf
            @method('PUT')
            {{-- <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nama_penumpang">Nama Penumpang</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="user_id" id="user_id">
                    <option value="" disabled {{is_null($tiket->user->id) ? 'selected':''}}> Select User </option>
                    @foreach($user as $key)
                    <option value= "{{$key->id}}" {{$tiket->user->id == $key->id ?  'selected' : ''}}>
                        {{$key->name}}
                    </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div> --}}
            <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="name">Name</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="name" value="{{$users->name}}">
                @error('name')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
            
            
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="username">Username</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="username" value="{{$users->username}}">
                @error('username')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="email" value="{{$users->email}}">
            @error('email')
                <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
            @enderror
            </div>

            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
                    <select name="role_assign" id="role_assign" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                    dark:focus:border-blue-500">
                        <option value="" disabled {{ is_null($users->getRoleNames()) ? 'selected' : '' }}>Select Role</option>
                        @foreach ($role as $value)
                        <option value="{{ $value->name }}" {{ $value == $value->name ? 'selected' : '' }}>
                            {{ $value->name }}
                        </option>
                        @endforeach
                    </select>
                @error('email')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
                </div>
    
            @if(Auth::user()->can('user-edit'))
            <button class="my-2  rounded-md border border-2 border-primary-800 py-2 px-4 hover:bg-gray-800 dark:hover:bg-gray-800 text-gray-900 dark:text-white"
            type="submit">Submit</button>
            @endif
    
        </form>
    </div>
    
    </body>
    
    </x-app-layout>