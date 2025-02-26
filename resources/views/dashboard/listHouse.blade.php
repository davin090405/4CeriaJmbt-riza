<section>
        <style>
            
        </style>
    <div class="jr">
        <div class="jejeran">
            @if($houseList->isNotEmpty())
                @foreach($houseList as $items)
                    <a href="{{ route('house.view', $items->id) }}">
                        <div class="pilihan" style="margin-bottom: 20px;">
                            <td>
                                @if($items->housePic->isNotEmpty())
                                    <img class="h-full object-cover" src="{{ asset('storage/'.$items->housePic->first()->dir) }}" alt="">
                                @else
                                    <img class="h-full object-cover" src="{{ asset('storage/default/house/unavailable.png') }}" alt="No Image">
                                @endif
                            </td>
                            <div class="isipilihan">
                                <h2>{{ $items->name }}</h2>
                                <ul>
                                    <li><span>{{ "Rp. " . number_format($items->price, 0, ',', '.') }}</span></li>
                                    <li>{{ $items->full_address }}</li>
                                    <li>
                                        <hr>
                                        <ul class="logox">
                                            <li class="ruang">
                                                <img src="{{ asset('storage/Assets/iconKamarTidur.png') }}" alt="Kamar Tidur">
                                                <p>{{ $items->br . " Kamar Tidur" }}</p>
                                            </li>
                                            <li class="ruang">
                                                <img src="{{ asset('storage/Assets/iconKamarMandi.png') }}" alt="Kamar Mandi">
                                                <p>{{ $items->ba . " Kamar Mandi" }}</p>
                                            </li>
                                            <li class="ruang">
                                                <img src="{{ asset('storage/Assets/iconLuasTanah.png') }}" alt="Luas Tanah">
                                                <p>{{ $items->width . " m²" }}</p>
                                            </li>
                                            <li class="ruang">
                                                <img src="{{ asset('storage/Assets/iconLuasTanah.png') }}" alt="Luas Bangunan">
                                                <p>{{ $items->length . " m²" }}</p>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p>Data Masih Kosong hehe</p>
            @endif
        </div>
    </div>
</section>
