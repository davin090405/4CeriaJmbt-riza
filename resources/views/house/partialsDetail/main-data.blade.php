<section>
    <style>
          section {
            background-color: #fd1d1d;
            color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            font-family: Arial, sans-serif;
        }

        /* Style untuk form */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Style untuk label */
        label {
            margin-top: 10px;
            font-weight: bold;
        }

        /* Style untuk input dan textarea */
        input[type="text"], textarea {
            margin-top: 5px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: #fff;
            color: #fd1d1d;
        }

        /* Style untuk tombol */
        button {
            padding: 10px;
            background-color: white;
            color: #fd1d1d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #f8caca;
        }
    </style>
            <form method="POST" action="{{route('house.edit', $house->id)}}">
                @csrf
                @method('PUT')
                    <h3>House Main Data</h3>
                        <label>Name</label>
                        <input type="text" name="name" value="{{$house->name}}">
                        <label>Price</label>
                        <input type="text" name="price" value="{{$house->price}}">
                        <label>Desc</label>
                        <textarea name="house_desc" id="">
                            {{$house->house_desc}}
                        </textarea>
                <button type="submit">Edit</button>
            </form>
     
</section>