<x-app-layout>
    <x-slot:slot>
    <link rel="stylesheet" href="{{URL::asset('css/arsitek.css')}}">

    <div class="container">
        <div class="headerArsitek">
            <div class="kalimatHeaderArsitek">
                <h2>Hire Arsitek untuk design rumah anda</h2>
            </div>
            <div class="filterArsitek">
                <!-- Filter bisa ditambahkan nanti -->
            </div>
        </div>

        <div class="listArsitek">
    @foreach($arsiteks as $arsitek)
        <div class="arsitekCard">
            <img src="{{ asset('storage/' . $arsitek->foto) }}" alt="Foto Arsitek">
            <h3>{{ $arsitek->nama }}</h3>
            <p><strong>📌 Spesialisasi:</strong> {{ $arsitek->spesialisasi }}</p>
            <p><strong>📍 Lokasi:</strong> {{ $arsitek->lokasi }}</p>
            <p><strong>🔹 Pengalaman:</strong> {{ $arsitek->pengalaman_tahun }} tahun</p>
            <p><strong>💰 Rate:</strong> Rp{{ number_format($arsitek->rate_harga, 0, ',', '.') }}</p>
            <a href="{{ route('arsitek.detail', $arsitek->id) }}" class="btn">🔍 Detail</a>
        </div>
    @endforeach
</div>


    </div>
    </x-slot:slot>
</x-app-layout>
