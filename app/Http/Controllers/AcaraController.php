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
        $acaras = Acara::paginate(6);

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
        $request->validate([

            'files' => 'required',
            'description' => 'required',
            'name' => 'required',
            'namaPelaksana' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'category_id' => 'required',
            'image_content' => 'required',
        ]);

        $slug = $request->slug ?? Str::slug($request->name);

        $request->merge([
            'slug' => Str::slug($request->name),

        ]);

        if ($request->hasFile('files')) {
            $photos = [];
            foreach ($request->file('files') as $file) {
                // $photos[] = $file->store('acaras', 'public');

                // $photos[] = str_replace('/', '\\', $file->store('acaras', 'public'));
                $path = $file->store('acaras', 'public');
                $path = str_replace('/', '\\', $path); // Ganti slash dengan backslash
                $path = preg_replace('/\\\\+/', '\\', $path); // Hapus backslash ganda
                $photos[] = $path; // Simpan path dengan satu backslash
            }

            $request->merge([
                'photos' => $photos
            ]);
        }
        // if ($request->hasFile('image_content')) {
        //     $imgPath = $request->file('image_content')->store('acaras/image_content', 'public');
        // }
        if ($request->hasFile('image_content')) {
            $imgPath = str_replace('/', '\\', $request->file('image_content')->store('acaras/image_content', 'public'));
            $imgPath = preg_replace('/\\\\+/', '\\', $imgPath); // Hapus backslash ganda
        }
        $saveData = [
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photos' => $request->photos,
            'slug' => $request->slug,
            'image_content' => $imgPath,
            'namaPelaksana' => $request->namaPelaksana,
            'lokasi' => $request->lokasi,
            'waktu' => $request->waktu,
            'category_id' => $request->category_id
        ];

        //dd($saveData);
        Acara::create($saveData);

        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil di buat ');
    }
    public function edit(Acara $acara)
    {
        $categories = Category::all();
        // dd($acara->id);
        // $acara = Acara::find($acara);
        // dd($acara);
        return view('admin.acara.edit', compact('acara', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'namaPelaksana' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'latitude' => '',
            'longitude' => '',
            'waktu' => 'required|date',
            'category_id' => 'required|integer',
            // 'files.*' => 'image|mimes:png,jpg,jpeg|max:2048' // Validasi untuk file gambar
        ]);

        DB::beginTransaction();

        try {
            $acara = Acara::findOrFail($id);

            $photoOld = $acara->photos ?? []; // Ambil foto sebelumnya

            if ($request->hasFile('files')) {
                $getNewPhoto = [];
                foreach ($validated['files'] as $photo) {
                    $getNewPhoto[] = str_replace('/', '\\', $photo->store('acaras', 'public'));
                }
                $photos = $getNewPhoto;
            } else {
                $photos = $photoOld;
            }



            $validated['photos'] = $photos; // Set foto baru

            dd($validated);
            $acara->update($validated);

            DB::commit();
            return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil diubah');
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
        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil di hapus');
    }
}
