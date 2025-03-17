<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('arsiteks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('no_telp'); // Nomor telepon
            $table->string('foto')->nullable(); // Path foto
            $table->string('portofolio')->nullable(); // File portofolio (PDF/ZIP)
            $table->string('sertifikat')->nullable(); // File sertifikat (PDF/ZIP)
            $table->string('keahlian')->nullable(); // Keahlian arsitek
            $table->string('lokasi')->nullable(); // Lokasi/Kota
            $table->text('bio')->nullable(); // Deskripsi singkat
            $table->decimal('harga', 10, 2)->nullable(); // Harga jasa
            $table->float('rating', 2, 1)->default(0); // Rating (misal: 4.5)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arsiteks');
    }
};
