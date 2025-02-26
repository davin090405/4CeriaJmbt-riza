<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Of Houses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-1">
                    <div class="px-4 pt-4">
                        <a href="{{route('house.create.form')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                        dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">Create</a>
                    </div>
                    <table class="px-1 py-1 text-gray-900 dark:text-white w-full border border-gray-50 dark:border-gray-800 rounded-lg">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-200 rounded-lg">
                            <tr class="rounded-lg">
                            <th scope="col" class="px-6 py-4 text-center">Id</th>
                            <th scope="col" class="px-6 py-4 text-center">Name</th>
                            <th scope="col" class="px-6 py-4 text-center">Price</th>
                            <th scope="col" class="px-6 py-4 text-center">Uploader</th>
                            <th scope="col" class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($houses as $item)
                            <tr class="text-gray-700 dark:text-gray-300">
                                <td class="px-3 py-4 text-center text-light">{{ $item->id }}</td>
                                <td class="px-3 py-4 text-center text-light">{{ $item->name }}</td>
                                <td class="px-3 py-4 text-center text-light">{{ $item->price }}</td>
                                <td class="px-3 py-4 text-center text-light">{{ $item->user->username }}</td>
                                <td>
                                    <div class="flex space-x-4 place-content-center">
                                        <a href="{{route('house.detail',$item->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                                        font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-700
                                        dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">Detail</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
