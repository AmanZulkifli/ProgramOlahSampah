<?php

namespace App\Http\Controllers;

use App\Models\WasteManagement;
use Illuminate\Http\Request;
use Auth;

class WasteManagementController extends Controller
{
    // Menampilkan data waste management milik user yang sedang login
    public function index(Request $request)
    {
        // Mengambil data sampah user yang sedang login berdasarkan tanggal pencarian (jika ada)
        $waste = WasteManagement::where('user_id', Auth::id())
            ->where('created_at', 'like', '%' . $request->search . '%') // Filter berdasarkan waktu jika dicari
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu dibuat
            ->simplePaginate(5); // Menampilkan 5 data per halaman

        return view('pages.waste', compact('waste')); // Return ke halaman waste dengan data yang diambil
    }

    // Menyimpan data waste management baru
    public function store(Request $request)
    {
        // Validasi input data user
        $request->validate([
            'waste_type' => 'required|in:plastic,paper,metal,glass,organic', // Jenis sampah harus termasuk yang diizinkan
            'quantity' => 'required|numeric|min:0.1', // Kuantitas harus lebih dari 0
        ]);

        // Menyimpan data sampah baru ke database
        WasteManagement::create([
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
            'waste_type' => $request->input('waste_type'), // Jenis sampah
            'quantity' => $request->input('quantity'), // Kuantitas sampah
            'status' => 'pending', // Status awal sampah adalah 'pending'
        ]);

        // Redirect ke halaman waste.show dengan pesan sukses
        return redirect()->route('waste.show')->with('success', 'Waste has been submitted');
    }

    // Menghapus data waste management berdasarkan ID
    public function destroy($id)
    {
        // Menghapus data berdasarkan ID
        $proses = WasteManagement::where('id', $id)->delete();

        // Jika berhasil, redirect dengan pesan sukses, jika gagal redirect dengan pesan gagal
        if ($proses) {
            return redirect('/manage')->with('Success', 'Data deleted successfully');
        } else {
            return redirect('/manage')->with('Failed', 'Failed to delete data');
        }
    }

    // Menampilkan permintaan sampah yang statusnya masih 'pending' untuk admin dan pekerja
    public function manageRequests()
    {
        // Mengambil semua permintaan yang statusnya 'pending' dan menampilkannya di halaman admin
        $requests = WasteManagement::where('status', 'pending')->with('user')->get();

        return view('admin.manage', compact('requests')); // Return ke halaman admin.manage dengan data permintaan
    }

    // Mengupdate status permintaan sampah (completed atau pending)
    public function updateRequest(Request $request, $id)
    {
        // Validasi input dari admin/pekerja untuk update status
        $request->validate([
            'status' => 'required|in:completed,pending', // Status hanya bisa diubah menjadi 'completed' atau 'pending'
        ]);

        // Mengambil data permintaan sampah berdasarkan ID dan mengupdate statusnya
        $wasteRequest = WasteManagement::findOrFail($id); // Ambil data berdasarkan ID
        $wasteRequest->status = $request->status; // Update status permintaan
        $wasteRequest->save(); // Simpan perubahan

        // Redirect ke halaman manage.requests dengan pesan sukses
        return redirect()->route('manage.requests')->with('success', 'Request has been updated');
    }
}
