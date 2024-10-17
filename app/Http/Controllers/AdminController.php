<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     */
    public function index(Request $request)
    {
        // Mengambil pengguna dengan pencarian berdasarkan nama dan melakukan paginasi
        $users = User::where('name', 'like', '%' . $request->search . '%')
            ->orderBy('name', 'asc')
            ->simplePaginate(5);

        return view('admin.index', compact('users'));
    }

    /**
     * Menampilkan form untuk menambah pengguna baru.
     */
    public function add()
    {
        return view('admin.add');
    }

    /**
     * Menyimpan pengguna baru ke dalam database.
     */
    public function updet(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:16',
            'role' => 'required',
        ]);

        // Membuat pengguna baru
        $proses = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Mengembalikan respon berdasarkan hasil proses
        if ($proses) {
            return redirect('/admin')->with('Success', 'User Added Successfully');
        } else {
            return redirect('/admin/tambah')->with('Failed', 'Failed to Add User');
        }
    }

    /**
     * Menampilkan form untuk mengedit pengguna tertentu.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Menemukan pengguna berdasarkan ID
        return view('admin.edit', compact('user'));
    }

    /**
     * Memperbarui data pengguna yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|max:16',
        ]);

        // Mencari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Menyiapkan data untuk diupdate
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Hanya memperbarui password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Mengupdate data pengguna
        $proses = $user->update($data);

        // Mengembalikan respon berdasarkan hasil proses
        if ($proses) {
            return redirect('/admin')->with('Success', 'User Edited Successfully');
        } else {
            return redirect('/admin')->with('Failed', 'Failed to Edit User');
        }
    }

    /**
     * Menghapus pengguna tertentu dari database.
     */
    public function destroy($id)
    {
        // Menghapus pengguna berdasarkan ID
        $proses = User::destroy($id);

        // Mengembalikan respon berdasarkan hasil proses
        if ($proses) {
            return redirect('/admin')->with('Success', 'User Deleted Successfully');
        } else {
            return redirect('/admin')->with('Failed', 'Failed to Delete User');
        }
    }
}
