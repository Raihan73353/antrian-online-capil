<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Pendaftar;
use App\Models\Jadwal;
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
        $today = now()->toDateString();
        $jadwal = Jadwal::whereDate('tanggal', $today)->first();

        $errorMessage = null;

        if (!$jadwal) {
            $errorMessage = 'Belum ada jadwal untuk hari ini.';
        } else {
            $totalAntrean = Antrean::where('jadwal_id', $jadwal->id)->count();
            if ($totalAntrean >= $jadwal->kuota) {
                $errorMessage = 'Kuota antrean untuk hari ini sudah penuh.';
            }
        }

        return view('warga.register', compact('jadwal', 'errorMessage'));
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
        session(['jenis_pendaftaran' => $pendaftar->jenis_pendaftaran]);

        return redirect()->route('warga.index')
            ->with('success', 'Pendaftar berhasil ditambahkan.');
    }

    public function cetak(Request $request)
    {
        $pendaftarId = session('pendaftar_id');
        $jenis_pendaftaran = session('jenis_pendaftaran');

        if (!$pendaftarId) {
            return redirect()->route('register')
                ->with('error', 'Silakan daftar terlebih dahulu.');
        }

        // Tentukan prefix
        $prefix = 'A'; // default
        if ($jenis_pendaftaran === 'dukcapil') {
            $prefix = 'A';
        } elseif ($jenis_pendaftaran === 'pencatatan_sipil') {
            $prefix = 'B';
        }

        // Cari jadwal hari ini
        $today = now()->toDateString();
        $jadwal = Jadwal::whereDate('tanggal', $today)->first();

        if (!$jadwal) {
            return redirect()->route('register')
                ->with('error', 'Belum ada jadwal untuk hari ini.');
        }

        $totalAntrean = Antrean::where('jadwal_id', $jadwal->id)->count();

        if ($totalAntrean >= $jadwal->kuota) {
            return redirect()->route('register')
                ->with('error', 'Kuota antrean untuk hari ini sudah penuh.');
        }

        // Ambil nomor terakhir sesuai prefix & jadwal_id
        $last = Antrean::where('jadwal_id', $jadwal->id)
            ->where('nomor', 'like', $prefix . '%')
            ->orderBy('id', 'desc')
            ->first();

        if ($last) {
            $lastNumber = (int) substr($last->nomor, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format nomor antrian
        $nomor = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        // Simpan ke DB
        $antrean = Antrean::create([
            'nomor'         => $nomor,
            'jam'           => now()->format('H:i'),
            'jadwal_id'     => $jadwal->id,
            'pendaftar_id'  => $pendaftarId,
        ]);

        return view('warga.show', compact('antrean'));
    }
}
