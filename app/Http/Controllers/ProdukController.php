<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        // Mengambil data produk beserta relasi user yang membuatnya (di-paginate 10 data per halaman)
        $produk = Produk::with('user')->latest()->paginate(10);
        
        // Mengarahkan ke file view produk/index.blade.php
        return view('produk.index', compact('produk'));
    }

    /**
     * Menampilkan form tambah produk baru.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Menyimpan data produk baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,jfif,webp|max:2048', // TAMBAH JFIF & WEBP
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id(); // Otomatis mengisi user_id dari admin/kasir yang sedang login

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Memperbarui data produk di database.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,jfif,webp|max:2048', // TAMBAH JFIF & WEBP
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage jika ada agar tidak merusak path baru
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Produk $produk)
    {
        // Hapus foto dari storage saat produk dihapus
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
