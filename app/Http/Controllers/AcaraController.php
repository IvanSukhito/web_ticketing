<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index()
    {
        $acaras = Acara::paginate(10);
        return view('admin.acara.index', [
            'acaras' => $acaras
        ]);
    }
    public function create()
    {
        $acaras = Acara::all();
        return view('admin.acara.create', [
            'acaras' => $acaras
        ]);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'jenis_acara' => 'required',
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


        // if (!$request->has('waktu')) {
        //     // If waktu doesn't exist, set a default value or handle the absence of waktu according to your logic
        //     $request->merge([
        //         'waktu' => now() // Set default value to current time, you can change it according to your requirements
        //     ]);
        // }

        //create acara 
        // $acara = Acara::create([
        //     'name' => $request->name,
        //     'slug' => $slug,
        //     'description' => $request->description,
        //     'namaPelaksana' => $request->namaPelaksana,
        //     'lokasi' => $request->lokasi,
        //     'waktu' => $request->waktu,
        //     'jenis_acara' => $request->jenis_acara,
        //     'photos' => json_encode($photos),
        // ]);

        Acara::create($request->except('files'));


        //return to index
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di buat ');
    }
    public function edit(Acara $acara)
    {
        $acaras = Acara::all();
        return view('admin.acara.edit', [
            'acara' => $acara,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'jenis_acara' => 'required',
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
        Acara::find($id)->update($request->except('files'));
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di Edit');
    }
    public function destroy(Acara $acara)
    {
        $acara->delete();
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di hapus');
    }
}
