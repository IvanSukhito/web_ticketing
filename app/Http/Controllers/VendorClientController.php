<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VendorClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $banner = Vendor::paginate(10);
        $getDataVendor = User::where('role', 'vendor')->paginate(10);
        //dd($getDataVendor); 
        return view('admin.Vendor-Client.index', [
            'getVendor' => $getDataVendor ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.Vendor-Client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required',
            'no_telp' => 'required',
            'nik' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'password_confirmation' => 'required|same:password',
        ],
        [
           'password.min' => 'Password baru minimal 8 huruf',
           'password.regex' => 'Password baru harus berisi hurufkecil, 1 huruf besar, 1 angka, and 1 special karakter (@$!%*#?&).',
            'password_confirmation.same' => 'Password konfirmasi tidak sesuai.'
       ]);

        //dd($validated);
        try {

            User::create($validated);
            //dd($db);

            return redirect()->route('admin.vendor-client.index')->with('success', 'Vendor berhasil dihapus.');
        } catch (\Exception $e) {

            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $getDataVendor = User::where('role', 'vendor')->where('id', $id)->find($id);
        return view('admin.Vendor-Client.edit', [
            'vendor' => $getDataVendor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'role' => 'required',
            'no_telp' => 'required',
            'nik' => 'required',
            'email' => 'required',

        ]);


        $updateVendor = User::where('id', $id)->first();
        $updateVendor->update([
            'name' => $request->name,
            'role' => 'vendor',
            'no_telp' => $request->no_telp ?? $updateVendor->no_telp,
            'nik' => $request->nik ?? $updateVendor->nik,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.vendor-client.index')->with('success', 'Vendor berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $vendor = User::where('role', 'vendor')->find($id);
        $vendor->delete();



        // Redirect ke index kategori dengan pesan sukses
        // dd($banner);
        return redirect()->route('admin.vendor-client.index')->with('success', 'Vendor berhasil dihapus.');
    }
}
