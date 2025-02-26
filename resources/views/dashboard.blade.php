<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @include('dashboard.map')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 space-y-2">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Filter</h1>
                        <form method="GET" action="{{ route('dashboard') }}">
                            @method('GET')
                        <div class="flex flex-row gap-2">
                            
                                <div class="flex flex-row items-center gap-2">
                                    <label for="">Province</label>
                                    <select name="province" id="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                                        <option value="">Select Province</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}"
                                                {{ request('province') == $province->id ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-row items-center gap-2">
                                    <label for="">City</label>
                                    <select name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                                        <option value="">Select City</option>
                                    </select>
                                    <input type="hidden" name="provinceIn" id="provinceIn" value="{{$selected[0]}}">
                                    <input type="hidden" name="cityIn" id="cityIn" value="{{$selected[1]}}">
                                </div>

                                <div class="flex flex-row items-center gap-2">
                                    <label for="">Price Range</label>
                                    <input type="number" name="minPrice" id="minPrice" placeholder="Minimum Range"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{$selected[2]}}">
                                    <input type="number" name="maxPrice" id="maxPrice" placeholder="Maximum Range"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                                    p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{$selected[3]}}">
                                </div>
                                
                                <div class="flex flex-row items-center gap-2">
                                    <button id="filter" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                                    font-medium rounded-lg text-sm px-4 py-2 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                                    dark:hover:bg-gray-800">Filter</button>
                                </div>

                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <script>
                // Function to populate cities based on the selected province and set the selected city
                function populateCities(provinceId, selectedCityName = null) {
                    if (provinceId) {
                        fetch('/dashboard/getRegion/' + provinceId)
                            .then(response => response.json())
                            .then(data => {
                                const citySelect = document.getElementById('city');
                                citySelect.innerHTML = ''; // Clear previous city options

                                // Add default "Select City" option
                                const defaultOption = document.createElement('option');
                                defaultOption.text = 'Select City';
                                defaultOption.value = '';
                                citySelect.appendChild(defaultOption);

                                // Add cities to the dropdown
                                data.regions.forEach(region => {
                                    const option = document.createElement('option');
                                    option.value = region.name; // Use city name as value
                                    option.text = region.name;

                                    // Pre-select city if it matches the saved value
                                    if (selectedCityName && selectedCityName === region.name) {
                                        option.selected = true;
                                    }
                                    citySelect.appendChild(option);
                                });

                                // Sync the hidden input with the selected city
                                citySelect.addEventListener('change', function() {
                                    document.getElementById('cityIn').value = this.options[this.selectedIndex].text;
                                });
                            })
                            .catch(error => console.error('Error fetching cities:', error));
                    }
                }

                // Event listener for province selection
                document.getElementById('province').addEventListener('change', function() {
                    const provinceId = this.value;
                    const provinceName = this.options[this.selectedIndex].text;

                    // Update the hidden province input
                    document.getElementById('provinceIn').value = provinceName;

                    // Populate cities based on the selected province
                    populateCities(provinceId);
                });

                // Set default selected options on page load
                document.addEventListener('DOMContentLoaded', function() {
                    const provinceSelect = document.getElementById('province');
                    const selectedProvinceName = document.getElementById('provinceIn').value; // Hidden input for province
                    const citySelect = document.getElementById('city');
                    const selectedCityName = document.getElementById('cityIn').value; // Hidden input for city

                    // Set the selected province in the dropdown
                    Array.from(provinceSelect.options).forEach(option => {
                        if (option.text === selectedProvinceName) {
                            option.selected = true;
                        }
                    });

                    // Fetch and set cities based on the selected province
                    const selectedProvinceId = provinceSelect.value;
                    const selectedCityId = citySelect.value;
                    if (selectedProvinceId) {
                        populateCities(selectedProvinceId, selectedCityName);
                    }
                });


            </script>
            @include('dashboard.listHouse')
        </div>
    </div>

</x-app-layout>

