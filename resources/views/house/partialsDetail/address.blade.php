<section>
   <h3>House Address</h3>
           
                @if($house->coordinate == null && $house->street_name == null && $house->kelurahan == null && $house->kecamatan == null && $house->kab_kota == null && $house->postal_code == null)
                    <a href="{{route('house.address.create.form', $house->id)}}">Add</a>
                @else
                  
                                <h3>Street Name : </h3>
                                <h3> {{$house->street_name}}</h3>
                           
                            @if($house->kelurahan!=null)
                               
                                    <h3>Kelurahan : </h3>
                                    <h3>{{$house->kelurahan}}</h3>
                              
                            @endif

                            @if ($house->kecamatan!=null)
                              
                                    <h3>Kecamatan : </h3>
                                    <h3>{{$house->kecamatan}}</h3>
                             
                            @endif
                          
                                <h3 >Kab/Kota : </h3>
                                <h3 >{{$house->kab_kota}}</h3>
                        
                            @if($house->province!=null)
                               
                                    <h3>Province : </h3>
                                    <h3>{{$house->province}}</h3>
                               
                            @endif
                        
                                <h3>Postal Code : </h3>
                                <h3>{{$house->postal_code}}</h3>
                          
                                    <button onclick="openDeleteAddressModal('{{route('house.address.delete',$house->id)}}')">
                                        Delete
                                    </button>
                                
                           
                        <div id="map" class="w-full h-80 max-w-screen-sm rounded-lg"></div>
                   
                @endif
           
    <!-- Delete Confirmation Modal -->

        <h2>Confirm Delete</h2>
        <p>
            Are you sure you want to delete this item (ID: <span id="deleteItemId"></span>)? This action cannot be undone.
        </p>
      
            <button id="cancelAddressButton">
                Cancel
            </button>
            <form id="deleteAddressForm" method="POST" action="{{route('house.address.delete',$house->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Delete
                </button>
            </form>
       

<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YXJhYmIiLCJhIjoiY20zYjVja2J2MW44MDJtczJuYmg1aXV1bCJ9.eBrkXkRMbiBWXkjX6Rtvbw';

    if(@json($house==null)){
    }
    else{
        const coordinateString = @json(optional($house)->coordinate ?? '');
        const [lat, lng] = coordinateString.split(',').map(coord => parseFloat(coord.trim()));
        let map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v11',
            center: [lng, lat],
            zoom: 13
        });
        var marker = new mapboxgl.Marker()
        .setLngLat([lng, lat])
        .addTo(map);

    // Center the map on the marker whenever the marker is clicked
    marker.getElement().addEventListener('click', () => {
        map.flyTo({ center: [lng, lat], zoom: 14 });
    });
    }

    // JavaScript to toggle the modal with item ID
function openDeleteAddressModal(actionUrl) {
    const modal = document.getElementById('deleteAddressModal');
    const deleteForm = document.getElementById('deleteAddressForm');
    const deleteItemId = document.getElementById('deleteItemId');

    modal.classList.remove('hidden'); // Show the modal
}

// Close the modal when the cancel button is clicked
document.getElementById('cancelAddressButton').addEventListener('click', () => {
    document.getElementById('deleteAddressModal').classList.add('hidden'); // Hide the modal
});

</script>
</section>