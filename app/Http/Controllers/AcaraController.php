<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcaraRequest;
use App\Http\Middleware\User;
use App\Models\Acara;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Notifications\userNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AcaraController extends Controller
{
    public function index()
    {
        $acaras = Acara::paginate(30);
        return view('admin.acara.index', [
            'acaras' => $acaras
        ]);
    }

    public function create()
    {
        $categories = Category::all() ?? null;

        //dd($categories);
        $acaras = Acara::all();

        return view('admin.acara.create', [
            'acaras' => $acaras,
            'categories' => $categories,
        ]);
    }

    public function store(AcaraRequest $request)
    {

        // dd($request->all());

        $acaras = new Acara;
        $acaras->name = $request->name;
        $acaras->description = $request->description;
        // $acaras->photos = $request->photos;
        $acaras->namaPelaksana = $request->namaPelaksana;
        $acaras->lokasi = $request->lokasi;
        $acaras->waktu = $request->waktu;
        $acaras->category_id = $request->category_id;

        // $request->validate([
        //     'name' => 'required|min:5',
        //     'description' => 'required|string|max:255',
        //     'photos' => 'required|image|mimes:png,jpg,jpeg',
        //     'namaPelaksana' => 'required|string|max:50',
        //     'lokasi' => 'required|string|max:255',
        //     'waktu' => 'required|date',
        //     'category_id' => 'required|integer'
        // ]);
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
        // $users = User::all();
        // Notification::send($users, new userNotification($acara));

        //return to index
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di buat ');
    }
    public function edit(Acara $acara)
    {
        $categories = Category::all();
        return view('admin.acara.edit', compact('acara', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'namaPelaksana' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'waktu' => 'required|date',
            'category_id' => 'required|integer',
            'files.*' => 'image|mimes:png,jpg,jpeg|max:2048' // Validasi untuk file gambar
        ]);

        DB::beginTransaction();

        try {
            $acara = Acara::findOrFail($id);

            $photos = $acara->photos ?? []; // Ambil foto sebelumnya

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $photos[] = $file->store('acaras', 'public');
                }

                // Hapus foto lama dari storage
                foreach ($acara->photos as $photo) {
                    if (Storage::exists('public/' . $photo)) {
                        Storage::delete('public/' . $photo);
                    }
                }
            }

            $validated['photos'] = $photos; // Set foto baru

            $acara->update($validated);

            DB::commit();
            return redirect()->route('acara.index')->with('success', 'Acara berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error! ' . $e->getMessage()],
            ]);
            throw $error;
        }
    }




    public function destroy(Acara $acara)
    {
        $acara->delete();
        // dd($acara);
        return redirect()->route('acara.index')->with('success', 'Acara berhasil di hapus');
    }
}
