<?php 

namespace App\Http\Controllers; 

use App\Http\Requests\SearchRequest; 
use App\Http\Requests\User\StoreRequest; 
use App\Http\Requests\User\UpdateRequest; 
use App\Models\Role; 
use App\Models\User; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller 
{ 
    /** 
     * Menampilkan daftar user dengan fitur pencarian.
     */ 
    public function index(Request $request) 
    { 
        $keyword = $request->input('search'); 

        if ($keyword) { 
            $users = User::whereRaw( 
                "MATCH(name, email) AGAINST (? IN BOOLEAN MODE)", [$keyword] 
            ) 
            ->paginate(10) 
            ->withQueryString(); 
        } else { 
            $users = User::query() 
                ->paginate(10) 
                ->withQueryString(); 
        } 

        return view('users.index', compact('users')); 
    } 

    /** 
     * Menampilkan form tambah user baru.
     */ 
    public function create() 
    { 
        $roles = Role::all(); 
        return view('users.create', compact('roles')); 
    } 

    /** 
     * Menyimpan data user baru ke database.
     */ 
    public function store(StoreRequest $request) 
    { 
        $data = $request->validated(); 
        $data['password'] = Hash::make($data['password']); 

        User::create($data); 

        return redirect()->route('admin.users')->with('success', 'User berhasil dibuat'); 
    } 

    /** 
     * Menampilkan detail data user tertentu.
     */ 
    public function show(User $user) 
    { 
        return view('users.show', compact('user')); 
    } 

    /** 
     * Menampilkan form edit data user.
     */ 
    public function edit(User $user) 
    { 
        $roles = Role::all(); 
        return view('users.edit', compact('user', 'roles')); 
    } 

    /** 
     * Memperbarui data user di database (BAGIAN ERROR IS_ACTIVE SUDAH DIHAPUS).
     */ 
    public function update(UpdateRequest $request, User $user) 
    { 
        // 1. Ambil data yang lolos validasi
        $dataReq = $request->validated(); 

        // 2. Petakan masukan form ke objek data user
        $user->name = $dataReq['name']; 
        $user->email = $dataReq['email']; 
        $user->role_id = $dataReq['role_id']; 

        // 3. Jika kolom password baru diisi, lakukan enkripsi ulang
        if (!empty($dataReq['password'])) { 
            $user->password = Hash::make($dataReq['password']); 
        } 

        // 4. Simpan perubahan ke database MySQL
        $user->save(); 

        // 5. Dialihkan kembali ke halaman utama tabel manajemen user
        return redirect() 
            ->route('admin.users') 
            ->with('success', 'Data user berhasil diperbarui'); 
    } 

    /** 
     * Menghapus data user dari database.
     */ 
    public function destroy(User $user) 
    { 
        $user->delete(); 
        return back()->with('success', 'User deleted'); 
    } 
}
