<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add Contact') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add your real and active contact so people that has interest into your house that you sell can contact you.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.addPhoneNumber') }}" class="mt-6 space-y-6">
        @csrf
        @method('POST')
        @if($user->PhoneNumber == null)
            <h2 class="text-red dark:text-gray-400 mt-2">Contact Has Not Added Yet.</h2>
        @else
            @foreach($user->PhoneNumber as $item)
                    <div class="flex flex-row gap-2">
                        @php
                            $contact = $contacts->firstWhere('id', $item->id_contact);
                        @endphp
                        @if ($contact)
                            <img class="size-10" src="{{ asset('storage/'.$contact->banner_dir) }}" alt="">
                        @endif
                        <h2 class="text-red dark:text-gray-400 mt-2">{{$item->contact}}</h2>
                        <button type="button" class="py-1 px-2 rounded-md border border-2 text-white font-small bg-blue-700 hover:bg-blue-800
                            dark:bg-red-600 border-gray-800 dark:bg-red-600 dark:hover:bg-red-800 dark:border-red-600 dark:hover:border-red-800"
                            onclick="openDeletePhoneNumberModal('{{$item->id}}')">
                                Delete
                        </button>
                    </div>
            @endforeach
        @endif
        <select name="id_contact" id="">
            <option value="">Select contact</option>
            @foreach ($contacts as $item)
                <option value="{{$item->id}}">
                    {{$item->name}}
                </option>
            @endforeach
        </select>
        @error('phone_num')
            <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
        @enderror
        <x-input-label for="phone_num" :value="__('Username Or Phone Number')" />
        <x-text-input id="phone_num" name="phone_num" type="text" class="mt-1 block w-full"/>
        @error('phone_num')
            <div class="text-red dark:text-red-600 mt-2">{{$message}}</div>
        @enderror

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    <div id="deletePhoneNumberModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-80">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center">Confirm Delete</h2>
            <p class="text-gray-600 dark:text-gray-400 text-sm text-center mt-2">
                Are you sure you want to delete this item? This action cannot be undone.
            </p>
            <div class="mt-4 flex justify-center gap-4">
                <button id="cancelPhoneNumberButton" class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-md">
                    Cancel
                </button>
                <form id="deletePhoneNumberForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openDeletePhoneNumberModal(id) {
            const modal = document.getElementById('deletePhoneNumberModal');
            const deleteForm = document.getElementById('deletePhoneNumberForm');
            const deleteItemId = document.getElementById('deleteItemId');
            deleteForm.action = `/profile/delete_phone_number/${id}`

            modal.classList.remove('hidden'); // Show the modal
        }

        // Close the modal when the cancel button is clicked
        document.getElementById('cancelPhoneNumberButton').addEventListener('click', () => {
            document.getElementById('deletePhoneNumberModal').classList.add('hidden'); // Hide the modal
        });
    </script>
</section>
