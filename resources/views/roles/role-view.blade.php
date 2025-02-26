<x-app-layout>
    <body>
        <div class="px-4">
        <form method="POST" action="{{ route('role.edit', $role->id) }}" class="px-4 py-6 text-gray-800 dark:text-white">
            @csrf
            @method('PUT')
            <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="name">Role Name</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text" name="name" value="{{$role->name}}">
                @error('name')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="permission">Permission</label>
                @foreach($permissions as $item)
                    <div class="flex items-center mb-4">
                        <input @if ( $role->permissions->contains('name', $item->name)) checked @endif
                        id="permissions-{{$item->name}}" name="permissions[]" type="checkbox" value="{{$item->name}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded
                        focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$item->name}}</label>
                    </div>
                @endforeach
                @error('permissions')
                    <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
                @enderror
            </div>
            
            <button class="my-2 mr-2  rounded-md border border-2 border-primary-800 py-2 px-4 hover:bg-gray-800 dark:hover:bg-gray-800 text-gray-900 dark:text-white"
            type="submit">Submit</button>
            <button class="my-2 py-2 px-4 border-2 border-red-600 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg
            dark:bg-red-600 dark:hover:bg-red-700 dark:hover:border-red-700"
            type="button" onclick="openDeleteRoleModal()">Delete</button>
        </form>
    </div>
    <div id="deleteRoleModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-80">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center">Confirm Delete</h2>
            <p class="text-gray-600 dark:text-gray-400 text-sm text-center mt-2">
                Are you sure you want to delete this Role? This action cannot be undone.
            </p>
            <p class="text-gray-600 dark:text-gray-400 text-sm text-center mt-2">
                Type the Role name first below to delete this Role!
            </p>
            <input type="text" id="confirmDeleteRole" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
            dark:focus:border-blue-500">
            <p class="text-red-600 dark:text-red-400 text-sm text-left mt-2" id="falseRoleName"></p>

            <div class="mt-4 flex justify-center gap-4">
                <button id="cancelRoleButton" class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-md">
                    Cancel
                </button>
                <form id="deleteRoleForm" method="POST" action="{{route('role.destroy',$role->id)}}">
                    @csrf
                    @method('delete')
                    <button type="button" onclick="submitDeleteRole()" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    </body>
    <script>
        function submitDeleteRole() {
            if (document.getElementById('confirmDeleteRole').value == @json($role->name)) {
                console.log('Role name matches!');
                document.getElementById('deleteRoleForm').submit();
            }
            else{
                const falseRole = "Role name doesn't match!";
                document.getElementById('falseRoleName').textContent=falseRole;
            }
            
        }
        function openDeleteRoleModal(actionUrl) {
            const modal = document.getElementById('deleteRoleModal');
            const deleteForm = document.getElementById('deleteRoleForm');
            const deleteItemId = document.getElementById('deleteItemId');

            modal.classList.remove('hidden'); // Show the modal
        }

        // Close the modal when the cancel button is clicked
        document.getElementById('cancelRoleButton').addEventListener('click', () => {
        document.getElementById('deleteRoleModal').classList.add('hidden');
        });

    </script>
    
    </x-app-layout>