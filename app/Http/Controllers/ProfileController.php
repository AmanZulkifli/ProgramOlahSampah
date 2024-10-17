<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Fungsi untuk mengupdate foto profil user
    public function updatePicture(Request $request)
    {
        // Validasi input untuk memastikan bahwa file yang di-upload adalah gambar dan tidak lebih dari 2MB
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Jika user sudah memiliki foto profil sebelumnya, hapus foto lama
        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture); // Menghapus file dari penyimpanan
        }

        // Menyimpan foto profil baru ke disk 'public', biasanya di 'storage/app/public'
        $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');

        // Mengupdate path foto profil di database
        $user->profile_picture = $filePath;
        $user->save(); // Menyimpan perubahan ke database

        // Mengembalikan response ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('Success', 'Foto profil berhasil diperbarui!');
    }
}
