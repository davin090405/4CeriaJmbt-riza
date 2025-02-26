<section>
   
                <h3>House Pics</h3>
              
                        <form method="POST" action="{{ route('house.pic.create', $house->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label for="file_input">Upload file</label>
                            <input aria-describedby="file_input_help" id="file_input" type="file" name="house_pic">
                            <p id="file_input_help">PNG Or JPG (MAX. 800x400px).</p>
                            <button type="submit">Add</button>
                            @if(session('success'))
                               
                                    {{ session('success') }}
                               
                            @endif
                            @if(session('error'))
                               
                                    {{ session('error') }}
                               
                            @endif
                            @error('house_pic')
                                <div>{{ $message }}</div>
                            @enderror
                        </form>
                    

                    <!-- House Pictures -->
                  
                            
                                @if($house->housePic->isEmpty())
                                    <h3>No Picture</h3>
                                @else
                                    <h3>List Of Pictures</h3>
                                    <div>
                                    @foreach($house->housePic as $items)

                                    <div id="deletePicModal">
                                       
                                            <h2>Confirm Delete</h2>
                                            <p>
                                                Are you sure you want to delete this item (ID: <span id="deleteItemId"></span>)? This action cannot be undone.
                                            </p>
                                          
                                                <button id="cancelPicButton">
                                                    Cancel
                                                </button>
                                                <form id="deletePicForm" method="POST" action="{{route('house.pic.delete', $items->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                          
                                  
                                        <img src="{{ asset('storage/'.$items->dir) }}" alt="">
                                        
                                        <button onclick="openDeletePicModal()">
                                            Delete
                                        </button>
                                   
                                    @endforeach
                               
                            @endif
                   

    <script>
        function openDeletePicModal() {
            const modal = document.getElementById('deletePicModal');
            const deleteForm = document.getElementById('deletePicForm');
            const deleteItemId = document.getElementById('deleteItemId');

            modal.classList.remove('hidden'); // Show the modal
    }

    // Close the modal when the cancel button is clicked
    document.getElementById('cancelPicButton').addEventListener('click', () => {
        document.getElementById('deletePicModal').classList.add('hidden'); // Hide the modal
    });
    </script>
</section>
