<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\WasteManagement;

class UserController extends Controller
{
    // Menampilkan halaman login
    public function showlogin()
    {
        return view('user.login');
    }

    // Proses login user
    public function login(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        // Mengecek kredensial user
        if (Auth::attempt($user)) {
            return redirect()->route('home'); // Redirect ke halaman home jika berhasil login
        } else {
            // Kembali ke halaman login jika gagal
            return back()->withErrors([
                'email' => 'Email atau Password salah',
            ])->withInput($request->only('email'));
        }
    }

    // Proses logout
    public function logout(Request $request)
    {
        $username = Auth::user()->name; // Mendapatkan nama user yang sedang login
        Auth::logout();
        $request->session()->invalidate(); // Menghapus session yang aktif
        $request->session()->regenerateToken(); // Menghasilkan token baru untuk sesi berikutnya

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', "$username has logged out");
    }

    // Menampilkan halaman register/signup
    public function showregister()
    {
        return view('user.register');
    }

    // Proses registrasi user baru
    public function register_store(Request $request)
    {
        // Validasi input user
        $validate = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users', // Email harus unik
            'password' => 'required|min:8|confirmed', // Password minimal 8 karakter dan harus dikonfirmasi
        ]);

        // Proses penyimpanan user baru
        $proses = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing password
            'role' => 'user',
        ]);

        // Cek apakah proses penyimpanan berhasil
        if ($proses) {
            return redirect()->route('login')->with('success', 'Account created successfully');
        } else {
            return redirect()->route('register')->with('failed', 'Failed to create account');
        }
    }

    // Menampilkan halaman home
    public function showhome()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $user_id = Auth::id();

        // Mengambil data pengelolaan sampah user
        $waste_records = WasteManagement::where('user_id', $user_id)->orderBy('created_at', 'desc')->simplePaginate(5);
        $all_waste_records = WasteManagement::where('user_id', $user_id)->get();
        $total_waste = WasteManagement::where('user_id', $user_id)->sum('quantity'); // Total berat sampah
        $completed = WasteManagement::where('user_id', $user_id)->where('status', 'completed')->sum('quantity');
        $pending_waste = WasteManagement::where('user_id', $user_id)->where('status', 'pending')->sum('quantity');

        // Menghitung poin hanya untuk sampah yang statusnya 'completed'
        $points_awarded = 0;
        foreach ($all_waste_records as $record) {
            if ($record->status === 'completed') {
                switch ($record->waste_type) {
                    case 'plastic':
                        $points_awarded += $record->quantity * 1.3;
                        break;
                    case 'paper':
                        $points_awarded += $record->quantity * 1.5;
                        break;
                    case 'metal':
                        $points_awarded += $record->quantity * 2.8;
                        break;
                    case 'glass':
                        $points_awarded += $record->quantity * 3;
                        break;
                    case 'organic':
                        $points_awarded += $record->quantity * 3.5;
                        break;
                    default:
                        $points_awarded += $record->quantity;
                        break;
                }
            }
        }

        // Update poin user jika poin belum pernah diatur sebelumnya
        if ($user->points == 0) {
            $user->points += $points_awarded;
            $user->save();
        } else {
            $user->points += $points_awarded - $user->points;
            $user->save();
        }

        // Menghitung level berdasarkan total berat sampah
        $level = $this->calculateLevel($total_waste);

        // Update level user jika level berubah
        if ($user->level != $level) {
            $user->level = $level;
            $user->save();
        }

        return view('pages.index', compact('user', 'total_waste', 'pending_waste', 'completed', 'waste_records', 'points_awarded', 'level'));
    }

    // Fungsi untuk menghitung level user berdasarkan total berat sampah
    private function calculateLevel($total_waste)
    {
        $base_weight = 5; // Syarat berat untuk naik level
        $level = 1;

        // Setiap kelipatan 5kg, level akan naik
        while ($total_waste >= $base_weight) {
            $level++;
            $total_waste -= $base_weight; // Mengurangi total berat sesuai kelipatan
        }

        return $level;
    }

    // Menampilkan halaman manajemen sampah
    public function showmanage()
    {
        return view('pages.waste');
    }

    // Menampilkan halaman profil user
    public function showprofile(Request $request)
    {
        $user = Auth::user();
        $totalWaste = WasteManagement::where('user_id', $user->id)->sum('quantity');
        $points = $user->points; // Asumsi poin tersimpan di kolom 'points'
        $level = $this->calculateLevel($totalWaste);

        return view('pages.profile', compact('totalWaste', 'points', 'level'));
    }

    // Fungsi update user
    public function update(Request $request, string $id)
    {
        //
    }

    // Fungsi hapus user
    public function destroy(string $id)
    {
        //
    }
}
