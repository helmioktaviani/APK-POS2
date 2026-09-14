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
        $produk = Produk::with('user')->latest()->paginate(10);
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
        // Validasi disesuaikan dengan atribut name="name", dll di Blade Anda
        $request->validate([
            'name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,jfif,webp|max:2048',
        ]);

        // Pemetaan data input form ke kolom database
        $data = [
            'nama'       => $request->name,
            'harga_beli' => $request->purchase_price,
            'harga_jual' => $request->selling_price,
            'stok'       => $request->stock,
            'user_id'    => auth()->id(), 
        ];

        // Proses unggah foto ke storage
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
            'name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,jfif,webp|max:2048',
        ]);

        $data = [
            'nama'       => $request->name,
            'harga_beli' => $request->purchase_price,
            'harga_jual' => $request->selling_price,
            'stok'       => $request->stock,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage jika ada
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
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
} // Kurung kurawal penutup class yang sempat hilang wajib ada di sini
