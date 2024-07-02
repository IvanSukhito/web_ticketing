<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\Acara;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Notifications\userNotification;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index()
    {

        // $acaras = Acara::paginate(30);
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $acaras = $user->acara()->paginate(30); // Mengambil acara yang dibuat oleh user/vendor  tersebut
        return view('vendor-client.acara.index', [
            'acaras' => $acaras
        ]);
    }

    public function create()
    {

        $categories = Category::all() ?? null;

        //dd($categories);
        $acaras = Acara::all();

        return view('vendor-client.acara.create', [
            'acaras' => $acaras,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $slug = $request->slug ?? Str::slug($request->name);

        $request->merge([
            'slug' => Str::slug($request->name),

        ]);


        if ($request->hasFile('files')) {
            $photos = [];
            foreach ($request->file('files') as $file) {
                $photos[] = $file->store('acaras', 'public');
            }

            $request->merge([
                'photos' => $photos
            ]);
        }



        $acara = Acara::create($request->except('files'));
        $user = Auth::user();
        $user->acara()->attach($acara->id);

        //return to index
        return redirect()->route('vendor.acara.index')->with('success', 'Acara berhasil di buat ');
    }
    public function edit(Acara $acara)
    {
        $categories = Category::all();
        $acaras = Acara::all();
        return view('vendor-client.acara.edit', [
            'acara' => $acara,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Acara $acara)
    {
        if (!Auth::user()->acara->contains($acara->id)) {
            return redirect()->route('vendor-client.acara.index')->with('error', 'Anda tidak memiliki izin untuk mengedit acara ini.');
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',

            // Sesuaikan aturan validasi sesuai kebutuhan Anda
        ]);
        $slug = $request->slug ?? Str::slug($request->name);

        $request->merge([
            'slug' => Str::slug($request->name),

        ]);

        if ($request->hasFile('files')) {
            $photos = [];
            foreach ($request->file('files') as $file) {
                $photos[] = $file->store('acaras', 'public');
            }
            $request->merge([
                'photos' => $photos
            ]);
        }


        //update Acara
        $acara->update($request->except('files'));
        return redirect()->route('vendor.acara.index')->with('success', 'Acara berhasil di buat ');
    }
    public function destroy(Acara $acara)
    {
        if (!Auth::user()->acara->contains($acara->id)) {
            return redirect()->route('vendor-client.acara.index')->with('error', 'Anda tidak memiliki izin untuk menghapus acara ini.');
        }

        $acara->delete();
        // dd($acara);
        return redirect()->route('vendor-client.acara.index')->with('success', 'Acara berhasil di hapus');
    }
}
