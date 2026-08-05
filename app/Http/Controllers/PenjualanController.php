<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Menampilkan daftar transaksi penjualan.
     */
    public function index()
    {
        // Mengambil data penjualan terbaru beserta kasir/user yang bertransaksi
        $penjualan = Penjualan::with('user')->latest()->paginate(10);
        
        // Mengarahkan ke halaman resources/views/penjualan/index.blade.php
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Menampilkan form transaksi baru.
     */
    public function create()
    {
        return view('penjualan.create');
    }

    /**
     * Menyimpan transaksi penjualan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'status' => 'required|string',
        ]);

        Penjualan::create([
            'user_id' => auth()->id(),
            'total_pembayaran' => $request->total_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => $request->status,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Transaksi penjualan berhasil disimpan.');
    }

    /**
     * Menghapus data transaksi.
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
