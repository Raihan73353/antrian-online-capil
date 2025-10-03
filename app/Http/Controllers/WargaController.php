<?php

namespace App\Http\Controllers;
use App\Models\Antrean;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function index()
    {
        $pendaftarId = session('pendaftar_id');
        return view('warga.index', compact('pendaftarId'));
    }
    public function register()
    {
        return view('warga.register');
    }

     public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nik' => 'required|string|max:20|unique:pendaftar,nik',
        'no_hp' => 'required|string|max:20',
        'alamat' => 'required|string',
        'jenis_pendaftaran' => 'required|in:dukcapil,pencatatan_sipil',
    ]);

    $pendaftar = Pendaftar::create($validated);

    session(['pendaftar_id' => $pendaftar->id]);

    return redirect()->route('warga.index')
                     ->with('success', 'Pendaftar berhasil ditambahkan.');
}

public function cetak()
{
    $pendaftarId = session('pendaftar_id');

        if (!$pendaftarId) {
        return redirect()->route('register')
                         ->with('error', 'Silakan daftar terlebih dahulu.');
    }

    // 1. Ambil nomor terakhir dari DB
    $last = Antrean::orderBy('id', 'desc')->first();

    if ($last) {
        $lastNumber = (int) substr($last->nomor, 1);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    // 2. Format nomor antrian, misalnya "A001"
    $nomor = 'A' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    // 3. Simpan ke DB
    $antrean = Antrean::create([
        'nomor'         => $nomor,
        'jam'           => now()->format('H:i'),
        'jadwal_id'     => 1,
        'pendaftar_id'  => $pendaftarId,
    ]);

    // 4. Kirim ke view
    return view('warga.show', compact('antrean'));
}
}
