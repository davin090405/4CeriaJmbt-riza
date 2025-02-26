<section>
    
                <h3>Rooms List</h3>
               
                        <form method="POST" action="{{ route('house.room.create') }}">
                            @csrf
                            @method('POST')
                            <label for="file_input">Room Name</label>
                            <input type="text" name="name">
                            @error('name')
                                <div>{{ $message }}</div>
                            @enderror
                            <label for="file_input">Width</label>
                            <input type="text" name="width">
                            @error('width')
                                <div>{{ $message }}</div>
                            @enderror
                            <label for="file_input">Length</label>
                            <input type="text" name="length">
                            @error('length')
                                <div>{{ $message }}</div>
                            @enderror
                            <label for="file_input">Description</label>
                            <input type="text" name="desc">
                            @error('desc')
                                <div>{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="id_house" value="{{$house->id}}">
                            
                            <button type="submit">Add</button>
                            @if(session('success1'))
                               
                                    {{ session('success1') }}
                               
                            @endif
                            @if(session('error'))
                                <div class="alert alert-error">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </form>
                 

                   
                            @if($house->room->isEmpty())
                                <h3>
                                    No Data Rooms Available
                                </h3>
                            @else
                               
                                    <p>Room List</p>
                                    @foreach($house->room as $items)
                                        
                                               
                                                    {{$increment++.". "}}
                                               
                                             
                                                    <p>{{$items->name}}</p>
                                                    <p>
                                                        {{$items->width." M² X ".$items->length." M² : ".$items->width * $items->length." M²"}}
                                                    </p>
                                                    <p>{{$items->desc}}</p>
                                               
                                                    <a href="{{route('house.room.detail',$items->id)}}">Detail</a>
                                               
                                    @endforeach
                               
                            @endif
                       
</section>
