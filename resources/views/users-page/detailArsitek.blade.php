<x-app-layout>
    <x-slot:slot>
    <link rel="stylesheet" href="{{URL::asset('css/arsitek.css')}}">

    <div class="container">
        <div class="arsitekDetail">
            <img src="{{ asset('storage/' . $arsitek->foto) }}" alt="Foto Arsitek">
            <h2>{{ $arsitek->nama }}</h2>
            <p><strong>📞 No. Telepon:</strong> {{ $arsitek->no_telp }}</p>
            <p><strong>📍 Lokasi:</strong> {{ $arsitek->lokasi }}</p>
            <p><strong>🎨 Spesialisasi:</strong> {{ $arsitek->spesialisasi }}</p>
            <p><strong>⌛ Pengalaman:</strong> {{ $arsitek->pengalaman_tahun }} tahun</p>
            <p><strong>💰 Rate Harga:</strong> Rp{{ number_format($arsitek->rate_harga, 0, ',', '.') }}</p>
            <p><strong>📝 Deskripsi:</strong> {{ $arsitek->deskripsi }}</p>

            <h3>Dokumen</h3>
            <a href="{{ asset('storage/' . $arsitek->file_portofolio) }}" target="_blank">📂 Lihat Portofolio</a>
            <a href="{{ asset('storage/' . $arsitek->file_sertifikat) }}" target="_blank">📜 Lihat Sertifikat</a>

            <br><br>
            <a href="https://wa.me/{{ $arsitek->no_telp }}" class="btn">💬 Chat via WhatsApp</a>
            <a href="{{ route('arsitek') }}" class="btn">🔙 Kembali</a>

        </div>
    </div>
    </x-slot:slot>
</x-app-layout>
