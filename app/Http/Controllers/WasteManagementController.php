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
            $user_id = Auth::id();
            $query = $request->input('query');
            // Mengambil data sampah user yang sedang login berdasarkan tanggal pencarian (jika ada)
            $waste = WasteManagement::where('user_id', $user_id)
            ->where('waste_type', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(5);                
    // Menampilkan 5 data per halaman

            return view('pages.waste', compact('waste')); // Return ke halaman waste dengan data yang diambil
        }

        // Menyimpan data waste management baru
        public function store(Request $request)
        {
            // Validate input data
            $request->validate([
                'waste_type' => 'required|array', // Ensure waste_type is an array
                'waste_type.*' => 'required|in:plastic,paper,metal,glass,organic', // Validate each waste_type item
                'quantity' => 'required|array', // Ensure quantity is an array
                'quantity.*' => 'required|numeric|min:0.1', // Validate each quantity item
            ]);
        
            // Get the current user ID
            $user_id = Auth::id();
        
            // Loop through the waste_type and quantity arrays
            foreach ($request->waste_type as $index => $waste_type) {
                WasteManagement::create([
                    'user_id' => $user_id, // Assign the logged-in user's ID
                    'waste_type' => $waste_type, // Assign the current waste type
                    'quantity' => $request->quantity[$index], // Assign the corresponding quantity
                    'status' => 'pending', 
                ]);
            }
        
            return redirect()->route('waste.show')->with('success', 'Waste has been submitted successfully');
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
        // Validate the input (status must be 'completed' or 'pending')
        $request->validate([
            'status' => 'required|in:completed,pending',
        ]);

        // Find the waste request by ID or fail if not found
        $wasteRequest = WasteManagement::findOrFail($id);

        // Update the status field
        $wasteRequest->status = $request->status;

        // Save the changes to the database
        $wasteRequest->save();

        // Redirect back to the manage requests page with a success message
        return redirect()->route('manage.requests')->with('success', 'Request has been updated');
    }

    public function bulkUpdate(Request $request)
{
    // Validate that some requests are selected
    $request->validate([
        'requests' => 'required|array', // Must be an array of request IDs
    ]);

    // Update the status of all selected requests
    WasteManagement::whereIn('id', $request->requests)->update(['status' => 'completed']);

    // Redirect back with success message
    return redirect()->route('manage.requests')->with('success', 'Selected requests have been marked as completed');
}

    }
