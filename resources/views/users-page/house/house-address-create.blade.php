<x-app-layout>
    <style>
        #map {
            height: 400px;
            width: 400px;
            display: flex;
            justify-content: center;
            margin: auto;
        }
    </style>
    <body>
        <div class="px-4">
            <form method="POST" action="{{route('house.address.create', $id)}}">
                @csrf
                @method('PATCH')
                <div class="px-4 py-1 flex flex-row">
                    <div class="w-3/5 flex flex-col">
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Street Name</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="street_name" id="street-input" value="">
                        </div>
                        <x-input-error :messages="$errors->get('street_name')" class="mt-1 mx-4" />
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kelurahan</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="kelurahan" id="neighborhood-input" value="">
                        </div>
                        <x-input-error :messages="$errors->get('kelurahan')" class="mt-1 mx-4" />
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kecamatan</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="kecamatan" id="locality-input" value="">
                        </div>
                        <x-input-error :messages="$errors->get('kecamatan')" class="mt-1 mx-4" />
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Kabupaten Kota</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="kab_kota" id="city-input" value="">
                        </div>
                        <x-input-error :messages="$errors->get('kab_kota')" class="mt-1 mx-4" />
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Province</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="province" id="province-input" value="">
                        </div>
                        <x-input-error :messages="$errors->get('province')" class="mt-1 mx-4" />
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">Postal Code</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="postal_code" id="postalCode-input" value="">
                            <input name="id_house" type="hidden" value="{{$id}}">
                        </div>
                        <x-input-error :messages="$errors->get('postal_code')" class="mt-1 mx-4" />
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">lat</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="lat" id="lat-input" value="" readonly>
                        </div>
                        <div class="content-center pt-2 px-4 mr-4 flex flex-row items-center space-x-2">
                            <label class="text-gray-800 dark:text-gray-200 whitespace-nowrap">lng</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full
                            p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-800 dark:text-white dark:focus:ring-blue-500
                            dark:focus:border-blue-500" type="text" name="lng" id="lng-input" value="" readonly>
                        </div>
                    </div>
                    <div class="">
                        <di id="map" class="w-full h-80"></div>
                    </div>
                </div>
                
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-800 dark:border-gray-600 dark:bg-gray-600
                dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-blue-800">
                    Create
                </button>

        </form>
    </div>
    
    </body>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YXJhYmIiLCJhIjoiY20zYjVja2J2MW44MDJtczJuYmg1aXV1bCJ9.eBrkXkRMbiBWXkjX6Rtvbw';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v11',
            center: [106.82767329965759, -6.185708854733704],
            zoom: 8
        });

        var currentMarker = null;
        function getLocationDetails(lng, lat) {
            const geocodingUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${lng},${lat}.json?access_token=${mapboxgl.accessToken}`;

            fetch(geocodingUrl)
                .then(response => response.json())
                .then(data => {
                    const place = data.features[0]; // Get the most relevant location result
                    const placeName = place ? place.place_name : 'Unknown location';
                    const kelurahanName = place.text;
                    const context = place.context || []; 
                    let street = '';
                    let neighborhood = '';
                    let locality = '';
                    let city = '';
                    let province = '';
                    let postalCode = '';
                    let country = '';

                    // Loop through context array to find specific location data
                    context.forEach((item) => {
                        console.log(item);
                        if (item.id.includes('address')) {
                            street = item.text;
                        }
                        if (item.id.includes('neighborhood')) {
                            neighborhood = item.text;
                        }
                        if (item.id.includes('locality')) {
                            locality = item.text;
                        }
                        if (item.id.includes('place')) {
                            city = item.text;
                        }
                        if (item.id.includes('region')) {
                            province = item.text;
                        }
                        if (item.id.includes('postcode')) {
                            postalCode = item.text;
                        }
                        if (item.id.includes('country')) {
                            country = item.text;
                        }
                    });
                    document.getElementById('street-input').value = street;
                    document.getElementById('neighborhood-input').value = kelurahanName;
                    document.getElementById('locality-input').value = locality;
                    document.getElementById('lng-input').value = lng;
                    document.getElementById('lat-input').value = lat;
                    document.getElementById('city-input').value = city;
                    document.getElementById('province-input').value = province;
                    document.getElementById('postalCode-input').value = postalCode;
                    document.getElementById('country-input').value = country;

                    // Display the location info
                    document.getElementById('location-info').textContent = `Coordinates: ${lat}, ${lng} - Location: ${placeName}`;

                    // Optionally, send coordinates and place name to the server
                    sendCoordinatesToServer(lng, lat, placeName);
                })
                .catch(error => console.error('Geocoding API Error:', error));
        }

        let geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            placeholder: 'Search for places', // Placeholder text for search input
            marker: {
                color: 'blue'
            },
        });

        map.addControl(geocoder);

        geocoder.on('result', (event) => {
            const coords = event.result.geometry.coordinates;
            console.log("Coordinates:", coords); // Logs the coordinates of the searched location
        });
        // Map click event to add/replace marker and get location info
        map.on('click', function (e) {
            var lng = e.lngLat.lng;
            var lat = e.lngLat.lat;

            // Remove previous marker if it exists
            if (currentMarker) {
                currentMarker.remove();
            }

            // Add new marker at clicked location
            currentMarker = new mapboxgl.Marker()
                .setLngLat([lng, lat])
                .addTo(map);

            // Get location details
            getLocationDetails(lng, lat);
        });

        // Function to send coordinates and place name to the server
        function sendCoordinatesToServer(lng, lat, placeName) {
            fetch('/save-location', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ lng: lng, lat: lat, place: placeName })
            })
            .then(response => response.json())
            .then(data => console.log('Location saved:', data))
            .catch(error => console.error('Error:', error));
        }
    </script>
</x-app-layout>