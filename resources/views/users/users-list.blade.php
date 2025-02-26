<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Of Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-1">
                    <table class="px-1 py-1 text-gray-900 dark:text-white w-full border border-gray-50 dark:border-gray-800 rounded-lg">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-200 rounded-lg">
                            <tr class="rounded-lg">
                            <th scope="col" class="px-6 py-4 text-center">Id</th>
                            <th scope="col" class="px-6 py-4 text-center">Name</th>
                            <th scope="col" class="px-6 py-4 text-center">Username</th>
                            <th scope="col" class="px-6 py-4 text-center">Email</th>
                            <th scope="col" class="px-6 py-4 text-center">Roles</th>
                            <th scope="col" class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 dark:text-gray-300">
                            @foreach ($users as $item)
                            <tr>
                                <td class="px-3 py-4 text-center font-light ">{{ $item->id }}</td>
                                <td class="px-3 py-4 text-center font-light">{{ $item->name }}</td>
                                <td class="px-3 py-4 text-center font-light">{{ $item->username }}</td>
                                <td class="px-3 py-4 text-center font-light">{{ $item->email }}</td>
                                @if($item->getRoleNames()->isEmpty())
                                    <td class="px-3 py-4 text-center font-light">user</td>
                                @endif
                                @foreach($item->getRoleNames() as $role)
                                    <td class="px-3 py-4 text-center font-light">{{ $role }}</td>
                                @endforeach
                                <td>
                                    <div class="flex space-x-4 place-content-center">
                                        <a href="{{route('user.edit.form', $item->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                                        font-medium rounded-lg text-sm px-4 py-2 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                                        dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800 ">View</a>
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
