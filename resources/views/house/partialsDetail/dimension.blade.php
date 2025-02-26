<section>
    <style>
        h3, h2 {
            margin-bottom: 10px;
        }

        /* Style untuk form */
        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        /* Style untuk label */
        label {
            margin-top: 10px;
            font-weight: bold;
        }

        /* Style untuk input */
        input[type="text"] {
            margin-top: 5px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: #fff;
            color: #fd1d1d;
        }

        /* Style untuk tombol */
        button, a {
            padding: 10px;
            margin-top: 10px;
            background-color: white;
            color: #fd1d1d;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover, a:hover {
            background-color: #f8caca;
        }

        /* Style untuk pesan error */
        div {
            margin-top: 5px;
            color: #f8d7da;
            background-color: #842029;
            border: 1px solid #f5c2c7;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
        }

        /* Style untuk modal */
        #deleteDimensionModal {
            display: none; /* Initially hidden */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            color: #fd1d1d;
            border-radius: 10px;
            padding: 20px;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #deleteDimensionModal.hidden {
            display: none; /* Hidden when class is added */
        }

        /* Style untuk tombol di modal */
        #deleteDimensionModal button {
            margin: 5px 10px;
        }
    </style>
    <form method="POST" id="deleteDetailForm" action="{{route('house.detail.delete', $house->id)}}">
        @csrf
        @method('PUT')
    </form>

   
                <h3>House Dimension</h3>
           
            @if($house->width==null && $house->length==null && $house->br==null && $house->ba==null && $house->floors==null )
          
                <a href="{{route('house.detail.create.form',$house->id)}}">Add</a>
           
            @else
                <form method="POST" action="{{ route('house.detail.edit', $house->id) }}">
                    @csrf
                    @method('PUT')
                  
                            <label>Width</label>
                            <input type="text" name="width" value="{{$house->width}}">
                     
                        
                            <label>Length</label>
                            <input type="text" name="length" value="{{$house->length}}">
                       
                     
                            <h3>Area Total : {{$house->width * $house->length}} M</h3><sup>2</sup>
                        
                    
                  
                            <label>Bed Room</label>
                            <input type="text" name="br" value="{{$house->br}}">
                     
                            <label>Bath Room</label>
                            <input type="text" name="ba" value="{{$house->ba}}">
                       
                        
                       
                            <label>Floors</label>
                            <input type="text" name="floors" value="{{$house->floors}}">
                       
                            <input type="hidden" name="id_house" value="{{$house->id}}">
                      
                    
                        <button type="submit">Edit</button>
                        <button onclick="openDeleteDimensionModal()" type="button">Delete</button>
                        @error('width')
                        <div>{{ $message }}</div>
                        @enderror
                        @error('length')
                        <div>{{ $message }}</div>
                        @enderror
                        @error('br')
                        <div>{{ $message }}</div>
                        @enderror
                        @error('ba')
                        <div>{{ $message }}</div>
                        @enderror
                        @error('floors')
                        <div>{{ $message }}</div>
                        @enderror
                    
                </form>
            @endif
       
        <h2>Confirm Delete</h2>
        <p>
            Are you sure you want to delete this item (ID: <span id="deleteItemId"></span>)? This action cannot be undone.
        </p>
       
            <button id="cancelDimensionButton">
                Cancel
            </button>
            <form id="deleteDimensionForm" method="POST" action="{{route('house.detail.dimension.delete', $house->id)}}">
                @csrf
                @method('PUT')
                <button type="submit">
                    Delete
                </button>
            </form>
        
    <script>
        function submitDeleteDetail() {
            document.getElementById('deleteDetailForm').submit();
        }
        function openDeleteDimensionModal(actionUrl) {
            const modal = document.getElementById('deleteDimensionModal');
            const deleteForm = document.getElementById('deleteDimensionForm');
            const deleteItemId = document.getElementById('deleteItemId');

            modal.classList.remove('hidden'); // Show the modal
        }

        // Close the modal when the cancel button is clicked
        document.getElementById('cancelDimensionButton').addEventListener('click', () => {
        document.getElementById('deleteDimensionModal').classList.add('hidden');
        });

    </script>
</section>