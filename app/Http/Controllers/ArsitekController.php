<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Arsitek; 

class ArsitekController extends Controller
{
    public function index()
    {
        // Ambil data arsitek dari database
        $arsiteks = Arsitek::all(); // Menggunakan Eloquent lebih baik daripada DB::table()

        // Kirim data ke view
        return view('users-page.house.arsitek', compact('arsiteks'));
    }

    public function show($id) 
    {
        // Cari arsitek berdasarkan ID
        $arsitek = Arsitek::findOrFail($id);

        // Tampilkan view detail
        return view('users-page.detailArsitek', compact('arsitek'));
    }
}
